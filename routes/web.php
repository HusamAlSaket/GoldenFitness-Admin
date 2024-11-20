<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admins/dashboard', [AdminDashboardController::class, 'index'])->name('admins.dashboard');
Route::get('/admins/users', [UserController::class, 'index'])->name('admins.users');

Route::prefix('admins')->group(function () {
    // List products
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    
    // Create Product
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    
    // Store Product
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    
    // Show Product
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    
    // Edit Product
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    
    // Update Product
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    
    // Delete Product
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});
require __DIR__.'/auth.php';
