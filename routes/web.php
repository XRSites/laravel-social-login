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

use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::get('dashboard', 'HomeController@showDashboard')
    ->middleware(['auth']);

Route::get('login/{provider}', 'Auth\LoginController@auth')
    ->where(['provider' => 'facebook|google|twitter|github|meli']);

Route::get('login/{provider}/callback', 'Auth\LoginController@callback')
    ->where(['provider' => 'facebook|google|twitter|github|meli']);
