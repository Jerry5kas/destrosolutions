<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/theme-utilities', function () {
    return view('theme-utilities');
});

Route::get('/page', function (){
    return view('page');
});

// Admin Auth Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'showLogin'])->name('login');
        Route::post('login', [\App\Http\Controllers\Admin\AuthController::class, 'login']);
    });

    Route::middleware('admin')->group(function () {
        Route::post('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
        Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        // Content resources
        Route::resource('banners', \App\Http\Controllers\Admin\BannerController::class)->except(['show']);
        Route::resource('quantum', \App\Http\Controllers\Admin\QuantumController::class)->except(['show']);
        Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class)->except(['show']);
        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class)->except(['show']);
        Route::resource('training', \App\Http\Controllers\Admin\TrainingController::class)->except(['show']);
        Route::prefix('blog')->name('blog.')->group(function () {
            Route::resource('categories', \App\Http\Controllers\Admin\BlogCategoryController::class)->except(['show']);
            Route::resource('posts', \App\Http\Controllers\Admin\BlogPostController::class)->except(['show']);
        });
        Route::resource('contacts', \App\Http\Controllers\Admin\ContactController::class)->only(['index','destroy']);
    });
});
