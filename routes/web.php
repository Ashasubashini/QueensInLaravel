<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashboardController;

//pages
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/history', function () {
    return view('history');
})->name('history');

Route::get('/service', function () {
    return view('service');
})->name('service');

Route::get('/watchmaking', function () {
    return view('watchmaking');
})->name('watchmaking');

// Home and Product Routes
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Cart Routes
Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.index');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
});

// Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Admin Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [UserController::class, 'showUsers'])->name('admin.dashboard');
    Route::delete('/admin/users/{id}', [UserController::class, 'removeUser'])->name('admin.removeUser');
    Route::get('/admindashboard', [AdminDashboardController::class, 'index'])->name('admindashboard');
});

// Product Management Routes
Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products');  // This is the route you need
Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('product.editProduct');
Route::put('/admin/products/{id}', [ProductController::class, 'updateProduct'])->name('admin.updateProduct');
Route::delete('/admin/products/{id}', [ProductController::class, 'removeProduct'])->name('admin.removeProduct');
