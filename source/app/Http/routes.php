<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
Route::resource('post','PostController');
Route::get('/home', 'HomeController@index');
Route::get('/facility', 'ExtrasController@facility');
Route::get('/contact', 'ExtrasController@contact_us');
Route::get('/tax-benefits', 'ExtrasController@tax_benefits');
Route::resource('threads','ThreadController');
Route::get('/get-thread-url','ThreadController@getThreadUrl');
Route::get('/searchBarThread/{category}','SearchBarController@thread');
