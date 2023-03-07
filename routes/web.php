<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

/*Route::controller(UserController::class)->group(function() {
    Route::get('/index', 'index');
    Route::get('/registro', 'create');
    Route::post('/store', 'store');
});*/
Route::get('/registro', [UserController::class, 'create'])->name('users.create');
Route::post('/store', [UserController::class, 'store'])->name('users.store');
Route::get('/index', [UserController::class, 'index'])->name('users.index');
Route::delete('/index/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/{id}/editar', [UserController::class, 'edit'])->name('users.edit');
Route::put('/{id}/update', [UserController::class, 'update'])->name('users.update');
    