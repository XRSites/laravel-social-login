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
    return view('home');
});

Route::get('login', 'Auth\LoginController@showLoginPage');

Route::get('dashboard', 'HomeController@showDashboard')
    ->middleware(['auth']);

Route::get('logout', 'Auth\LoginController@logout');

Route::get('login/{provider}', 'Auth\LoginController@auth')
    ->where(['provider' => 'facebook|google|twitter|github']);

Route::get('login/{provider}/callback', 'Auth\LoginController@login')
    ->where(['provider' => 'facebook|google|twitter|github']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
