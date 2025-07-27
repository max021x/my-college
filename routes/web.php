<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/home');
Route::view('/home', 'index.main')->name('index.main');



Route::middleware('auth')->group(function () {
    // dashboard 
    Route::get('/dashboard' , [DashboardController::class , 'index'])->name('user.dashboard') ; 
    
    // logout 
    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
});


Route::middleware('guest')->group(function () {
    // register user view
    Route::get('/register', [RegisterController::class, 'index'])
    ->name('auth.register') ; 
    
    Route::post('/register' , [RegisterController::class , 'store'])
    ->name('auth.register') ; 
    
    // login user view
    Route::get('/login', [LoginController::class, 'index'])
    ->name('auth.login');
    
    Route::post('/login' , [LoginController::class , 'login'])
    ->name('auth.login') ; 
});
