<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
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

Route::controller(UserController::class)->group (function () {
    Route::get('/index', 'index')->name('users.index')->middleware('auth');
    Route::post('/store', 'store')->name('users.store');
    Route::get('/register', 'create')->name('users.create')->middleware('guest');
    Route::get('/{id}/edit', 'edit')->name('users.edit')->middleware('auth');
    Route::put('/{id}/update', 'update')->name('users.update')->middleware('auth');
});

Route::controller(AuthController::class)->group(function() {
    Route::get('/login', 'login')->middleware('guest')->name('login')->middleware('guest')->middleware(['throttle:users']);
    Route::post('/authenticate', 'authenticate')->name('users.authenticate');
    Route::get('/logout', 'logout')->name('users.logout')->middleware('auth');

});
