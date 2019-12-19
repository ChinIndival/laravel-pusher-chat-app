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

Route::group(['middleware' => ['auth']], function () 
{
    Route::get('/chat', 'ChatController@index')->name('chat');
    Route::get('/getMess', 'ChatController@getMess')->name('getMess');
    Route::get('/getMess2', 'ChatController@getMess2')->name('getMess2');
    Route::post('/storeMess', 'ChatController@storeMess')->name('storeMess');
});
