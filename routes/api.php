<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout')->middleware('auth:api');
    Route::post('refresh', 'refresh')->middleware('auth:api');
});
Route::post('/products', [ProductController::class, 'store'])->middleware('auth:api');;
Route::get('/products', [ProductController::class, 'index']);
Route::put('/product/{id}', [ProductController::class, 'update'])->middleware('auth:api');;
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->middleware('auth:api');
