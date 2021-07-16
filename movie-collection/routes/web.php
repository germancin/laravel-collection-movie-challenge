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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

// Movie Routes
// ->name assigns name to route, ->middleware makes user sign in to access route
// Used to show list of movies
Route::get('/movies', 'MovieController@index')->name('movies.index');

// Used to create movies
Route::get('/movies/create', 'MovieController@create')->middleware('auth');
Route::post('/movies', 'MovieController@store');

// Used to show specific movie info
Route::get('/movies/{movie}', 'MovieController@show')->name('movies.show');

// Used to edit/update movie
Route::get('/movies/{movie}/edit', 'MovieController@edit')->middleware('auth');
Route::put('/movies/{movie}', 'MovieController@update');

// Called by a form on movie.show page, deletes current movie
Route::delete('movies/{movie}', 'MovieController@destroy')->name('movies.destroy')->middleware('auth');

// Category Route
Route::get('/categories', 'CategoryController@index');