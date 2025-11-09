<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Test\QuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');


Route::group(['prefix' => 'user', 'middleware' => 'auth:api'], function () {
    Route::get('/me', [UserController::class, 'me'])->name('user.me');
});
