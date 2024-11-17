<?php

use App\Http\Controllers\Admin\{DashboardController, GalleryController, TransactionController, TravelPackageController};
use App\Http\Controllers\{CheckoutController, HomeController, DetailController, MidtransController};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/details/{slug}', [DetailController::class, 'index'])
    ->name('details');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/checkout/{id}', [CheckoutController::class, 'process'])
        ->name('checkout.process');

    Route::get('/checkout/{id}', [CheckoutController::class, 'index'])
        ->name('checkout.index');

    Route::post('/checkout/create/{detail_id}', [CheckoutController::class, 'create'])
        ->name('checkout.create');

    Route::get('/checkout/remove/{detail_id}', [CheckoutController::class, 'remove'])
        ->name('checkout.remove');

    Route::get('/checkout/confirm/{id}', [CheckoutController::class, 'success'])
        ->name('checkout.success');
});

Route::prefix('admin')
    // ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('travel-package', TravelPackageController::class);
        Route::resource('gallery', GalleryController::class);
        Route::resource('transaction', TransactionController::class);
    });

Auth::routes(['verify' => true]);

// Midtrans
Route::post('/midtrans/callback', [MidtransController::class, 'notificationHandler'])->name('notification.handler');
Route::get('/midtrans/finish', [MidtransController::class, 'finishRedirect'])->name('midtrans.finish');
Route::get('/midtrans/unfinish', [MidtransController::class, 'unFinishRedirect'])->name('midtrans.unfinish');
Route::get('/midtrans/error', [MidtransController::class, 'errorRedirect'])->name('midtrans.error');
