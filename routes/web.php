<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

//product

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');