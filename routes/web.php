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
Route::get('/register/a','Lane1Controller@index');
Route::post('/register/a','Lane1Controller@store');

Route::get('/register/b','Lane2Controller@index');
Route::post('/register/b','Lane2Controller@store');
Route::get('/register/c','Lane3Controller@index');
Route::post('/register/c','Lane3Controller@store');
Route::get('/register/d','Lane4Controller@index');
Route::post('/register/d','Lane4Controller@store');

Route::get('/search','RegisterController@index');
Route::post('/search','RegisterController@search');


Route::get('/register/{id}/edit','RegisterController@edit');
Route::post('/register/{id}/update','RegisterController@update');
