<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('pay',[ActivityController::class,'getToken'])->name('api.pay');
Route::post('send',[ActivityController::class,'sendPayment'])->name('api.send');
Route::post('accept',[ActivityController::class,'getPaymentToken'])->name('api.accept');
Route::post('checkout',[ActivityController::class,'checkOut'])->name('api.checkOut');
