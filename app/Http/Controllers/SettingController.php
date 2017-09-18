<?php

namespace App\Http\Controllers;

use App\Notifications\GlobalSettingChanged;
use App\Page;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Session;
use Settings;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = collect(Page::GetBbs());
        return view("backend.settings.edit")->withBbs($collection);
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

        $arr = collect(Page::GetBbs());

        $arr = array_pluck($arr, "validation", "key");
        $data         = request()->validate($arr);
        $filteredData = array_filter($data, function ($value)
        {
            return ($value !== null && $value !== false && $value !== '');
        });

        $admins = User::wherePermissionIs('update_settings')->get()->except(auth()->user()->id);
        /*TODO:  [notification] into event listener! */
        foreach ($filteredData as $key => $value)
        {
            Settings::set($key, $value);

            Notification::send($admins, new GlobalSettingChanged($key, $value));
        }

        Session::flash("success", "Your changes have been saved!");
        Session::flash("success_autohide", "4500");
        return redirect()->route("settings");
    }
}
