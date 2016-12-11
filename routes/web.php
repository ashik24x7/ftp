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
	Route::get('/admin/movie/manual','MovieController@getAddMovieManual');
	Route::post('/admin/movie/manual','MovieController@addMovieManual');

	Route::get('/admin/movie/auto','MovieController@getAddMovieAuto');
	Route::post('/admin/movie/auto','MovieController@addMovieAuto');
	Route::post('/movie/api','MovieController@movieApi');
	Route::get('/admin/menu','MenuController@getMenu');
	Route::post('/admin/menu','MenuController@postMenu');
	Route::get('/admin/sub-menu','MenuController@getSubMenu');
	Route::post('/admin/sub-menu','MenuController@postSubMenu');

	Route::get('/admin/movie/quality','MovieController@getAddQuality');
	Route::post('/admin/movie/quality','MovieController@postQuality');
});
