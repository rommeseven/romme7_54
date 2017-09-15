<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'PagesController@index')->name('pages');
Route::post('/kontakt', 'PagesController@postContact')->name('kontakt');
Route::get('/{slug}', 'PagesController@getPage')->name('page');
