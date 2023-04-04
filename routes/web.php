<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\MyFatoorahController;
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

Route::get('/',function (){
    return view('index');
});



Route::get('login',[LoginController::class,'index'])->name('login');
Route::get('register',[RegisterController::class,'register'])->name('register');
Route::get('fatoora',[MyFatoorahController::class,'index'])->name('activities');
Route::get('posts/show/{id}',[ActivityController::class,'show'])->name('activity.show');
Route::post('pay',[MyFatoorahController::class,'checkout'])->name('users.pay');
Route::post('send',[ActivityController::class,'send'])->name('posts.add');
