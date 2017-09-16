<?php


     // CRISI: [info] @lang @read-then-delete: Auf diese Seite habe ich schon in die __() Funktion gesammelt, was zum übersetzen ist.
     // Musst nur auf __(  suchen und die texte in den .json hinzufügen + übersetzen. 
     // Bitte lösche diese die @read-then-delete Kommentare, wenn du fertig bist.




namespace App\Http\Controllers;

use App\Row;
use Context;
use Session;
use App\Page;
use App\User;
use Settings;
use App\Column;
use App\LayoutTemplate;
use Illuminate\Http\Request;
use App\Notifications\NewPagePublished;
use App\Notifications\NavigationUpdated;
use Illuminate\Support\Facades\Notification;

class PageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.pages.create");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        if ($page->delete())
        {
            Session::flash("success", 'You have deleted Page#'.$page->id.' successfully!');
            Session::flash("success_autohide", "4500");
            return redirect("cmseven/pages");
        }
        else
        {
            Session::flash("error", "An error occured while removing the page. (ErrCode 39)");
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    public function getContent(Page $page)
    {
        if ($page->step != 4)
        {
            Session::flash("warning", __("You must complete the steps in order!"));
            Session::flash("warning_autohide", "4500");

            return redirect('/cmseven/pages/create/step/'.$page->step.'/page/'.$page->id);
        }
        $init       = $page->load("rows.columns")->rows;
        $collection = collect($init->toArray());
        $collection = $collection->toJson();
        $collection = str_replace("columns", "cols", $collection);
// dd($collection);

        return view("backend.pages.step4")->withPage($page)->withRows($collection);
    }

    public function getLayout(Page $page)
    {
        if ($page->step != 3)
        {
            Session::flash("warning", __("You must complete the steps in order!"));
            Session::flash("warning_autohide", "4500");

            return redirect('/cmseven/pages/create/step/'.$page->step.'/page/'.$page->id);
        }
        // dd(LayoutTemplate::where('id',4)->with("rows.columns")->first()->toArray()["rows"]);
        // $collection = collect(LayoutTemplate::where('id', 4)->with("rows.columns")->first()["rows"]);
        // $collection = $collection->sortBy('id')->toJson();
        // $collection = str_replace("columns", "cols", $collection);

        $bigcollection = collect(LayoutTemplate::with('user', "rows.columns")->get());

        $bigcollection = $bigcollection->sortBy('id')->toJson();
        $bigcollection = str_replace("columns", "cols", $bigcollection);
        // dd($collection);

        return view("backend.pages.step3")->withPage($page)->withLayouts($bigcollection);
    }

    /**
     * Show the form for changing nav
     * @return \Illuminate\Http\Response
     */
    public function getNavigation()
    {
        if (!Page::nav()->count())
        {
            Session::flash("warning", __("You must create and publish a page to edit the navigation"));
            Session::flash("warning_autohide", "4500");
            Session::flash("error", __("There are no pages published!"));
            Session::flash("error_autohide", "4500");
            return redirect('/cmseven/pages/create');
        }
        $pages = Page::nav()->get();
        return view("backend.navigation.sort")->withPages($pages);
    }

    public function getPreview(Page $page)
    {
        $loadedpage = $page->load("rows.columns");
        $pages      = Page::nav()->get();
        //  $PageContext = new \Krucas\Settings\Context(['page' => $page->id]);
        $bbs = $page->GetPageBbs();
        return view("frontend/preview")->withPage($loadedpage)->withPages($pages)->with($bbs);
    }

    /**
     * Step 6 in creating a page
     * @author Takács László
     * @date    2017-08-01
     * @version v1
     * @param   Page       $page The page being created
     * @return  view           Publish form
     */
    public function getPublish(Page $page)
    {
        if ($page->step != 6)
        {
            Session::flash("warning", __("You must complete the steps in order!"));
            Session::flash("warning_autohide", "4500");

            return redirect('/cmseven/pages/create/step/'.$page->step.'/page/'.$page->id);
        }
        /*
        TODO: page info on publish confirm @offline
         */
        return view("backend/pages/step6")->withPage($page);
    }

    /**
     * Step 5 of creating a page
     * @author Takács László
     * @date    2017-08-01
     * @version v1
     * @param   Page       $page The page the user is working on
     * @return  view           the page with the form for the per-page settings
     */
    public function getSettings(Page $page)
    {
        if ($page->step == 4)
        {
            $page->step = 5;
            $page->save();
        }
        if ($page->step != 5)
        {
            Session::flash("warning", __("You must complete the steps in order!"));
            Session::flash("warning_autohide", "4500");
            return redirect('/cmseven/pages/create/step/'.$page->step.'/page/'.$page->id);
        }
        $bbs = config("building_blocks.seven");
        return view("backend.pages.step5")->withPage($page)->withBbs($bbs);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::orderBy("published", "desc")->orderBy("step", "desc")->orderBy("updated_at", "desc")->paginate(10);

        return view('backend.pages.index')->withPages($pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function navigation(Page $page)
    {
        if (!Page::nav()->count())
        {

            $page->step      = 3;
            $page->published = false;
            $page->save();

            if (Session::has("success"))
            {
                Session::keep(array('success', 'success_autohide', 'info2', 'info2_autohide', 'info2_flash_title'));
            }
            Session::flash("info_flash_title", __("Skipping Step 2"));
            Session::flash("info", __("There are no other pages at the moment."));
            Session::flash("info_flash_icon", "angle-double-right");
            Session::flash("info_autohide", "3500");

            return redirect('/cmseven/pages/create/step/3/page/'.$page->id);
        }
        elseif ($page->published)
        {
            Session::flash("info_flash_title", __("Page already published"));
            Session::flash("info",__( "You can change the navigation on this page"));
            Session::flash("info_flash_icon", "navicon");
            Session::flash("info_autohide", "3500");

            return redirect('/cmseven/navigation');
        }
        else
        {
            $pages = Page::nav()->get();
            return view("backend.pages.step2")->withPages($pages)->withPage($page);
        }
    }

    public function postContent(Page $page, Request $request)
    {

        if (!$request->has("serial") || !$request->has("saving"))
        {
            dump($request);

            dd("TODO: GENERAL ERROR");
        }

        $object = json_decode($request->serial, true);
        if ($request->saving == "page")
        {
            foreach ($object as $row)
            {
                $row_model = new Row(array('align' => $row['align']));
                $page->rows()->save($row_model);
                foreach ($row['cols'] as $column)
                {
                    $column_model = new Column(array(
                        'size'   => $column['size'],
                        'valign' => $column['valign'],
                        'offset' => (array_key_exists('offset', $column)) ? $column['offset'] : '',
                        'small'  => (array_key_exists('small', $column)) ? $column['small'] : '',
                        'medium' => (array_key_exists('medium', $column)) ? $column['medium'] : '',
                        'large'  => (array_key_exists('large', $column)) ? $column['large'] : '',
                    ));
                    $row_model->columns()->save($column_model);
                }
            }
            $page->step = 4;
            $page->save();
            Session::flash("success", __("Page layout has been successfully set!"));
            Session::flash("success_autohide", "4500");
            return redirect('cmseven/pages/create/step/4/page/'.$page->id);
        }
        else
        {
            if (!$request->has("layoutname"))
            {
                dd("TODO: GENERAL ERROR1");
            }
            $templ = LayoutTemplate::firstOrCreate(array('name' => $request->layoutname, 'user_id' => auth()->user()->id));
            foreach ($object as $row)
            {
                $row_model = new Row(array('align' => $row['align']));
                $templ->rows()->save($row_model);
                foreach ($row['cols'] as $column)
                {
                    $column_model = new Column(array(
                        'size'   => $column['size'],
                        'valign' => $column['valign'],
                        'offset' => (array_key_exists('offset', $column)) ? $column['offset'] : '',
                        'small'  => (array_key_exists('small', $column)) ? $column['small'] : '',
                        'medium' => (array_key_exists('medium', $column)) ? $column['medium'] : '',
                        'large'  => (array_key_exists('large', $column)) ? $column['large'] : '',
                    ));
                    $row_model->columns()->save($column_model);
                }
            }
            Session::flash("success", __("Layout Templated created!"));
            Session::flash("success_autohide", "4500");
            return redirect('cmseven/pages/create/step/3/page/'.$page->id);
        }
    }

    public function postLayout(Page $page, Request $request)
    {

        if (!$request->has("serial") || !$request->has("saving"))
        {
            dump($request);

            dd("TODO: GENERAL ERROR");
        }
        if ($request->saving == "url")
        {
            return $this->postUrl($page,$request);
        }
        if ($request->saving == "module")
        {
            return $this->postModule($page,$request);
        }

        $object = json_decode($request->serial, true);
        if ($request->saving == "page")
        {
            foreach ($object as $row)
            {
                $row_model = new Row(array('align' => $row['align']));
                $page->rows()->save($row_model);
                foreach ($row['cols'] as $column)
                {
                    $column_model = new Column(array(
                        'size'   => $column['size'],
                        'valign' => $column['valign'],
                        'offset' => (array_key_exists('offset', $column)) ? $column['offset'] : '',
                        'small'  => (array_key_exists('small', $column)) ? $column['small'] : '',
                        'medium' => (array_key_exists('medium', $column)) ? $column['medium'] : '',
                        'large'  => (array_key_exists('large', $column)) ? $column['large'] : '',
                    ));
                    $row_model->columns()->save($column_model);
                }
            }
            $page->step = 4;
            $page->save();
            Session::flash("success", __("Page layout has been successfully set!"));
            Session::flash("success_autohide", "4500");
            return redirect('cmseven/pages/create/step/4/page/'.$page->id);
        }
        else
        {
            if (!$request->has("layoutname"))
            {
                dd("TODO: GENERAL ERROR1");
            }
            $templ = LayoutTemplate::firstOrCreate(array('name' => $request->layoutname, 'user_id' => auth()->user()->id));
            foreach ($object as $row)
            {
                $row_model = new Row(array('align' => $row['align']));
                $templ->rows()->save($row_model);
                foreach ($row['cols'] as $column)
                {
                    $column_model = new Column(array(
                        'size'   => $column['size'],
                        'valign' => $column['valign'],
                        'offset' => (array_key_exists('offset', $column)) ? $column['offset'] : '',
                        'small'  => (array_key_exists('small', $column)) ? $column['small'] : '',
                        'medium' => (array_key_exists('medium', $column)) ? $column['medium'] : '',
                        'large'  => (array_key_exists('large', $column)) ? $column['large'] : '',
                    ));
                    $row_model->columns()->save($column_model);
                }
            }
            Session::flash("success", __("Layout Templated created!"));
            Session::flash("success_autohide", "4500");
            Session::flash("info", __("Any previous layout with the same name has been overwritten."));
            Session::flash("info_autohide", "3000");
            Session::flash("info_title",__( "Notice"));
            return redirect('cmseven/pages/create/step/3/page/'.$page->id);
        }
    }

    public function postNavigation(Request $request)
    {
        if ($page->step != 5)
        {
            Session::flash("warning", __("You must complete the steps in order!"));
            Session::flash("warning_autohide", "4500");
            return redirect('/cmseven/pages/create/step/'.$page->step.'/page/'.$page->id);
        }        
        $toBePublished            = Page::findOrFail($request->input("page"));
        $toBePublished->published = true;
        $toBePublished->step      = 3;
        $toBePublished->save();
        $sort = 1;
        if ($request->nonav)
        {
            Session::flash("info", __("Page will not be shown in the navigation."));
            Session::flash("info_autohide", "4500");
            return redirect()->route("pageeditor.step3", $toBePublished->id);
        }
        $pages = str_replace('anchor#', null, $request->pages);
        parse_str($pages, $list);
        foreach ($list['page'] as $id => $parentId)
        {
            $page                = Page::findOrFail($id);
            $parentId            = ($parentId === null || $parentId == "null" || empty($parentId) || !$parentId || is_null($parentId)) ? 0 : $parentId;
            $page->display_order = $sort;
            $page->parent_id     = $parentId;
            $page->save();
            $sort++;
        }
        Session::flash("success",__( "Page successfully added to the navigation."));
        Session::flash("success_autohide", "4500");
        return redirect()->route("pageeditor.step3", $toBePublished->id);
    }

    /**
     * User searches for page
     * @author Takács László
     * @date    2017-08-01
     * @version v1
     * @param   Request    $request search_query
     * @return  view
     */
    public function postSearch(Request $request)
    {

        $this->validate($request, array(
            'search' => 'required|max:255',
        ));
        $users = Page::search($request->input('search'))->paginate(10);
        if (!$users->count())
        {
            Session::flash("error", __('Could not find page with title "').$request->input('search').'".');
            // CRISI: [info] @lang @read-then-delete: PAss auf, bei diesem. Die Leertaste und Anführungszeichen zum schluss sind wichtig

            Session::flash("error_autohide", "4500");
            return redirect('/cmseven/pages');
        }
        $searched = $users->unique()->count().__(' Page(s) Found:');
        // CRISI: [info] @lang @read-then-delete: PAss auf bei diesem. Die Leertaste ist wichtig

        return view('backend.pages.index')->withPages($users)->with("searched", $searched)->with('searchQuery', $request->input('search'));
    }

    /**
     * Step 5 of creating a page POSTING
     * @author Takács László
     * @date    2017-08-01
     * @version v1
     * @param   Page       $page The page the user is working on
     * @return  view           the page with the form for the per-page settings
     */
    public function postSettings(Page $page, Request $request)
    {
        if ($page->step != 5)
        {
            Session::flash("warning", __("You must complete the steps in order!"));
            Session::flash("warning_autohide", "4500");
            return redirect('/cmseven/pages/create/step/'.$page->step.'/page/'.$page->id);
        }

        $arr  = Page::GetBbs();
        $arr  = array_pluck($arr, "validation", "key");
        $data = request()->validate($arr);

        $filteredData = array_filter($data, function ($value)
        {
            return ($value !== null && $value !== false && $value !== '');
        });
        /* TODO: [test] per page settings */
        foreach ($filteredData as $key => $value)
        {
            $page->SetSetting($key, $value);
        }

        $page->step = 6;
        $page->save();
        Session::flash("success",__( "Page-specific settings have been saved!"));
        Session::flash("success_autohide", "4500");

        return redirect()->route("pageeditor.step6", $page);
    }

    /**
     * "Step 7" aka Actually publishing the page
     * @author Takács László
     * @date    2017-08-01
     * @version v1
     * @param   Page       $page The page being created
     * @return  view           Publish form
     */
    public function publish(Page $page)
    {
        if ($page->step < 6)
        {
            Session::flash("warning", __("You must complete the steps in order!"));
            Session::flash("warning_autohide", "4500");

            return redirect('/cmseven/pages/create/step/'.$page->step.'/page/'.$page->id);
        }
        $page->step      = 7;
        $page->published = true;
        $page->save();
        $admins = User::wherePermissionIs('read_pages')->get()->except(auth()->user()->id);
        /*TODO:  [notification] into event listener! */
        Notification::send($admins, new NewPagePublished($page));
        Session::flash("success", __("The page has been published!"));
        Session::flash("success_autohide", "5500");
        return redirect("cmseven/pages");
        // TODO: redirect to page edit page
    }

    public function putContent(Column $col, Request $request)
    {
        $col->html = $request->input("html");
        $col->save();
        return array('message' => "success");
    }

    public function putNavigation(Request $request)
    {
        $pages = str_replace('anchor#', null, $request->pages);
        parse_str($pages, $list);
        $sort = 1;
        foreach ($list['page'] as $id => $parentId)
        {
            $page                = Page::findOrFail($id);
            $parentId            = ($parentId === null || $parentId == "null" || empty($parentId) || !$parentId || is_null($parentId)) ? 0 : $parentId;
            $page->display_order = $sort;
            $page->parent_id     = $parentId;
            $page->save();
            $sort++;
        }
        $admins = User::wherePermissionIs('update_pages')->get()->except(auth()->user()->id);
        /*TODO:  [notification] into event listener! */
        Notification::send($admins, new NavigationUpdated());

        Session::flash("success", __("Your changes have been saved!"));
        Session::flash("success_autohide", "4500");
        return redirect("cmseven/navigation");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('backend.pages.show')->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|min:2|max:255',
            'menu' => 'required|min:2|max:30',
            'slug'  => 'required|min:2|alpha_dash|max:255|unique:pages',
        ));
        if ($request->input('slug') !== str_slug($request->input('slug')))
        {
            Session::flash("info2", 'The slug "'.$request->input('slug').'" has been changed to "'.str_slug($request->input('slug')).'"');
            // TODO: @laci @lang ^^
            Session::flash("info2_autohide", 5400);
            Session::flash("info2_flash_title", __("Slug Optimization"));
        }
        $p = new Page(array(
            'title' => $request->input('title'),
            'menutitle' => $request->input('menu'),
            'slug'  => str_slug($request->input('slug')),
        ));
        if (!Page::nav()->count())
        {
            $p->step = 2;
        }

        $p->save();
        Session::flash("success",__( "Page successfully created."));
        Session::flash("success_autohide", "4500");
        return redirect('/cmseven/pages/create/step/2/page/'.$p->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    private function postModule(Page $page, Request $request)
    {
        $page->module = $request->input("serial");
        $page->step   = 5;
        $page->save();
        Session::flash("success", __("Page Module has been successfully set up!"));
        Session::flash("success_autohide", "4500");
        return redirect('cmseven/pages/create/step/6/page/'.$page->id);
    }

    private function postUrl(Page $page, Request $request)
    {
        $page->url  = $request->input("serial");
        $page->step = 5;
        $page->save();
        Session::flash("success", __("Page redirect has been successfully set!"));
        Session::flash("success_autohide", "4500");
        return redirect('cmseven/pages/create/step/6/page/'.$page->id);}
}
