<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
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

Route::get('login',[LoginController::class,'index'])->name('login');
Route::get('register',[RegisterController::class,'register'])->name('register');
Route::get('activities',[ActivityController::class,'index'])->name('activities');
