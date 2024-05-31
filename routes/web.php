<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\ProductShowController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\Customer\OrderController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\IngredientController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\ProductIngredientController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::prefix('/customer')->group(function () {
        Route::get('/profile', [HomeController::class, 'edit'])->name('customer.profile.edit');
        Route::patch('/profile', [HomeController::class, 'update'])->name('customer.profile.update');
        Route::delete('/profile', [HomeController::class, 'destroy'])->name('customer.profile.destroy');

        Route::get('/products/{id}', [ProductShowController::class, 'show'])->name('product.show');
        
        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
        Route::put('/cart/{productId}', [CartController::class, 'update'])->name('cart.update');
        Route::post('/cart/remove/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');

        Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
        Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{id}/details', [OrderController::class, 'show'])->name('orders.details');

    });
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('users', UserController::class);
        Route::resource('ingredients', IngredientController::class);
        Route::resource('products', ProductController::class);
        Route::resource('transactions', TransactionController::class);
        Route::resource('product-ingredients', ProductIngredientController::class);

        Route::put('/transactions/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__.'/auth.php';
