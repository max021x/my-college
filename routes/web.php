<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::redirect('/' , '/home') ;
Route::view('/home' , 'index.main')->name('index.main') ; 
        
Route::get('/register' , [RegisterController::class , 'index'])
->name('auth.register') ; 

Route::get('/login' , [LoginController::class , 'index'])
->name('auth.login') ; 


