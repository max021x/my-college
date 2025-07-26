<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/' , '/home') ;
Route::view('/home' , 'index.main') ; 
        





