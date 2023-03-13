<?php

use App\Http\Controllers\{CheckoutController, StripeConnectorController, SubscriptionController};
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(SubscriptionController::class)
    ->as('subscription.')
    ->prefix('subscription')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('subscribe', 'subscribe')->name('subscribe');
    });

Route::controller(StripeConnectorController::class)
    ->as('stripe-connector.')
    ->prefix('stripe-connector')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/return', 'return')->name('return');
    });

Route::controller(CheckoutController::class)
    ->as('checkout.')
    ->prefix('checkout')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('success', 'success')->name('success');
        Route::get('error', 'checkoutError')->name('error');
    });
