<?php

use Illuminate\Http\Request;
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

Route::middleware('guest')->group(function () {
    Route::post('register', [AuthControllerApi::class, 'register']);
    Route::post('login', [AuthControllerApi::class, 'login']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('users', [AuthControllerApi::class, 'usersList']);
});