<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Models\Partner;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;

// USER AREA
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/event', [EventController::class, 'show'])->name('event.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/ticket', [TicketController::class, 'index'])->name('ticket');

// ADMIN AREA
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('events', AdminEventController::class);
    Route::get('/transactions', [AdminEventController::class, 'transactions'])->name('transactions.index');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])
    ->name('categories.store');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])
    ->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
    ->name('categories.destroy');

    Route::get('/partners', [PartnerController::class, 'index'])
    ->name('partners.index');
    Route::post('/partners', [PartnerController::class, 'store'])
    ->name('partners.store');
    Route::put('/partners/{partner}', [PartnerController::class, 'update'])
    ->name('partners.update');
    Route::delete('/partners/{partner}', [PartnerController::class, 'destroy'])
    ->name('partners.destroy');
});