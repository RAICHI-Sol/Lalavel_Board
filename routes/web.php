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

// Route::get('/',function(){
//     return view('home');
// });

Route::get('/create',function(){
    return view('create_view');
});

Route::get('/login',function(){
    return view('login');
});

Route::post('/create/add','App\Http\Controllers\Test@create');

Route::post('/login/ok','App\Http\Controllers\Test@login');

Route::get('/mypage/{id}','App\Http\Controllers\Test@show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
