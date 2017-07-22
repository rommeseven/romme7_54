<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function index()
    {
    	dump(config('app.name'));
        config(['app.name' => "Program based"]);
        dd(config('app.name'));

        return "Index";
    }

    public function no_permission()
    {
//        Auth::user()->roles()->attach(['superadministrator']);

        return view('errors.403');

    }
}
