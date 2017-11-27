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


Route::get('/home', 'ClientController@getAll')->name('home');

Route::get('/clients/{id?}', 'ClientController@getALL')->name('clients');

Route::get('/events/{id?}', 'EventController@getALL')->name('events');

Route::get('/login', 'LoginController@logIn')->name('login');
Route::post('/login', 'LoginController@authenticate');

Route::get('/user', 'UserController@get')->name('user');



