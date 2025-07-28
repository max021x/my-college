<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post ;
class DashboardController extends Controller
{
    public function index () {
        $posts = $post->latest()->paginate(6) ; 
        return view('user.dashboard' , ['posts' => $posts]) ; 
    }

    

}
