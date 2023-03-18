<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\AuthController;
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

const AUTH_WEB = 'auth';
const GUEST_WEB = 'guest';


Route::middleware(AUTH_WEB)->prefix('users')->controller(UserController::class)->group (function () {
    Route::get('/index', 'index')->name('users.index');
    Route::get('/{id}/edit', 'edit')->name('users.edit')->where(['id'=> '[0-9]+']);
    Route::put('/{id}/update', 'update')->name('users.update')->where(['id'=> '[0-9]+']);
});

Route::middleware(GUEST_WEB)->prefix('users')->controller(AuthController::class)->group(function() {
    Route::post('/store', 'store')->name('users.store');
    Route::get('/register', 'create')->name('users.create');
    Route::get('/login', 'login')->middleware('guest')->name('login')->middleware(['throttle:users']);
    Route::post('/authenticate', 'authenticate')->name('users.authenticate');

});

Route::middleware(AUTH_WEB)->prefix('users')->controller(AuthController::class)->group (function () {
    Route::post('/logout', 'logout')->name('users.logout');
});
