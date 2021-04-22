<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/','App\Http\Controllers\Test@index');

Route::get('/create',function(){
    return view('Auth/create_view');
});

Route::get('/logout',function(){
    return view('home_temp');
});

Route::post('/logout','App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::post('/create/add','App\Http\Controllers\Test@create');

Route::get('/login','App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');

Route::post('/login','App\Http\Controllers\Auth\LoginController@login');

Route::get('/mypage','App\Http\Controllers\Test@show');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
