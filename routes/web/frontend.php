<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'PagesController@index')->name('pages');
Route::get('/{slug}', 'PagesController@getPage')->name('page');
