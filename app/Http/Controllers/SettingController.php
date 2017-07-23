<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Settings;
use Session;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("backend.settings.edit");
    }

    /**
     * Update all resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, array(
            'app_title' => 'sometimes|min:2|max:255',
        ));
        
        Settings:set('apptitle', $request->input('app_title'));
        Session::flash("success","Your changes have been saved!");
        return redirect()->route("settings");
    }
}
