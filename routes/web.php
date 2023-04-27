<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PracticeController;

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

//paymnet-intigration example
Route::get('check-out', [PracticeController::class, 'checkOut']);
Route::post('check-out', [PracticeController::class, 'afterPayment'])->name('checkout.credit-card');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//product-cart-payment
Route::get('products', [ProductController::class, 'index'])->name('products');
Route::get('products/{product}/addToCart',  [ProductController::class, 'addToCart'])->name('products.addToCart');
Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::get('cart/{product}/remove', [CartController::class, 'removeProduct'])->name('cart.removeProduct');
Route::post('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::get('success', [CheckoutController::class, 'success'])->name('success');
Route::get('cancel', [CheckoutController::class, 'cancel'])->name('cancel');


//create plane
Route::middleware("auth")->group(function () {
    Route::get('plans', [PlanController::class, 'index']);
    // Route::get('plans/{plan}', [PlanController::class, 'show'])->name("plans.show");
    // Route::post('subscription', [PlanController::class, 'subscription'])->name("subscription.create");
});
