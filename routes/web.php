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



Route::get('/', 'ClientController@getAll')->name('home');

Route::get('/clients/{id?}', 'ClientController@getALL')->name('clients');
Route::post('/clients', 'ClientController@create')->name('client_create');
Route::post('/client/take/{id}', 'ClientController@take')->name('client_take');
Route::post('/client/transfer/{id}', 'ClientController@transfer')->name('client_transfer');

Route::get('/events/{id?}', 'EventController@getALL')->name('events');
Route::post('/events/{id}', 'EventController@complete')->name('event_delete');
Route::post('/event', 'EventController@create')->name('event_create');
Route::post('/transfer', 'EventController@transfer')->name('event_transfer');

Route::get('/login', 'LoginController@logIn')->name('login');
Route::post('/login', 'LoginController@authenticate');
Route::get('/logout', 'LoginController@logOut')->name('logout');

Route::get('/user', 'StatisticsController@getUser')->name('user');
Route::get('/statistics', 'StatisticsController@get')->name('statistics');

Route::post('/user', 'UserController@create')->name('user_create');

Route::get('/desk/{id?}', 'ClientController@getDesk')->name('desk');

Route::get('/file', 'ExcelController@get')->name('file');
Route::post('/file', 'ExcelController@importExcel')->name('import');



