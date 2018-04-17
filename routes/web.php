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


Route::get('/', 'PostEditorController@browser');
Route::post('/', 'PostEditorController@browser');

Route::get('/browse/', 'PostEditorController@browser');
Route::post('/browse/', 'PostEditorController@browser');

Route::get('/post/', 'PostEditorController@index');
Route::post('/post/', 'PostEditorController@index');

Route::get('/bill/', 'BillController@index');
Route::post('/bill/', 'BillController@calculate');

