<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\RoleMiddleware;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductCategoryController;

Route::get('/', [HomeProductController::class, 'index'])->name('home');

// Product Purchase Flow Routes
Route::prefix('buy-now')->group(function () {
    Route::post('/', [HomeProductController::class, 'buyNow'])->name('buy-now');
    Route::get('/checkout', [HomeProductController::class, 'checkout'])->name('checkout');
});

// Order Processing and Success Routes
Route::middleware(['auth'])->prefix('order')->group(function () {
    Route::post('/process', [OrderController::class, 'processOrder'])->name('process-order');
    Route::get('/success/{order}', [OrderController::class, 'orderSuccess'])->name('order.success');
});

// Authenticated User Routes (Profile)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/');
    })->name('dashboard');

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

// Admin Routes
Route::middleware([RoleMiddleware::class.':admin'])->prefix('admin')->name('admin.')->group(function () {
    // Admin Dashboard
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // Manage Products (Listing, Create, Edit, Delete)
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('manage-product');
        Route::get('/create', [ProductController::class, 'createOrEdit'])->name('product.create');
        Route::get('{id?}/edit', [ProductController::class, 'createOrEdit'])->name('product.edit');
        Route::post('/{id?}', [ProductController::class, 'storeOrUpdate'])->name('product.storeOrUpdate');
        Route::delete('{id}/delete', [ProductController::class, 'delete'])->name('product.delete');
    });

    Route::get('/categories', [ProductCategoryController::class, 'index'])->name('manage-category');
    Route::get('/categories/create', [ProductCategoryController::class, 'createOrEdit'])->name('category.create');
    Route::get('/categories/{id}/edit', [ProductCategoryController::class, 'createOrEdit'])->name('category.edit');
    Route::post('/categories/{id?}', [ProductCategoryController::class, 'storeOrUpdate'])->name('category.storeOrUpdate');
    Route::delete('/categories/{id}', [ProductCategoryController::class, 'destroy'])->name('category.delete');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});

// product 
Route::middleware([RoleMiddleware::class.':admin'])->post('/admin/add-product', [ProductController::class, 'storeOrUpdate'])->name('admin.products.store');

Route::get('/admin/add-category', function () {
    return view('/admin/add-category');
});


require __DIR__.'/auth.php';
