<?php

use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProjectController as FrontendProjectController;
use App\Http\Controllers\Frontend\ServiceController as FrontendServiceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::prefix('services')->name('services.')->group(function () {
    Route::get('/', [FrontendServiceController::class, 'index'])->name('index');
    Route::get('/{slug}', [FrontendServiceController::class, 'show'])->name('show');
});

Route::prefix('projects')->name('projects.')->group(function () {
    Route::get('/', [FrontendProjectController::class, 'index'])->name('index');
    Route::get('/{slug}', [FrontendProjectController::class, 'show'])->name('show');
});

Route::prefix('technologies')->name('technologies.')->group(function () {
    Route::get('/', function () {
        $technologies = \App\Models\Technology::orderBy('order')->get();
        return view('frontend.technologies.index', compact('technologies'));
    })->name('index');
});

Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', function () {
        $products = \App\Models\Product::where('is_active', true)->orderBy('order')->get();
        return view('frontend.products.index', compact('products'));
    })->name('index');
    Route::get('/{slug}', function ($slug) {
        $product = \App\Models\Product::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('frontend.products.show', compact('product'));
    })->name('show');
});

Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::post('/', [ContactController::class, 'store'])->name('store');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('services', ServiceController::class);
    Route::resource('technologies', TechnologyController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('products', ProductController::class);
    Route::resource('team-members', TeamMemberController::class);
    Route::resource('testimonials', TestimonialController::class);
    
    Route::prefix('contact-messages')->name('contact-messages.')->group(function () {
        Route::get('/', [ContactMessageController::class, 'index'])->name('index');
        Route::get('/{id}', [ContactMessageController::class, 'show'])->name('show');
        Route::delete('/{id}', [ContactMessageController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/mark-read', [ContactMessageController::class, 'markAsRead'])->name('mark-read');
    });
    
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::put('/', [SettingController::class, 'update'])->name('update');
    });
});

// Auth Routes (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('admin.dashboard');
    })->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
