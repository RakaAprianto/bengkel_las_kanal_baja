<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{portfolio}', [PortfolioController::class, 'show'])->name('portfolio.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Portfolio Management
    Route::resource('portfolio', AdminPortfolioController::class);
    Route::delete('portfolio/image/{image}', [AdminPortfolioController::class, 'deleteImage'])->name('portfolio.image.delete');
    Route::post('portfolio/image/{image}/primary', [AdminPortfolioController::class, 'setPrimaryImage'])->name('portfolio.image.primary');

    // Contact/Inquiry Management
    Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::patch('contacts/{contact}/status', [AdminContactController::class, 'updateStatus'])->name('contacts.status');
    Route::delete('contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');

    // Settings
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
});
