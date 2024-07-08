<?php
use Illuminate\Support\Facades\Route;

// Movies
Route::middleware('page-cache')->get('/', 'MoviesController@index')->name('movies.index');
Route::get('/movies', 'MoviesController@movies')->name('movies.movies');
Route::get('/search/{search}', 'MoviesController@search')->name('movies.search');
Route::get('/tv-series', 'MoviesController@series')->name('movies.series');
Route::get('/movies/{id}', 'MoviesController@show')->name('movies.show');

Route::get('/years/{year}', 'MoviesController@year')->name('movies.year');
Route::get('/country/{country}', 'MoviesController@country')->name('movies.country');
Route::get('/actor/{actor}', 'MoviesController@actor')->name('movies.actor');
Route::get('/director/{director}', 'MoviesController@director')->name('movies.director');
Route::get('/networks/{network}', 'MoviesController@network')->name('movies.network');
Route::get('/genre/{tag}', 'MoviesController@tag')->name('movies.tag');
Route::get('/letter/{latter}', 'MoviesController@letter')->name('movies.letter');
Route::get('/networks', 'MoviesController@networks')->name('movies.networks');
Route::get('/collection', 'MoviesController@collection')->name('movies.collection');
Route::get('/collection/{collection}', 'MoviesController@collection_search')->name('movies.collection_search');



