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
Route::get('/registration','PreregistController@index');
Route::post('/registration/post','PreregistController@store');
Route::get('/register/a','Lane1Controller@index');
Route::post('/register/a/post','Lane1Controller@store');
Route::get('/register/b','Lane2Controller@index');
Route::post('/register/b/post','Lane2Controller@store');
Route::get('/register/c','Lane3Controller@index');
Route::post('/register/c/post','Lane3Controller@store');
Route::get('/register/d','Lane4Controller@index');
Route::post('/register/d/post','Lane4Controller@store');

Route::get('/search','RegisterController@index');
Route::post('/search','RegisterController@search');

Route::get('/register/{id}/edit','RegisterController@edit');
Route::post('/register/{id}/update','RegisterController@update');

Route::get('/search/order','PreregistController@show');
Route::post('/search/order','RegisterController@search');

Route::get('/search/{id}/edit','PreregistController@edit');
Route::post('/search/{id}/update','PreregistController@update');

Route::get('/user','RegisterController@viewinput');

Route::post('/user/edit','RegisterController@searchv1');

Route::post('/user/update','RegisterController@changes');


Route::get('/luckydraw','PreregistController@luckyview');
Route::post('/luckydraw/post','PreregistController@luckydata');

Route::get('/games','RegisterController@games');
Route::post('/games/user','RegisterController@gameslogin');


