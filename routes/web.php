<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\OrderController;


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
Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.storeProduct');
Route::get('/admin/products/add', function () {
    return view('product.addProduct');  // Correct view path
})->name('admin.addProduct');
Route::get('/admin/products/list', [ProductController::class, 'showProducts'])->name('admin.productList');

Route::get('/index', [StripeController::class, 'index'])->name('index');
Route::post('/checkout', [StripeController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::get('/success', [StripeController::class, 'success'])->name('success');
Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');
Route::post('/checkout/process', [StripeController::class, 'processPayment'])->name('checkout.process');

Route::middleware('auth')->prefix('admin/orders')->name('admin.orders.')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('index'); // To show the order list
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'showDashboard'])->name('admin.dashboard');
});