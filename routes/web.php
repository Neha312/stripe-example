<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
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

Route::get('checkout', [CheckoutController::class, 'checkOut']);
Route::post('checkout', [CheckoutController::class, 'afterPayment'])->name('checkout.credit-card');
Route::get('products', [CustomerController::class, 'products']);
