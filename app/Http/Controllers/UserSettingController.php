<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserSettingController extends Controller
{
    public function getSettings()
    {
    	return view("backend.usersettings.index");

    }
    public function postSettings(Request $request)
    {
    	return false;
    }
}


// TODO: locale middleware @internet
