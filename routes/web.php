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

Route::get('/', 'AlbumController@index');
Route::get('/albums', 'AlbumController@index');
Route::get('/albums/create', 'AlbumController@create');
Route::get('/albums/{id}', 'AlbumController@show');
Route::post('/albums/store', 'AlbumController@store');