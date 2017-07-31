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

Route::get('/', 'PagesController@index')->name('pages');
Auth::routes();

Route::prefix('manage')->group(function ()
{
    Route::get('/', 'ManageController@index');
    Route::prefix('navigation')->group(function ()
    {
        Route::post('/', 'PageController@postNavigation');
        Route::get('/', 'PageController@getNavigation');
        Route::put('/', 'PageController@putNavigation');
    });

    Route::resource('users', 'UserController');
    Route::prefix('users')->group(function ()
    {
        Route::get('/find', 'UserController@index');
        Route::post('/find', 'UserController@search');
    });

    Route::resource('roles', 'RoleController', array('except' => array('destroy')));
    Route::prefix('roles')->group(function ()
    {
        Route::get('/find', 'RoleController@index');
        Route::post('/find', 'RoleController@search');

    });

    Route::resource('permissions', 'PermissionController', array('except' => array('show', 'destroy')));
    Route::prefix('permissions')->group(function ()
    {
        Route::get('/find', 'PermissionController@index');
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

        Route::prefix('create')->group(function ()
        {
            Route::prefix('step')->group(function ()
            {
                Route::get('/2/page/{page}', 'PageController@navigation')->name("pageeditor.step2");

                Route::post('/3/page/{page}', 'PageController@postLayout');
                Route::get('/3/page/{page}', 'PageController@getLayout')->name("pageeditor.step3");

                Route::post('/4/page/{page}', 'PageController@postContent');
                Route::put('/4/column/{col}', 'PageController@putContent');
                Route::get('/4/page/{page}', 'PageController@getContent')->name("pageeditor.step4");                
            });
        });

    });

});

Route::get('/home', 'HomeController@index')->name('home');
