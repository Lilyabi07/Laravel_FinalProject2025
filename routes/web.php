<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Authentication routes (login, register, etc.)
Auth::routes();

// “/” and “/home” both redirect to the products listing
Route::get('/',    fn() => redirect()->route('products.index'));
Route::get('/home', fn() => redirect()->route('products.index'));

// ── Product CRUD (index, create, store, show, edit, update, destroy)
Route::resource('products', ProductController::class);

// ── Shopping Cart ────────────────────────────────────────────────────────────
// show cart contents
Route::get('cart', [CartController::class, 'index'])
     ->name('cart.index');

// add a single product to the cart
Route::post('cart/add/{product}', [CartController::class, 'add'])
     ->name('cart.add');

// bulk update quantities
Route::post('cart/update', [CartController::class, 'update'])
     ->name('cart.update');

// remove one line‑item from the cart (must spoof DELETE in your Blade form)
Route::delete('cart/remove/{product}', [CartController::class, 'remove'])
     ->name('cart.remove');

// ── Checkout & Orders ────────────────────────────────────────────────────────
// show checkout form
Route::get('/checkout', [\App\Http\Controllers\CheckoutController::class, 'checkout'])->name('checkout.index');

// place the order
Route::post('checkout', [CheckoutController::class, 'store'])
     ->name('checkout.store');

// ── Admin Panel (requires auth + isAdmin middleware) ─────────────────────────
Route::prefix('admin')
     ->middleware(['auth', 'isAdmin'])
     ->name('admin.')
     ->group(function () {
         Route::get('orders',         [AdminOrderController::class, 'index'])
              ->name('orders.index');
         Route::get('orders/{order}', [AdminOrderController::class, 'show'])
              ->name('orders.show');
     });