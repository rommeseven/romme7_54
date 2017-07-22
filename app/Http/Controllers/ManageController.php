<?php

/*
TODO: install command (custom seed)
REMEMBER: on init Settings::set('APP_NAME',"App Name");
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Settings;
class ManageController extends Controller
{
    public function index()
    {
    	//
    	//Settings::set('APP_NAME',"Program");

    	dd(Settings::get('APP_NAME'));


        return "Index";
    }

    public function no_permission()
    {
//        Auth::user()->roles()->attach(['superadministrator']);

        return view('errors.403');

    }
}
