<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileSettingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('orders', \App\Http\Controllers\OrderController::class);

    Route::controller(\App\Http\Controllers\OrderController::class)->group(function () {
        Route::get('order/in-process', 'orderInProcess')->name('orders.in-process');
        Route::get('order/payment-pending', 'paymentPending')->name('orders.payment-pending');
        Route::get('order/completed', 'completedOrders')->name('orders.completed');
    });

    Route::controller(\App\Http\Controllers\StripeController::class)->group(function () {
        Route::get('payment-methods', 'createPaymentIntent')->name('payment-methods');
        Route::post('payment', 'payment')->name('payment');
    });

    Route::resource('quotes', \App\Http\Controllers\User\QuoteController::class);
    Route::controller(\App\Http\Controllers\User\QuoteController::class)->group(function () {
        Route::get('emborided-patches', 'createEmboridedPatches')->name('emborided-patches');
        Route::post('accept-quote', 'acceptQuote')->name('accept-quote');
        Route::post('reject-quote', 'rejectQuote')->name('reject-quote');
    });
});

Route::prefix('admin')->group(function () {
    Route::controller(AdminAuthController::class)->group(function () {
        Route::get('/login', 'getLogin')->name('getLogin');
        Route::post('login', 'postLogin')->name('postLogin');
        Route::get('forget-password', 'showForgetPasswordForm')->name('forget.password.get');
        Route::post('forget-password', 'submitForgetPasswordForm')->name('forget.password.post');
        Route::get('otp-page', 'showOtpForm')->name('reset.otp.get');
        Route::post('otp-verify', 'otpVerify')->name('reset.otp.post');
        Route::get('reset-password', 'showResetPasswordForm')->name('reset.password.get');
        Route::post('reset-password', 'submitResetPasswordForm')->name('reset.password.post');
    });

    Route::group(['middleware' => ['admin']], function () {
        Route::controller(AdminAuthController::class)->group(function () {
            Route::get('logout', 'adminLogout')->name('adminLogout');
            Route::post('change-password', 'changePassword')->name('change.password');
        });

        Route::controller(ProfileSettingsController::class)->group(function () {
            Route::get('settings', 'showSettings')->name('showSettings');
            Route::get('security', 'showSecurity')->name('showSecurity');
            Route::post('admin-update-profile', 'adminProfileUpdate')->name('profile.update');
        });

        Route::controller(DashboardController::class)->group(function () {
            Route::get('dashboard', 'dashboard')->name('dashboard');
        });

        Route::controller(OrderController::class)->group(function () {
            Route::get('orders', 'index')->name('admin.orders');
            Route::get('orders/{order}', 'show')->name('admin.orders.show');
            Route::post('orders/{order}/assign', 'assignOrder')->name('admin.orders.assign');
            Route::post('orders', 'store')->name('admin.orders.submit');
            Route::get('order/assigned', 'assignOrdersList')->name('admin.orders.assigned');
            Route::get('order/ready', 'readyOrdersList')->name('admin.orders.ready');
            Route::get('order/completed', 'completedOrdersList')->name('admin.orders.completed');
            Route::post('order/price', 'submitPrice')->name('admin.orders.price');
        });

        Route::controller(\App\Http\Controllers\Admin\QuoteController::class)->group(function () {
            Route::get('quotes', 'index')->name('admin.quotes');
            Route::get('quotes/{quote}', 'show')->name('admin.quotes.show');
            Route::post('quotes', 'store')->name('admin.quotes.submit');
            Route::post('quote/price', 'submitPrice')->name('admin.quotes.price');
            Route::get('quote/completed', 'completedQuotesList')->name('admin.quotes.completed');
        });
    });
});

Route::prefix('employee')->group(function () {

    Route::group(['middleware' => ['employee']], function () {

        Route::controller(AdminAuthController::class)->group(function () {
            Route::get('logout', 'adminLogout')->name('employ.logout');
            Route::post('change-password', 'changePassword')->name('change.password');
        });

        Route::controller(ProfileSettingsController::class)->group(function () {
            Route::get('settings', 'showSettings')->name('showSettings');
            Route::get('security', 'showSecurity')->name('showSecurity');
            Route::post('admin-update-profile', 'adminProfileUpdate')->name('profile.update');
        });

        Route::controller(DashboardController::class)->group(function () {
            Route::get('dashboard', 'employeeDashboard')->name('employee.dashboard');
        });

        Route::controller(\App\Http\Controllers\Employee\OrderController::class)->group(function () {
            Route::get('orders', 'index')->name('employee.orders');
            Route::get('orders/{order}', 'show')->name('employee.orders.show');
            Route::post('orders', 'store')->name('employee.orders.submit');
            Route::get('order/completed', 'completedOrdersList')->name('employee.orders.completed');
        });
    });
});

require __DIR__ . '/auth.php';
