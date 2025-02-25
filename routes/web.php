<?php

use App\Http\Controllers\{homeController, userAuthController, VendeurAuthController};
use App\Http\Controllers\vendeurs\vendeurDashboard;
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

//Route pour la page d'accueil
Route::get('/', [homeController::class,'index'])->name('home');
Route::get('/home', [homeController::class,'index'])->name('home');


// Authentification des utilisateurs

Route::middleware('guest')->group(function(){

    //Inscription
    Route::get('/register',[userAuthController::class,'register'])->name('user.register');
    Route::post('/register',[userAuthController::class,'handleRegister'])->name('user.handleRegister');

    //Connexion
    Route::get('/login',[userAuthController::class,'login'])->name('user.login');
    Route::post('/login',[userAuthController::class,'handleLogin'])->name('user.handleUserLogin');
});

Route::middleware('auth')->group(function(){
    Route::get('/logout',[userAuthController::class,'logout'])->name('user.handleUserLogout');
});


// Authentification des vendeurs

    // Vendeurs GUEST [Auth]

    Route::prefix('vendeur/comptes')->group(function(){
        Route::get('/login',[VendeurAuthController::class,'login'])->name('vendeur.login');
        Route::get('/register',[VendeurAuthController::class,'register'])->name('vendeur.register');

        Route::post('/login',[VendeurAuthController::class,'handleLogin'])->name('vendeur.handleLogin');
        Route::post('/register',[VendeurAuthController::class,'handleRegister'])->name('vendeur.handleRegister');

    });

// Route::middleware('auth:vendeur')->group(function(){
//     Route::get('/vendeur/logout',[VendeurAuthController::class,'logout'])->name('vendeur.logout');
// });

Route::prefix('vendeur/dashboard')->group(function(){
    Route::get('/',[vendeurDashboard::class,'index'])->name('vendeur.dashboard');
});