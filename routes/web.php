<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str; 

Route::redirect('/', '/home');
Route::view('/home', 'user.index')->name('home.index');


Route::middleware('auth')->group(function () {
    // dashboard 
    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('verified')->name('user.dashboard');

    // verfication settings 
    Route::get('/email/verify', [RegisterController::class, 'verifyEmailNotice'])->name('verification.notice');

    // Email Verification Handler route
    Route::get('/email/verify/{id}/{hash}', [RegisterController::class, 'verifyEmailHandler'])->middleware('signed')->name('verification.verify');

    // Resending the Verification Email route
    Route::post('/email/verification-notification', [RegisterController::class, 'verifyEmailResend'])->middleware('throttle:6,1')->name('verification.send');

    Route::get('/profile', function () {
        // Only verified users may access this route...
    })->middleware(['verified']);



    // post : store , update , delete , show  
    Route::resource('/posts', PostController::class);

    Route::post('/posts/create', function () {
        return Str::of(request('markdown'))->markdown();
    });

    Route::get('/posts/category/{category}', [PostController::class, 'category'])
        ->name('posts.category')
        ->whereIn('category', ['computer', 'movie', 'game', 'cooking', 'fun']);

    Route::post('/posts/{post}/edit', function () {
        return Str::of(request('markdown'))->markdown();
    });

    // logout 
    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

    // delete account 
    Route::delete('/delete', [LoginController::class, 'deleteAccount'])->name('auth.delete');
});


Route::middleware('guest')->group(function () {
    // register user view
    Route::get('/register', [RegisterController::class, 'index'])
        ->name('auth.register');

    Route::post('/register', [RegisterController::class, 'store'])
        ->name('auth.register');

    // login user view
    Route::get('/login', [LoginController::class, 'index'])
        ->name('auth.login');

    Route::post('/login', [LoginController::class, 'login'])
        ->name('auth.login');
});
