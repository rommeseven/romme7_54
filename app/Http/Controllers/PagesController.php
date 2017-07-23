<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
class PagesController extends Controller
{
    public function index()
    {

/*    	$this->addP("Page");
    	$this->addP("Page1");
    	$this->addP("Page2");
    	$this->addP("Page3");
    	$this->addP("Page4");
    	$this->addP("Page5");
    	$this->addP("Page6");
    	$this->addP("Page7");
    	$this->addP("Page8");
    	$this->addP("Page9");
*/
    	$pages = Page::nav()->get();
    	

    	return view("welcome")->withPages($pages);	
    }
    private function addP($title,$parent=0)
    {
    	$p = new Page();
    	$p->title = $title;
    	$p->parent_id = $parent;
    	return $p->save();

    }
}
