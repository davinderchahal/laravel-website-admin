<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeSectionController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PageBannerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/', [EnquiryController::class, 'index'])->name('dashboard');
    Route::patch('/enquiry/{enquiry}/status', [EnquiryController::class, 'statusUpdate'])->name('enquiry.status');
    Route::resource('about', AboutController::class)->only(['index', 'update']);
    Route::resource('banners', BannerController::class)->only(['index', 'update']);
    Route::resource('contact', ContactController::class)->only(['index', 'update']);
    Route::resource('page-banner', PageBannerController::class)->only(['index', 'store', 'update']);
    Route::resource('home-section', HomeSectionController::class)->only(['index', 'update']);
    Route::resource('service', ServiceController::class);
    Route::resource('faq', FaqController::class);
    Route::resource('image', ImageController::class)->only(['index', 'store', 'destroy']);
});


require __DIR__ . '/auth.php';
