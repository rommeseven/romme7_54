<?php

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
 */
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
    /* // Failure TODO: jbimages fail msg

// Compile data for output
$result['result']       = $this->upload->display_errors(' ', ' ');
$result['resultcode']   = 'failed';

// Output to user
$this->load->view('ajax_upload_result', $result);
 */
});

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
    Route::prefix('my-settings')->group(function ()
    {
        Route::get('/', 'UserSettingController@getSettings')->name("usersettings");
        Route::post('/', 'UserSettingController@postSettings')->name("usersettings.post");
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

    Route::resource('pages', 'PageController', array('except' => array('edit', 'update')));
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
        Route::prefix('edit')->group(function ()
        {
            Route::get('/{page}', 'PageController@editPublish')->name("pages.edit");
            Route::prefix('step')->group(function ()
            {
                Route::get('/1/page/{page}', 'PageController@edit')->name("pages.edit.step1");
                Route::post('/1/page/{page}', 'PageController@update')->name("pages.post.edit.step1");
                // Route::get('/2/page/{page}', 'PageController@editNavigation')->name("pages.edit.step2");
                Route::get('/4/page/{page}', 'PageController@getContent')->name("pages.edit.step4");
                Route::get('/5/page/{page}', 'PageController@editSettings')->name("pages.edit.step5");

            });
        });
    });
    Route::prefix('notifications')->group(function ()
    {
        Route::get('/{id}/delete', 'NotificationController@delete')->name("notif.delete");
        Route::get('/{id}', 'NotificationController@markAsRead')->name("notif.read");
        Route::get('/', 'NotificationController@markAllAsRead')->name("notif.readAll");
    });
});
