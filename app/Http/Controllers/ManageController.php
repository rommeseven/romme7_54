<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function index()
    {
    	dump(config('APP_NAME'));
        config(['APP_NAME' => "Program based"]);
        dd(config('APP_NAME'));

        return "Index";
    }

    public function no_permission()
    {
//        Auth::user()->roles()->attach(['superadministrator']);

        return view('errors.403');

    }
}
