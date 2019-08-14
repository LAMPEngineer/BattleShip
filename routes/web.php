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

Route::get('play', "GameController@index");

Route::post('/player1', "GameController@postIndex1");

Route::post('/player2', "GameController@postIndex2");

Route::post('/reset', "GameController@postReset");