<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','HomeController@index');
Route::get('/admin','AdminController@getLogin');
Route::post('/admin','AdminController@postLogin');
Route::get('/admin/register','AdminController@getRegister');
Route::post('/admin/register','AdminController@postRegister');

Route::group(['middleware'=>'admin'],function(){
	Route::get('/admin/home','AdminController@getHome');
});
