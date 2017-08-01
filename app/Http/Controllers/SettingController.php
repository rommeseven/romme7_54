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
            'app_title' => 'sometimes|max:255',
            'slogan' => 'sometimes|max:255',
        ));
        
        if($request->has('app_title')) Settings::set('app_title', $request->input('app_title'));
        if($request->has('slogan')) Settings::set('slogan', $request->input('slogan'));
        Session::flash("success","Your changes have been saved!");
         Session::flash("success_autohide", "4500");
        return redirect()->route("settings");
    }
}
