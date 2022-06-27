<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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

Route::get('/', function(){
    return view('regi');
});

Route::post('/regi', 'App\Http\Controllers\RegController@register')->name('regi');
Route::get('/show', 'App\Http\Controllers\RegController@show')->name('show');
Route::get('/regi/username/{q}', 'App\Http\Controllers\RegController@checkUsername');
Route::get('/regi/email/{q}', 'App\Http\Controllers\RegController@checkEmail');

Route::get('/login', 'App\Http\Controllers\LogController@show')->name('login');
Route::get('/login/username/{q}/password/{x}', 'App\Http\Controllers\LogController@checkUtente');
Route::get('/logout', 'App\Http\Controllers\LogController@logout');

Route::post('/home','App\Http\Controllers\HomeController@show')->name('home');
Route::get('/home','App\Http\Controllers\HomeController@red');
Route::get('/cerca/{ev}/{nazione}/{data}', 'App\Http\Controllers\HomeController@cerca')->name('cerca');

Route::post('/pref', 'App\Http\Controllers\PrefController@aggiungi');
Route::get('/gestionepref', 'App\Http\Controllers\PrefController@gestione');
Route::get('/numero', 'App\Http\Controllers\PrefController@numero');
Route::post('/rempref', 'App\Http\Controllers\PrefController@rimuovi');

Route::get('/account', 'App\Http\Controllers\AccountController@account');