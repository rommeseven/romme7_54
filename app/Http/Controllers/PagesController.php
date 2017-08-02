<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $page       = Page::find(1);
        $loadedpage = $page->load("rows.columns");
        $pages      = Page::nav()->get();
        //  $PageContext = new \Krucas\Settings\Context(['page' => $page->id]);
        $building_blocks = array(
            'slogan' => $page->GetSetting( "slogan", "Something Clever"),

        );

        return view("frontend/master")->withPage($loadedpage)->withPages($pages)->withBbs($building_blocks);

    }

}
