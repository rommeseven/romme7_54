<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function index()
    {
    	config('APP_NAME',"Program based");

    	return "Index";
    }
    public function no_permission()
    {
//    	Auth::user()->roles()->attach(['superadministrator']);

    	return view('errors.403');


    }
}
