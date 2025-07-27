<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register') ; 
    }

    public function store (RegisterRequest $request) {
        
        $fields = $request->all() ; 

        $user = User::create($fields) ; 

        Auth::login($user) ; 

        return redirect()->route('user.dashboard') ; 
    }
}
