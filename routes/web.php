<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index'); //After Login
Route::get('/', 'HomeController@index')->name('home'); // General home

//Users Lists
Route::get('/moviesList/{id}', 'SavedObjectsController@moviesUser')->name('moviesList');
Route::get('/showsList/{id}', 'SavedObjectsController@showsUser')->name('showsList');
Route::get('/booksList/{id}', 'SavedObjectsController@booksUser')->name('booksList');

//save user Object
Route::post('/saveMovieUser', 'SavedObjectsController@saveMovieUser');
Route::post('/saveShowUser', 'SavedObjectsController@saveShowUser');
Route::post('/saveBookUser', 'SavedObjectsController@saveBookUser');



//Detail objects views
Route::get('/movie/{id}', 'CachesController@indexMovie')->name('movie');
Route::get('/show/{id}', 'CachesController@indexShow')->name('shows');
Route::get('/book/{id}', 'CachesController@indexBook')->name('books');

//Save and get Movie and shows
Route::post('/saveMovieOrShow', 'CachesController@saveMovieOrShow');
Route::get('/getMovieOrShow/{id}', 'CachesController@getMovieOrShow');

//Save and get Book
Route::post('/saveBook', 'CachesController@saveBook');
Route::get('/getBook/{id}', 'CachesController@getBook');



Route::post('/search', 'SearchController@search');


Auth::routes();