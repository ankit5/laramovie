<?php
use Illuminate\Support\Facades\Route;

// Movies
Route::middleware('page-cache')->get('/', 'MoviesController@index')->name('movies.index');
Route::middleware('page-cache')->get('/front/{page}', 'MoviesController@index')->name('movies.index');

// Route::middleware('page-cache')->get('/', 'MoviesControllerNew@index')->name('movies.index');
// Route::middleware('page-cache')->get('/page/{page}', 'MoviesControllerNew@index')->name('movies.index');

// Route::middleware('page-cache')->get('/views/ajax', 'MoviesControllerNew@viewsajax')->name('movies.viewsajax');

// Route::middleware('page-cache')->get('/engine/ajax/custom', 'MoviesControllerNew@ajaxcustom')->name('movies.ajaxcustom');


Route::middleware('page-cache')->get('/films', 'MoviesController@movies')->name('movies.movies');
Route::middleware('page-cache')->get('/films/{page}', 'MoviesController@movies')->name('movies.movies');

Route::get('/search', 'MoviesController@search2')->name('movies.search2');
Route::middleware('page-cache')->get('/search/{search}', 'MoviesController@search')->name('movies.search');
Route::middleware('page-cache')->get('/search/{search}/{page}', 'MoviesController@search')->name('movies.search3');

Route::middleware('page-cache')->get('/series', 'MoviesController@series')->name('movies.series');
Route::middleware('page-cache')->get('/series/{page}', 'MoviesController@series')->name('movies.series');

Route::middleware('page-cache')->get('/{id}', 'MoviesController@show')->name('movies.show');
Route::middleware('page-cache')->get('/{id}/{player_movie}', 'MoviesController@show')->name('movies.show');

Route::middleware('page-cache')->get('/release-year/{year}', 'MoviesController@year')->name('movies.year');
Route::middleware('page-cache')->get('/release-year/{year}/{page}', 'MoviesController@year')->name('movies.year');

Route::middleware('page-cache')->get('/country/{country}', 'MoviesController@country')->name('movies.country');
Route::middleware('page-cache')->get('/country/{country}/{page}', 'MoviesController@country')->name('movies.country');

Route::middleware('page-cache')->get('/actor/{actor}', 'MoviesController@actor')->name('movies.actor');
Route::middleware('page-cache')->get('/actor/{actor}/{page}', 'MoviesController@actor')->name('movies.actor');

Route::middleware('page-cache')->get('/director/{director}', 'MoviesController@director')->name('movies.director');
Route::middleware('page-cache')->get('/director/{director}/{page}', 'MoviesController@director')->name('movies.director');


Route::middleware('page-cache')->get('/genre/{tag}', 'MoviesController@tag')->name('movies.tag');
Route::middleware('page-cache')->get('/genre/{tag}/{page}', 'MoviesController@tag')->name('movies.tag');

Route::middleware('page-cache')->get('/letter/{latter}', 'MoviesController@letter')->name('movies.letter');
Route::middleware('page-cache')->get('/letter/{latter}/{page}', 'MoviesController@letter')->name('movies.letter');

Route::middleware('page-cache')->get('/networks', 'MoviesController@networks')->name('movies.networks');
Route::middleware('page-cache')->get('/networks/{network}', 'MoviesController@network')->name('movies.network');
Route::middleware('page-cache')->get('/networks/{network}/{page}', 'MoviesController@network')->name('movies.network');

Route::middleware('page-cache')->get('/collection', 'MoviesController@collection')->name('movies.collection');
Route::middleware('page-cache')->get('/collection/{collection}', 'MoviesController@collection_search')->name('movies.collection_search');
Route::middleware('page-cache')->get('/collection/{collection}/{page}', 'MoviesController@collection_search')->name('movies.collection_search');



