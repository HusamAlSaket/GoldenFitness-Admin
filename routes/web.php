<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GymVideoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\UserSubscriptionController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\CartController;

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


Route::prefix('admins')->middleware(['admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admins.dashboard');

    // Product Routes
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Subscription Routes
    Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');
    Route::get('/subscriptions/create', [SubscriptionController::class, 'create'])->name('subscriptions.create');
    Route::post('/subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');
    Route::get('/subscriptions/{subscription}', [SubscriptionController::class, 'show'])->name('subscriptions.show');
    Route::get('/subscriptions/{subscription}/edit', [SubscriptionController::class, 'edit'])->name('subscriptions.edit');
    Route::put('/subscriptions/{subscription}', [SubscriptionController::class, 'update'])->name('subscriptions.update');
    Route::delete('/subscriptions/{subscription}', [SubscriptionController::class, 'destroy'])->name('subscriptions.destroy');

    // Messages Routes
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
    Route::post('/messages/{message}/reply', [MessageController::class, 'reply'])->name('messages.reply');

    // Review Routes
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::get('/reviews/{review}', [ReviewController::class, 'show'])->name('reviews.show');
    Route::post('reviews/{review}/change-status', [ReviewController::class, 'changeStatus'])->name('reviews.changeStatus');

    // Categories Routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Gym Videos Routes
    Route::get('/videos', [GymVideoController::class, 'index'])->name('videos.index');
    Route::get('/videos/create', [GymVideoController::class, 'create'])->name('videos.create');
    Route::post('/videos', [GymVideoController::class, 'store'])->name('videos.store');
    Route::get('/videos/{video}', [GymVideoController::class, 'show'])->name('videos.show');
    Route::get('/videos/{video}/edit', [GymVideoController::class, 'edit'])->name('videos.edit');
    Route::put('/videos/{video}', [GymVideoController::class, 'update'])->name('videos.update');
    Route::delete('/videos/{video}', [GymVideoController::class, 'destroy'])->name('videos.destroy');
});

// Superadmin Routes (Access to Everything including Users CRUD)
Route::prefix('admins')->middleware(['auth', 'superadmin'])->group(function () {
    // User Routes
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admins.dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Superadmin also needs access to all other routes
    // Products Routes
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Subscriptions Routes
    Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');
    Route::get('/subscriptions/create', [SubscriptionController::class, 'create'])->name('subscriptions.create');
    Route::post('/subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');
    Route::get('/subscriptions/{subscription}', [SubscriptionController::class, 'show'])->name('subscriptions.show');
    Route::get('/subscriptions/{subscription}/edit', [SubscriptionController::class, 'edit'])->name('subscriptions.edit');
    Route::put('/subscriptions/{subscription}', [SubscriptionController::class, 'update'])->name('subscriptions.update');
    Route::delete('/subscriptions/{subscription}', [SubscriptionController::class, 'destroy'])->name('subscriptions.destroy');

    // Messages Routes
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
    Route::post('/messages/{message}/reply', [MessageController::class, 'reply'])->name('messages.reply');

    // Review Routes
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::get('/reviews/{review}', [ReviewController::class, 'show'])->name('reviews.show');
    Route::post('reviews/{review}/change-status', [ReviewController::class, 'changeStatus'])->name('reviews.changeStatus');

    // Categories Routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Gym Videos Routes
    Route::get('/videos', [GymVideoController::class, 'index'])->name('videos.index');
    Route::get('/videos/create', [GymVideoController::class, 'create'])->name('videos.create');
    Route::post('/videos', [GymVideoController::class, 'store'])->name('videos.store');
    Route::get('/videos/{video}', [GymVideoController::class, 'show'])->name('videos.show');
    Route::get('/videos/{video}/edit', [GymVideoController::class, 'edit'])->name('videos.edit');
    Route::put('/videos/{video}', [GymVideoController::class, 'update'])->name('videos.update');
    Route::delete('/videos/{video}', [GymVideoController::class, 'destroy'])->name('videos.destroy');

    // orders routes 

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});


// Users Front End Routes Products

    Route::prefix('users')->group(function () {
        Route::get('/products', [UserProductController::class, 'index'])->name('products.index');
        Route::get('/products/{product}', [UserProductController::class, 'show'])->name('products.show');
        
        // home controller 
        Route::get('/home', [UserHomeController::class, 'index'])->name('home.index');

        // cart controller
        Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');


        // subscription controller 

    Route::get('/subscriptions', [UserSubscriptionController::class, 'index'])->name('users.subscriptions.index');
    Route::get('/subscriptions/{subscription}', [UserSubscriptionController::class, 'show'])->name('users.subscriptions.show');
});


Route::prefix('admins')->middleware(['auth', 'coach'])->group(function () {
    Route::get('/videos', [GymVideoController::class, 'index'])->name('videos.index');
    Route::get('/videos/create', [GymVideoController::class, 'create'])->name('videos.create');
    Route::post('/videos', [GymVideoController::class, 'store'])->name('videos.store');
    Route::get('/videos/{video}', [GymVideoController::class, 'show'])->name('videos.show');
    Route::get('/videos/{video}/edit', [GymVideoController::class, 'edit'])->name('videos.edit');
    Route::put('/videos/{video}', [GymVideoController::class, 'update'])->name('videos.update');
    Route::delete('/videos/{video}', [GymVideoController::class, 'destroy'])->name('videos.destroy');

    // Messages Routes
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
    Route::post('/messages/{message}/reply', [MessageController::class, 'reply'])->name('messages.reply');

    // Review Routes
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::get('/reviews/{review}', [ReviewController::class, 'show'])->name('reviews.show');
    Route::post('reviews/{review}/change-status', [ReviewController::class, 'changeStatus'])->name('reviews.changeStatus');
});

require __DIR__ . '/auth.php';
