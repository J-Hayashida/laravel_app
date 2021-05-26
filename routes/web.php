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

Route::get('/', function () {
    return view('welcome');
});

// ログイン
Auth::routes();
Route::post('/login/get_group_users', [App\Http\Controllers\Auth\LoginController::class, 'getGroupUsers'])->name('login.get_group_users');

// メニュー
Route::get('/home', [App\Http\Controllers\MenuController::class, 'index'])->middleware('auth');
Route::get('/home/{any}', [App\Http\Controllers\MenuController::class, 'index'])->where('any', '.*')->middleware('auth');
Route::get('/menu/get_menu_tilte', [App\Http\Controllers\MenuController::class, 'getMenuTitle']);
Route::get('/menu/get_child_menu', [App\Http\Controllers\MenuController::class, 'getChildMenu']);

// サンプル
Route::get('/example', [App\Http\Controllers\ExampleController::class, 'index']);
Route::post('/example/send', [App\Http\Controllers\ExampleController::class, 'send']);

