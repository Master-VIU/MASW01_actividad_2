<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthControllerApi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

const AUTH = 'auth:sanctum';
const GUEST = 'guest';

Route::middleware(GUEST)->controller(AuthControllerApi::class)->group (function () {
    Route::post('register','register');
    Route::post('login', 'login');
});

Route::middleware(AUTH)->controller(AuthControllerApi::class)->group (function () {
    Route::get('users', 'usersList');
});