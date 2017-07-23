<?php

/*
TODO: install command (custom seed)

 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Settings;
class ManageController extends Controller
{
    public function index()
    {
    	

        return "Index";
    }

    public function no_permission()
    {
//        Auth::user()->roles()->attach(['superadministrator']);

        return view('errors.403');

    }
}
