<?php

namespace App\Http\Controllers;

use App\Column;
use App\LayoutTemplate;
use App\Page;
use App\Row;
use Illuminate\Http\Request;
use Session;

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
        //
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
            dump("page not in step 4");
            dd($page);
// TODO: ERROR MSG
        }
        $collection = collect($page->load("rows.columns")->toArray());
        $collection = $collection->toJson();
        $collection = str_replace("columns", "cols", $collection);

        // TODO WEITERMAChEN
        return view("backend.pages.step3")->withPage($page)->withRows($collection);
    }

    public function getLayout(Page $page)
    {
        if ($page->step != 3)
        {
            dump("page not in step 3");
            dd($page);
// TODO: ERROR MSG
        }
        // dd(LayoutTemplate::where('id',4)->with("rows.columns")->first()->toArray()["rows"]);
        // $collection = collect(LayoutTemplate::where('id', 4)->with("rows.columns")->first()["rows"]);
        // $collection = $collection->sortBy('id')->toJson();
        // $collection = str_replace("columns", "cols", $collection);

        $bigcollection = collect(LayoutTemplate::with("rows.columns")->get());

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
            Session::flash("error", "There are no pages. Create one first!");

            return redirect('/manage/pages/create');
        }
        $pages = Page::nav()->get();
        return view("backend.navigation.sort")->withPages($pages);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            return redirect('/manage/pages/create/step/3/page/'.$page->id);
        }
        elseif ($page->published)
        {
            return redirect('/manage/pages/create/step/3/page/'.$page->id);
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
            Session::flash("success", "Page layout has been successfully set! Proceed to the next step.");
            return redirect('manage/pages/create/step/4/page/'.$page->id);
        }
        else
        {
            if (!$request->has("layoutname"))
            {
                dd("TODO: GENERAL ERROR1");
            }
            $templ = LayoutTemplate::firstOrCreate(array('name' => $request->layoutname));
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
            Session::flash("success", "Layout Templated created!");
            return redirect('manage/pages/create/step/3/page/'.$page->id);
        }
    }

    public function postLayout(Page $page, Request $request)
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
            Session::flash("success", "Page layout has been successfully set! Proceed to the next step.");
            return redirect('manage/pages/create/step/4/page/'.$page->id);
        }
        else
        {
            if (!$request->has("layoutname"))
            {
                dd("TODO: GENERAL ERROR1");
            }
            $templ = LayoutTemplate::firstOrCreate(array('name' => $request->layoutname));
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
            Session::flash("success", "Layout Templated created!");
            return redirect('manage/pages/create/step/3/page/'.$page->id);
        }
    }

    public function postNavigation(Request $request)
    {
        $pages = str_replace('anchor#', null, $request->pages);
        parse_str($pages, $list);
        $toBePublished            = Page::findOrFail($request->input("page"));
        $toBePublished->published = true;
        $toBePublished->step      = 3;
        $toBePublished->save();
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
        Session::flash("success", "Page successfully added to the navigation. Proceed to the next step.");
        return redirect()->route("pageeditor.step3", $toBePublished->id);
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
        Session::flash("success", "Your changes have been saved!");
        return redirect("manage/navigation");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
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
        ));
        $p        = new Page();
        $p->title = $request->input('title');
        if (!Page::nav()->count())
        {
            $p->published = "true";
            $p->step      = 2;
        }
        $p->save();
        Session::flash("success", "Page successfully created. Proceed to the next step");
        return redirect('/manage/pages/create/step/2/page/'.$p->id);
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
}
/*
TODO: overwrite box
TODO: navigation tutorial
 */
