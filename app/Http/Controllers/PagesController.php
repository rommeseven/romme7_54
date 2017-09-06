<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Present a page to the user by slug
     * @author Takács László
     * @date    2017-08-02
     * @version v1
     * @param   Page->slug     $slug
     * @return  view           the page with this slug.
     * @return  redirect           the page url redirects
     */
    public function getPage($slug)
    {
        if (!$slug)
        {
            abort(404);
            return;
        }
        $page = Page::where("slug", $slug)->first();
        if ($page->url)
        {
            return redirect($page->url);
        }
        $loadedpage = $page->load("rows.columns");
        $pages      = Page::nav()->get();
        $bbs        = $page->GetPageBbs();
        if ($page->module)
        {
            return view('frontend/modules/'.$page->module)->withPage($loadedpage)->withPages($pages)->with($bbs);
        }
        return view("frontend/master")->withPage($loadedpage)->withPages($pages)->with($bbs);
    }

    /**
     * shows the landing page
     * TODO: Show landing page
     * TODO: add landing page to cms seed
     * TODO: Pages -> Page Types
     * @author Takács László
     * @date    2017-08-02
     * @version v1
     * @return  [type]     [description]
     */
    public function index()
    {
        return view("landing");

        /*$page = Page::find(1);
    if(!$page) return "landing page";
    return $this->getPage($page->slug);*/
    }
}
