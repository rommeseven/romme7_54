<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Session;

class RoleController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('backend.roles.create')->withPermissions($permissions);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role        = Role::where('id', $id)->with('permissions')->first();
        $permissions = Permission::all();
        return view('backend.roles.edit')->withRole($role)->withPermissions($permissions);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with("permissions")->paginate(10);
        return view('backend.roles.index')->withRoles($roles);
    }

    public function search(Request $request)
    {

        $this->validate($request, array(
            'search' => 'required|max:255',
        ));
        $roles = Role::search($request->input('search'))->with("permissions")->paginate(10);

        if (!$roles->count())
        {
            Session::flash("error", 'Could not find role with data "'.$request->input('search').'".');
            Session::flash("error_autohide", 4000);
            return redirect('/cmseven/roles');
        }
        $searched = $roles->count().' User(s) Found:';
        return view('backend.roles.index')->withRoles($roles)->with("searched", $searched)->with('searchQuery', $request->input('search'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::where('id', $id)->with('permissions')->first();

        return view('backend.roles.show')->withRole($role);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'display_name' => 'required|max:255',
            'name'         => 'required|max:100|alpha_dash|unique:roles,name',
            'description'  => 'sometimes|max:255',
        ));

        $role               = new Role();
        $role->display_name = $request->display_name;
        $role->name         = $request->name;
        $role->description  = $request->description;
        $role->save();

        if ($request->permissions)
        {
            $role->syncPermissions(explode(',', $request->permissions));
        }

        Session::flash('success', 'Successfully created the new '.$role->display_name.' role in the database.');
        Session::flash("success_autohide", "4500");
        return redirect('/cmseven/roles/'.$role->id);
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
            'display_name' => 'sometimes|max:255',
            'description'  => 'sometimes|max:255',
        ));
        $filteredData = array_filter($data, function ($value)
        {
            return ($value !== null && $value !== false && $value !== '');
        });

        $role = Role::findOrFail($id);

        $role->update($filteredData);

        if ($request->permissions)
        {
            $role->syncPermissions(explode(',', $request->permissions));
        }

        Session::flash('success', 'Successfully updated the '.$role->display_name.' role.');
        Session::flash("success_autohide", "4500");
        return redirect('/cmseven/roles/'.$id);
    }
}
