<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AuthController as UserAuthController;
use App\Http\Controllers\MidtransWebhookController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReviewController;

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\OrganizationController;

use App\Http\Controllers\Organization\AuthController as OrganizationAuthController;
use App\Http\Controllers\Organization\DashboardController as OrganizationDashboardController;
use App\Http\Controllers\Organization\EventController as OrganizationEventController;
use App\Http\Controllers\Organization\TransactionController as OrganizationTransactionController;


//
// ================= USER AREA =================
//

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/events/{event}', [EventController::class, 'show'])
    ->name('events.show');

Route::get('/ticket', [TicketController::class, 'index'])
    ->name('ticket');

Route::get('/checkout/{event}/option', [CheckoutController::class, 'option'])
    ->name('checkout.option');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [CustomerController::class, 'dashboard'])
        ->name('customer.dashboard');

    Route::post('/logout', [UserAuthController::class, 'logout'])
        ->name('customer.logout');

    // Rating dan ulasan
    Route::get('/events/{event}/review', [ReviewController::class, 'create'])
        ->name('reviews.create');

    Route::post('/events/{event}/review', [ReviewController::class, 'store'])
        ->name('reviews.store');

});

//
// ================= CHECKOUT =================
//


    Route::get('/checkout/{event}', [CheckoutController::class, 'create'])
        ->name('checkout.create');

    Route::post('/checkout/{event}', [CheckoutController::class, 'store'])
        ->name('checkout.store');

    Route::get('/payment/{order_id}', [CheckoutController::class, 'payment'])
        ->name('checkout.payment');

    Route::get('/success/{order_id}', [CheckoutController::class, 'success'])
        ->name('checkout.success');


//
// ================= MIDTRANS =================
//

Route::post('/midtrans/callback', [MidtransWebhookController::class, 'handle'])
    ->name('midtrans.callback');


//
// ================= GOOGLE LOGIN =================
//

Route::get('/auth/google', [UserAuthController::class, 'redirect'])
    ->name('google.login');

Route::get('/auth/google/callback', [UserAuthController::class, 'callback'])
    ->name('google.callback');


//
// ================= LOGIN =================
//

Route::get('/login', [UserAuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login',
    [UserAuthController::class,'login'])
    ->name('login.post');

//
// ================= ADMIN =================
//

Route::prefix('admin')->name('admin.')->group(function () {

    /*
    |---------------------------------
    | Login Admin
    |---------------------------------
    */

    Route::get('/login', [AdminAuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AdminAuthController::class, 'login'])
        ->name('login.post');

    Route::post('/logout', [AdminAuthController::class, 'logout'])
        ->name('logout');

    /*
    |---------------------------------
    | Protected Routes
    |---------------------------------
    */

    Route::middleware('auth:admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('events', AdminEventController::class);

        Route::get('/transactions', [TransactionController::class, 'index'])
            ->name('transactions.index');

        Route::resource('categories', CategoryController::class)
            ->except(['show', 'create', 'edit']);

        Route::resource('partners', PartnerController::class)
            ->except(['show', 'create', 'edit']);

        Route::resource('organizations', OrganizationController::class);

    });

});

Route::prefix('organization') ->name('organization.') ->group(function(){

    Route::get('/register',
        [OrganizationAuthController::class,'showRegister'])
        ->name('register');

    Route::post('/register',
        [OrganizationAuthController::class,'register'])
        ->name('register.store');

    Route::get('/login',
        [OrganizationAuthController::class,'showLogin'])
        ->name('login');

    Route::post('/login',
        [OrganizationAuthController::class,'login'])
        ->name('login.post');

    // Setelah login
    Route::middleware('auth:organization')->group(function(){

        Route::get('/dashboard', [OrganizationDashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('events', OrganizationEventController::class);

        Route::get('/transactions', [OrganizationTransactionController::class,'index']
        )->name('transactions.index');
            
        Route::post('/logout', [OrganizationAuthController::class,'logout'])
            ->name('logout');

    });

});