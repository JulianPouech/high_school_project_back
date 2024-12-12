<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/product', [ProductController::class, 'upload']);
Route::get('/product', [ProductController::class, 'index']);
