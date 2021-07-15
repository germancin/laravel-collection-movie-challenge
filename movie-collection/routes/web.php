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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Movie Routes
Route::get('/movies', 'MovieController@index')->name('movies.index');
Route::get('/movies/{movie}', 'MovieController@show');
Route::get('/movies/create', 'MovieController@create');
Route::post('/movies', 'MovieController@store');
Route::get('/movies/{movie}/edit', 'MovieController@edit');
Route::put('/movies/{movie}', 'MovieController@update');
Route::delete('movies/{movie}', 'MovieController@destroy')->name('movies.destroy');

//Category Route
Route::get('/categories', 'CategoryController@index');