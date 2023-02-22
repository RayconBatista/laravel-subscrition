<?php

use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/contact', [ContactController::class, 'sendContact']);
Route::resource('/products', ProductController::class);
