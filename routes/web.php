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

Auth::routes();
Route::post('/login/get_group_users', [App\Http\Controllers\Auth\LoginController::class, 'getGroupUsers'])->name('login.get_group_users');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
