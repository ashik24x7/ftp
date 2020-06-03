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
Route::get('/filter/{str}/{key?}/{value?}/{order?}','HomeController@filter');

Route::get('/movies/{key?}/{value?}/{order?}','MovieController@allMovies');
Route::get('/latest','MovieController@allMovies');
Route::get('/movie/{id}','MovieController@singleMovie');
Route::get('/admin','AdminController@getLogin');
Route::post('/admin','AdminController@postLogin');
Route::get('/admin/register','AdminController@getRegister');
Route::post('/admin/register','AdminController@postRegister');
Route::post('/shout','HomeController@shout');

Route::post('/search','HomeController@search');

Route::get('/games','GameController@getAllGame');
Route::get('/game/{id}','GameController@singleGame');



Route::get('/softwares','SoftwareController@allSoftwares');

Route::get('/software/{id}','SoftwareController@singleSoftware');

Route::get('/tv-series/{id}','TvseriesController@singleTvSeries');
Route::get('/tv-series','TvseriesController@allTvSeries');

Route::get('/tv-episodes','EpisodeController@allEpisodes');

Route::get('/tv-series/{tv}/season/{season}/episode/{episode}','EpisodeController@singleEpisode');

Route::group(['middleware'=>['admin']],function(){
	Route::get('/logout','AdminController@logout');
	Route::get('/admin/home','AdminController@getHome');
	Route::get('/admin/movie/manual','MovieController@getAddMovieManual');
	Route::post('/admin/movie/manual','MovieController@addMovieManual');

	Route::get('/admin/movie/auto','MovieController@getAddMovieAuto');
	Route::post('/admin/movie/auto','MovieController@addMovieAuto');
	Route::post('/movie/api','MovieController@api');
	Route::get('/admin/menu','MenuController@getMenu');
	Route::post('/admin/menu','MenuController@postMenu');
	
	Route::get('/admin/menu/delete/{id}','MenuController@deleteMenu');
	
	Route::get('/admin/menu/edit/{id}','MenuController@getEditMenu');
	
	Route::post('/admin/menu/edit/{id}','MenuController@editMenu');
	
	Route::get('/admin/submenu/edit/{id}','MenuController@editSubMenu');
	
	Route::get('/admin/submenu/edit/{id}','MenuController@getEditSubMenu');
	
	Route::post('/admin/submenu/edit/{id}','MenuController@editSubMenu');
	
	Route::get('/admin/menu/all','MenuController@getAllMenu');
	
	Route::get('/admin/sub-menu','MenuController@getSubMenu');
	Route::post('/admin/sub-menu','MenuController@postSubMenu');

	Route::get('/admin/movie/all-unpublished','MovieController@getAllUnpublisedMovies');
	Route::get('/admin/movie/all','MovieController@getAllMovies');
	Route::get('/admin/movie/{id}/edit','MovieController@getEditMovie');
	Route::post('/admin/movie/update','MovieController@updateMovie');
	Route::get('/admin/movie/filter/{id}','MovieController@getFilterMovies');
	Route::get('/admin/movie/search','MovieController@getAllMovies');
	Route::post('/admin/movie/search','MovieController@adminFilterMovies');

	Route::get('/admin/movie/{id}','MovieController@deleteMovie');

	Route::get('/admin/movie-publish/{publish}/{id}','MovieController@publishMovie');

	Route::get('/admin/software/add','SoftwareController@getAddSoftware');
	Route::post('/admin/software/add','SoftwareController@postAddSoftware');
	
	Route::get('/admin/software/all','SoftwareController@getAdminAllSoftwares');
	Route::get('/admin/software/search','SoftwareController@getAdminAllSoftwares');
	Route::post('/admin/software/search','SoftwareController@adminFilterSoftwares');
	Route::get('/admin/software/{id}','SoftwareController@deleteSoftware');

	Route::get('/admin/game/add','GameController@getAddGame');
	Route::post('/admin/game/add','GameController@postAddGame');
	
	Route::get('/admin/game/all','GameController@getAdminAllGames');
	Route::get('/admin/game/search','GameController@getAdminAllGames');
	Route::post('/admin/game/search','GameController@adminFilterGames');
	Route::get('/admin/game/{id}','GameController@deleteGame');
	
	Route::get('/admin/tv-series/add-new','TvseriesController@getAddTvSeriesNew');
	Route::post('/admin/tv-series/add-new','TvseriesController@postAddGameNew');

	Route::get('/admin/tv-series/add','TvseriesController@getAddTvSeries');
	Route::post('/admin/tv-series/manual','TvseriesController@postAddTvSeries');
	Route::post('/tv-series/api','TvseriesController@api');
	
	Route::get('/admin/tv-series/auto','TvseriesController@getAutoTvSeries');
	Route::post('/admin/tv-series/auto','TvseriesController@postAutoTvSeries');	

	Route::get('/admin/tv-series/all','TvseriesController@getAllTvSeries');
	Route::post('/admin/tv-series/all','TvseriesController@postAllTvSeries');
	
	Route::get('/admin/tv-series/delete/{id}','TvseriesController@deleteTvseries');

	Route::get('/admin/tv-series/search','TvseriesController@getAllTvSeries');
	Route::post('/admin/tv-series/search','TvseriesController@adminFilterTvSeries');
	
	Route::get('/admin/episode/auto/{id}','EpisodeController@getAutoEpisode');
	Route::post('/admin/episode/auto/{id}','EpisodeController@postAutoEpisode');

	Route::get('/admin/ftp', 'FtpController@ftp');
	
	Route::post('/admin/shout/reply', 'HomeController@shoutReply');
	Route::get('/admin/shout/{id}/delete/', 'HomeController@shoutDelete');


});
