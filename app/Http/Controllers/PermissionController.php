<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Session;

class PermissionController extends Controller
{
    /* Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.permissions.create");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('backend.permissions.edit')->withPermission($permission);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::paginate(10);

        return view('backend.permissions.index')->withPermissions($permissions);
    }

    public function search(Request $request)
    {

        $this->validate($request, array(
            'search' => 'required|max:255',
        ));
        $permission = Permission::search($request->input('search'))->paginate(10);
        if (!$permission->count())
        {
            Session::flash("error", 'Could not find Permission ("'.$request->input('search').'"). Try again.');
            return redirect('/cmseven/permissions');
        }
        $searched = $permission->count().' Permission(s) Found:';
        return view('backend.permissions.index')->withPermissions($permission)->with("searched", $searched)->with('searchQuery', $request->input('search'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->input("type") == "normal")
        {
            $this->validate($request, array(
                'name'        => 'required|max:255|min:5|unique:permissions',
                'slug'        => 'required|max:255|min:5|unique:permissions',
                'description' => "required|max:255|min:5",
            ));
            $request->slug = str_slug($request->slug);

            $permission               = new Permission;
            $permission->name         = $request->slug;
            $permission->display_name = $request->name;
            $permission->description  = $request->description;

            if ($permission->save())
            {
                Session::flash("success", "You successfully create this permission.");
                Session::flash("success_autohide", "4500");
                return redirect()->route('permissions.show', $permission->id);
            }
            else
            {
                Session::flash("error", "An error occured while creating the permission. (ErrCode: 89)");
                Session::flash("success_autohide", "4500");
                return redirect()->back();
            }
        }
        elseif ($request->input("type") == "resource")
        {
            $this->validate($request, array(
                'resource' => 'required|max:240|min:3',
            ));
            $actions = array_filter($request->only('create', 'read', 'update', 'delete'));
            foreach ($actions as $action => $value)
            {
                $slug         = str_slug(strtolower($action).'-'.$request->resource);
                $display_name = ucwords($action.' '.$request->resource);
                $description  = 'Permission to '.$action.' '.$request->resource;

                $permission               = new Permission();
                $permission->name         = $slug;
                $permission->display_name = $display_name;
                $permission->description  = $description;
                $permission->save();
            }
            Session::flash("success", "You've successfully created this permission.");
            Session::flash("success_autohide", "4500");
            return redirect()->route('permissions.index');
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $this->validate($request, array(
            'slug'        => 'sometimes|nullable|max:255|min:5|unique:permissions,name'.$id,
            'name'        => 'sometimes|nullable|max:255|min:5|unique:permissions,name'.$id,
            'description' => 'sometimes|nullable|max:255|min:5',
        ));
        $filteredData = array_filter($data, function ($value)
        {
            return ($value !== null && $value !== false && $value !== '');
        });

        $permission = Permission::findOrFail($id);

        if ($permission->update($filteredData))
        {
            Session::flash("success", "Your changes have been saved.");
            Session::flash("success_autohide", "4500");
            return redirect()->route('permissions.index');
        }
        else
        {
            Session::flash("error", "An error occured while saving the changes. (ErrCode:90)");
            return redirect()->back();
        }
    }
}
