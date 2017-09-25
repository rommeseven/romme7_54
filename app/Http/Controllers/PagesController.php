<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use App\Exceptions\WrongSlugException;

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
        if ($page = Page::where("slug", $slug)->first())
        {
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
        else
        {
            throw new WrongSlugException($slug);
        }
    }

    /**
     * shows the landing page
     * @author Takács László
     * @date    2017-08-02
     * @version v1
     * @return  [type]     [description]
     */
    public function index()
    {
        $landing = Page::where("module","=","landing-page");
        if($landing->count())
        {
            return redirect(url($landing->first()->slug));
        }
        $landing = Page::where("slug","!=",null)->first();
        if(!$landing)
        {
            abort(503);
            return false;
        }
        return redirect(url($landing->slug));
    }
}
