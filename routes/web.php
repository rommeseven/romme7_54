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
    Route::resource('/users', 'UserController');
    Route::resource('/permissions', 'PermissionController', array('except' => array('show', 'destroy')));

    Route::resource('/roles', 'RoleController', array('except' => array('destroy')));
    Route::get('/roles/find', 'RoleController@index');
    Route::post('/roles/find', 'RoleController@search');

    Route::get('/users/find', 'UserController@index');
    Route::get('/permissions/find', 'PermissionController@index');
    Route::post('/users/find', 'UserController@search');
    Route::post('/permissions/find', 'PermissionController@search');
});

Route::get('/home', 'HomeController@index')->name('home');
