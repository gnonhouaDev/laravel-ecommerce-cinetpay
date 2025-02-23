<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\userAuthController;
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

Route::get('/', [homeController::class,'index'])->name('home');
Route::get('/home', [homeController::class,'index'])->name('home');

Route::get('/login',[userAuthController::class,'login'])->name('login');

Route::middleware('guest')->group(function(){
    //Inscription
    Route::get('/register',[userAuthController::class,'register'])->name('user.register');
    Route::post('/register',[userAuthController::class,'handleRegister'])->name('user.handleRegister');

    //Connexion
    Route::post('/login',[userAuthController::class,'handleLogin'])->name('user.handleUserLogin');
});

Route::middleware('auth')->group(function(){
    Route::get('/logout',[userAuthController::class,'logout'])->name('user.handleUserLogout');
});
