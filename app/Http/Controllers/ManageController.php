<?php

/*
TODO: install command (custom seed)

 */

namespace App\Http\Controllers;

use App\Column;
use App\LayoutTemplate;
use App\Row;
use Illuminate\Http\Request;
use Settings;

class ManageController extends Controller
{
    public function index()
    {
        dd(str_slug("Lárávél 5% Framework", "-"));


        return "Index";
    }

    public function no_permission()
    {
//        Auth::user()->roles()->attach(['superadministrator']);

        return view('errors.403');
    }
}
