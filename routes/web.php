<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::redirect('/', '/posts');
Route::get('/posts ', [PostController::class, 'index'])->name('posts.index');



Route::middleware('auth')->group(function () {
    // dashboard 
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

    Route::post('/dashboard', function () {
        return Str::of(request('markdown'))->markdown();
    });

    // post : store , update , delete , show  
    Route::resource('/posts', PostController::class);

    // logout 
    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
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
