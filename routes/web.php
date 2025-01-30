<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;

//pages
Route::get('/', function () {
    return view('home');
});
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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//roles
Route::get('/admin', function () {
    if (Auth::user()->role !== 'admin') {
        abort(403, 'Unauthorized access');
    }
    return view('admin.dashboard');
})->middleware(['auth']);

//product

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

//cart

Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.index');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
