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
    return view('auth.login');
});

//Route::get('/clients','ClientsController@index');

//Route::get('/clients/create','ClientsController@create');

Route::resource('clients','ClientsController')->middleware('auth');

//se desactiva el registro ['register'=>false]
Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');
