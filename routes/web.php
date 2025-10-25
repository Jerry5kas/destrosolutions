<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\NotificationController;

Route::get('/', [HomeController::class, 'index']);

// Contact form submission
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Notification routes
Route::prefix('admin/notifications')->group(function () {
    Route::get('/', [NotificationController::class, 'index'])->name('admin.notifications.index');
    Route::post('/{id}/read', [NotificationController::class, 'markAsRead'])->name('admin.notifications.read');
    Route::post('/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('admin.notifications.mark-all-read');
    Route::get('/unread-count', [NotificationController::class, 'getUnreadCount'])->name('admin.notifications.unread-count');
});

// Public content routes
Route::get('/quantum', [ContentController::class, 'quantum'])->name('quantum');
Route::get('/services', [ContentController::class, 'services'])->name('services');
Route::get('/services/{subtitle}', [ContentController::class, 'servicesBySubtitle'])->name('services.subtitle');
Route::get('/products', [ContentController::class, 'products'])->name('products');
Route::get('/products/{subtitle}', [ContentController::class, 'productsBySubtitle'])->name('products.subtitle');
Route::get('/training', [ContentController::class, 'trainings'])->name('training');
Route::get('/training/{subtitle}', [ContentController::class, 'trainingsBySubtitle'])->name('training.subtitle');
Route::get('/api/gallery-images', [ContentController::class, 'getGalleryImages'])->name('gallery.images');



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
        Route::resource('contacts', \App\Http\Controllers\Admin\ContactController::class)->only(['index','show','destroy']);
        
        // New content management resources
        Route::resource('galleries', \App\Http\Controllers\Admin\GalleryController::class)->except(['show']);
        Route::resource('faqs', \App\Http\Controllers\Admin\FaqController::class)->except(['show']);
        Route::resource('teams', \App\Http\Controllers\Admin\TeamController::class)->except(['show']);
    });
});
