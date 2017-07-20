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

Route::get('/403', 'ManageController@no_permission');
Route::prefix('manage')
//->middleware('role:superadministrator|administrator')
->group(function ()
{
	Route::get('/', 'ManageController@index');
	Route::resource('/users', 'UserController');

});

Route::get('/home', 'HomeController@index')->name('home');
