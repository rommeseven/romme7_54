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

Route::prefix('manage')
//->middleware('role:superadministrator|administrator')
->group(function ()
{
    Route::get('/', 'ManageController@index');

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

});

Route::get('/home', 'HomeController@index')->name('home');
