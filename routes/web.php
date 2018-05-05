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

// /
Route::get('/', 'PostController@browser');
Route::post('/', 'PostController@search');

// post
Route::get('/posts', 'PostController@browser');
Route::post('/posts', 'PostController@search');

// Create
Route::get('/posts/create', 'PostController@create');
Route::post('/posts/create', 'PostController@store');

// View
Route::get('/posts/{id}', 'PostController@show');

// Edit
Route::put('/posts/{id}/edit', 'PostController@update');
Route::get('/posts/{id}/edit', 'PostController@edit');

// Delete
Route::delete('/posts/{id}', 'PostController@destroy');
Route::get('/posts/{id}/delete', 'PostController@delete');
