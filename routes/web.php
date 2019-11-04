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

Route::group(['middleware'=> 'CheckUserAuth'], function() {
    Route::get('/', 'PagesController@ViewHomePage');
    // Route::get('/addnewsource', 'PagesController@AddNewSourcePage');
    // Route::post('addnewsource', 'SourcesController@AddNewSource')->name('addnewsource');
});
Route::get('/addnewsource', 'PagesController@AddNewSourcePage');
Route::post('addnewsource', 'SourcesController@AddNewSource')->name('addnewsource');

Route::get('/', 'PagesController@ViewLoginPage');
Route::post('login', 'UserController@LoginUser')->name('login');

Route::get('error',['as'=>'error', 'uses'=>'PagesController@ViewErrorPage']); // Error Page
