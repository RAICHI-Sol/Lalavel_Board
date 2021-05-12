<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;

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

//ホーム画面でのグループ化
Route::prefix('')->group(function(){
    Route::get('/',[BoardController::class,'index'])->name('home_get');
    Route::post('/', [HomeController::class, 'index'])->name('home');
    Route::get('/result', [BoardController::class, 'search'])->name('result');
    Route::get('/gide',function(){return view('gide');})->name('gide');
    Route::put('/update',[BoardController::class,'update']);
    Route::delete('/delete',[BoardController::class, 'delete']);
});

//ボード作成クラス
Route::prefix('make')->group(function(){
    Route::get('/',function(){return view('make');})->name('make_get')->middleware('auth');
    Route::post('/',[BoardController::class, 'create'])->name('make');
});

//プロフィール関連のグループ化
Route::prefix('profile')->group(function(){
    Route::get('/{id}',[ProfileController::class,'show'])->name('profile_get');
});

//設定関連のグループ化
Route::prefix('setting')->group(function(){
    Route::get('/profile',[ProfileController::class,'setting'])->name('set_prof')->middleware('auth');
    Route::put('/profile',[ProfileController::class,'update'])->name('setting');

    Route::get('/account',function(){return view('account');})->name('set_account')->middleware('auth');
    Route::delete('/account/destroy',[UserController::class,'destroy'])->name('destroy');
});

//ログイン処理でのグループ化
Route::prefix('login')->group(function(){
    Route::get('/',[LoginController::class,'showLoginForm'])->name('login');
    Route::post('/',[LoginController::class,'login']);
});

//ログアウト処理でのグループ化
Route::prefix('logout')->group(function(){
    Route::get('/',function(){return view('home');});
    Route::post('/',[LoginController::class,'logout'])->name('logout');
});

//アカウント作成処理でのグループ化
Route::prefix('create')->group(function(){
    Route::get('/',function(){return view('Auth/create_view');})->name('create');
    Route::post('/add',[UserController::class,'create']);
});

Route::prefix('chat')->group(function(){
    Route::get('{id}', [ChatController::class, 'show'])->name('chat')->middleware('auth');
    Route::post('{id}', [ChatController::class, 'add'])->name('message');
});

Route::get('/board/{id}', [BoardController::class, 'show']);
