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
Route::get('/filter/{str}','HomeController@filter');

Route::get('/movies','MovieController@allMovies');
Route::get('/movie/{id}','MovieController@singleMovie');
Route::get('/admin','AdminController@getLogin');
Route::post('/admin','AdminController@postLogin');
Route::get('/admin/register','AdminController@getRegister');
Route::post('/admin/register','AdminController@postRegister');
Route::post('/shout','HomeController@shout');

Route::post('/search','HomeController@search');

Route::get('/games','GameController@getAllGame');
Route::get('/game/{id}','GameController@getSingleGame');



Route::get('/softwares','SoftwareController@allSoftwares');

Route::get('/tv-series/{id}','TvseriesController@singleTvSeries');
Route::get('/tv-series','TvseriesController@allTvSeries');

Route::get('/tv-series/{tv}/season/{season}/episode/{episode}','EpisodeController@singleEpisode');

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

	Route::get('/admin/movie/all','MovieController@getAllMovies');
	Route::get('/admin/movie/{id}/edit','MovieController@getEditMovie');
	Route::post('/admin/movie/update','MovieController@updateMovie');
	Route::get('/admin/movie/filter/{id}','MovieController@getFilterMovies');
	Route::get('/admin/movie/search','MovieController@getAllMovies');
	Route::post('/admin/movie/search','MovieController@adminFilterMovies');

	Route::post('/admin/movie/{id}','MovieController@deleteMovie');

	Route::get('/admin/software/add','SoftwareController@getAddSoftware');
	Route::post('/admin/software/add','SoftwareController@postAddSoftware');

	Route::get('/admin/game/add','GameController@getAddGame');
	Route::post('/admin/game/add','GameController@postAddGame');
	
	Route::get('/admin/tv-series/add','TvseriesController@getAddTvSeries');
	Route::post('/admin/tv-series/add','TvseriesController@postAddGame');
	
	Route::get('/admin/tv-series/auto','TvseriesController@getAutoTvSeries');
	Route::post('/admin/tv-series/auto','TvseriesController@postAutoTvSeries');	

	Route::get('/admin/tv-series/all','TvseriesController@getAllTvSeries');
	Route::post('/admin/tv-series/all','TvseriesController@postAllTvSeries');
	
	Route::get('/admin/episode/auto/{id}','EpisodeController@getAutoEpisode');
	Route::post('/admin/episode/auto/{id}','EpisodeController@postAutoEpisode');


});
