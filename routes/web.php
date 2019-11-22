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

Route::get('/addnewsource', 'PagesController@AddNewSourcePage');
Route::post('addnewsource', 'SourcesController@AddNewSource')->name('addnewsource');
Route::get('RedirectToHome', 'PagesController@ViewIndex')->name('RedirectToHome');
Route::get('checkeywords', 'KeywordsController@GetSuggestions')->name('checkeywords');

Route::get('/whosearched', 'PagesController@WhoSearched')->name('whosearched');

Route::get('/', 'PagesController@ViewIndex');
Route::post('login', 'UserController@LoginUser')->name('login');

Route::get('error',['as'=>'error', 'uses'=>'PagesController@ViewErrorPage']); // Error Page
