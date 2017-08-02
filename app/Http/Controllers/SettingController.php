<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
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

        $bbs           = collect(Page::GetBbs());
        $bb_toValidate = array(
            'app_title' => 'sometimes|max:255',
        );
        // TODO: array_push() @internet
        for ($i = 0; $i < sizeof($bbs); $i++)
        {
            if ($bbs[$i]['type'] == 'text')
            {
                //
            }
            if ($bbs[$i]['type'] == 'image')
            {
                // TODO: store image in db @internet
            }
            if ($bbs[$i]['type'] == 'video')
            {
                // TODO: laravel youtube @internet
            }
        }

        $this->validate($request, $bb_toValidate);

        if ($request->has('app_title'))
        {
            Settings::set('app_title', $request->input('app_title'));
        }
        for ($i = 0; $i < sizeof($bbs); $i++)
        {
            if ($request->has($bbs[$i]['key']))
            {
                Settings::set($bbs[$i]['key'], $request->input($bbs[$i]['key']));
            }
        }

        Session::flash("success", "Your changes have been saved!");
        Session::flash("success_autohide", "4500");
        return redirect()->route("settings");
    }
}
