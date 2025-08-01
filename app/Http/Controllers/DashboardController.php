<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post ;

class DashboardController extends Controller
{
    public function index () {
        $posts  = Auth::user()->posts()->latest()->paginate(6) ; 
        $avatar = Auth::user()->avatar ; 
        return view('user.dashboard' , ['posts' => $posts , 'avatar' => $avatar]) ; 
    }

    

}
