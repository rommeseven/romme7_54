<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

if (App::environment('local'))
{
    Route::get('storage/{filename}', function ($filename)
    {
        $path = storage_path('app/'.$filename);

        if (!File::exists($path))
        {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    });
}

use App\Mail\TestEmail;
use App\Notifications\TestPageVisited;

Route::get("/qtest", function ()
{
    // Mail::to("laszlotakacs.95+emailtest@gmail.com")->send(new TestEmail);
    auth()->user()->notify(new TestPageVisited);

    return "Wait for it...";
});
Route::get("/dropbox", function ()
{

    echo '<img src="'.LAImg::url("bild.png").'" alt="" />';
    /*
    TODO: test dropbox @dropbox
     */
    echo "<br />";
    return " good MESSAGE ";
});

Route::get("/laciapp", function ()
{

LAImg::url("bild.png");

    return " good MESSAGE ";
});


Route::get("/cmseven/blank", function ()
{

    return " BLANK MESSAGE ";
});
Route::get("/cmseven/plugin/image-upload", function ()
{

    return view("backend.plugins.tinymce.jbimages.dialog");
});
Route::post("/cmseven/upload/image", function ()
{

    $result['result']      = "file_uploaded";
    $result['resultcode']  = 'ok';
    $result['oldfilename'] = request()->file("userfile");
    $result['file_name']   = Cloudder::upload($result['oldfilename'], null, array("width" => 1000, "height" => 1000, "crop" => "limit"))->getPublicId();
    // Output to user
    return view('backend.upload_result')->withResult($result['result'])->withResultcode($result['resultcode'])->withFilename($result['file_name']);

    /* // Failure

// Compile data for output
$result['result']       = $this->upload->display_errors(' ', ' ');
$result['resultcode']   = 'failed';

// Output to user
$this->load->view('ajax_upload_result', $result);
 */
});
/*
Route::get("/filetest", function ()
{

return view("filetest");

});

Route::post("/fileuploadtest", function ()
{
$result['file_name'] = request()->file("avatar")->getPathName();

dd(Cloudder::upload($result['file_name'], null, array("width" => 1000, "height" => 1000, "crop" => "limit"))->getPublicId());

return back();

});*/

Auth::routes();
Route::get('/{slug}', 'PagesController@getPage')->name('page');
Route::get('/', 'PagesController@index')->name('pages');
Route::prefix('cmseven')->middleware('auth')->group(function ()
{

    Route::get('/dashboard', 'ManageController@index')->name("dashboard");
    Route::get('/', 'ManageController@index')->name("home");
    Route::prefix('navigation')->group(function ()
    {
        Route::post('/', 'PageController@postNavigation');
        Route::get('/', 'PageController@getNavigation')->name("navigation");
        Route::put('/', 'PageController@putNavigation');
    });

    Route::resource('users', 'UserController');
    Route::prefix('users')->group(function ()
    {
        Route::get('/find', 'UserController@index')->name("users.find");
        Route::post('/find', 'UserController@search');
    });

    Route::resource('roles', 'RoleController', array('except' => array('destroy')));
    Route::prefix('roles')->group(function ()
    {
        Route::get('/find', 'RoleController@index')->name("roles.find");
        Route::post('/find', 'RoleController@search');
    });

    Route::resource('permissions', 'PermissionController', array('except' => array('show', 'destroy')));
    Route::prefix('permissions')->group(function ()
    {
        Route::get('/find', 'PermissionController@index')->name("permissions.find");
        Route::post('/find', 'PermissionController@search');
    });
    Route::prefix('settings')->group(function ()
    {
        Route::get('/', 'SettingController@index')->name("settings");
        Route::post('/', 'SettingController@update');
    });

    Route::resource('pages', 'PageController');
    Route::prefix('pages')->group(function ()
    {
        Route::get('/find', 'PageController@index')->name("pages.find");
        Route::post('/find', 'PageController@postSearch');

        Route::get('/{page}/preview', 'PageController@getPreview')->name("pagepreview");
        Route::get('/{page}/publish', 'PageController@publish')->name("pagepublish");
        Route::prefix('create')->group(function ()
        {
            Route::prefix('step')->group(function ()
            {
                Route::get('/2/page/{page}', 'PageController@navigation')->name("pageeditor.step2");

                Route::post('/3/page/{page}', 'PageController@postLayout')->name("pageeditor.poststep3");
                Route::get('/3/page/{page}', 'PageController@getLayout')->name("pageeditor.step3");

                Route::post('/4/page/{page}', 'PageController@postContent');
                Route::put('/4/column/{col}', 'PageController@putContent');
                Route::get('/4/page/{page}', 'PageController@getContent')->name("pageeditor.step4");

                Route::get('/5/page/{page}', 'PageController@getSettings')->name("pageeditor.step5");
                Route::post('/5/page/{page}', 'PageController@postSettings')->name("pageeditor.poststep5");

                Route::get('/6/page/{page}', 'PageController@getPublish')->name("pageeditor.step6");
            });
        });
    });
});
