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

Route::post('pay',[ActivityController::class,'pay'])->name('api.pay');
Route::post('send',[ActivityController::class,'send'])->name('api.send');
Route::post('accept',[ActivityController::class,'accept'])->name('api.accept');
Route::post('checkOut',[ActivityController::class,'checkOut'])->name('api.checkOut');
