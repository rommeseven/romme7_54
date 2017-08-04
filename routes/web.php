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

Route::get('/{slug}', 'PagesController@getPage')->name('page');
Route::get('/', 'PagesController@index')->name('pages');
Auth::routes();
Route::prefix('cmseven')->group(function ()
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
