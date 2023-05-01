<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('create', [CustomerController::class, 'create']);
Route::get('get/{id}', [CustomerController::class, 'get']);
Route::get('list', [CustomerController::class, 'list']);
Route::post('update', [CustomerController::class, 'update']);
Route::get('search', [CustomerController::class, 'search']);
Route::get('delete/{id}', [CustomerController::class, 'delete']);
Route::post('resume', [CustomerController::class, 'resume']);
Route::post('attach', [CustomerController::class, 'attach']);
Route::get('detach', [CustomerController::class, 'detach']);
Route::post('pay/{id}', [CustomerController::class, 'pay']);
Route::post('finalize/{id}', [CustomerController::class, 'finalize']);
Route::get('upcoming-invoice', [CustomerController::class, 'upcomingInvoice']);
Route::post('send-invoice/{id}', [CustomerController::class, 'sendInvoice']);
Route::get('all-upcoming-invoice', [CustomerController::class, 'allUpcomingInvoice']);
Route::post('release-subcription/{id}', [CustomerController::class, 'releaseSubcription']);
Route::post('cancel-subscription/{id}', [CustomerController::class, 'cancelSubscription']);
Route::delete('draft-invoice-delete/{id}', [CustomerController::class, 'draftInvoiceDelete']);
Route::post('capture-charge/{id}', [CustomerController::class, 'captureCharge']);
Route::post('payment-link', [CustomerController::class, 'paymentLink']);
