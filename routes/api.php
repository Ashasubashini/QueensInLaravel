<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\StripeController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Authentication Routes
Route::post('/register', [AuthController::class, 'register']); 
Route::post('/login', [AuthController::class, 'login']);       
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/products', [ProductController::class, 'getProducts']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/cart/add', [CartController::class, 'addToCart']);
    Route::get('/cartx', [CartController::class, 'showCart']);
    Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart']);
});



Route::post('/checkout', [StripeController::class, 'checkout']);
Route::get('/success', [StripeController::class, 'success']);