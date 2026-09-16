<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\HeroSliderController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
});


Route::resource('users', UserController::class)->middleware(['auth', 'verified']);
Route::resource('services', ServiceController::class)->middleware(['auth', 'verified']);
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('news', NewsController::class);
    Route::resource('news-categories', NewsCategoryController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
    Route::post('/portfolio', [PortfolioController::class, 'store'])->name('portfolio.store');
    Route::delete('/portfolio/{portfolio}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');
    Route::post('/portfolio/bulk-delete', [PortfolioController::class, 'bulkDestroy'])->name('portfolio.bulk-delete');
    Route::post('/portfolio/reorder', [PortfolioController::class, 'reorder'])->name('portfolio.reorder');

    Route::get('/about/manage', [AboutController::class, 'edit'])->name('about.edit');
    Route::post('/about/manage', [AboutController::class, 'updateImage'])->name('about.update');

    Route::get('/inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
    Route::get('/inquiries/export', [InquiryController::class, 'export'])->name('inquiries.export');
    Route::delete('/inquiries/{inquiry}', [InquiryController::class, 'destroy'])->name('inquiries.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/hero-sliders', [HeroSliderController::class, 'index'])->name('hero-sliders.index');
    Route::post('/hero-sliders', [HeroSliderController::class, 'store'])->name('hero-sliders.store');
    Route::delete('/hero-sliders/{heroSlider}', [HeroSliderController::class, 'destroy'])->name('hero-sliders.destroy');
});

require __DIR__ . '/auth.php';