<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register') ; 
    }

    public function store (RegisterRequest $request) {
        
        $validated = $request->validated() ; 

        $path = null ; 
        
        $user = User::create([
            "name" => $validated['name'] , 
            "email" => $validated['email'] , 
            "password" => $validated['password'] , 
            "birthdate" => $validated['birthdate'] , 
            "avatar" => $path 
        ]) ; 

        if($request->hasFile('avatar')){
            $path = Storage::disk('public')->put('my-college/avatar' , $request->avatar) ; 
            $user->update(['avatar'=>$path]) ; 
        }

        Auth::login($user) ; 

        return redirect()->route('user.dashboard') ; 
    }
}
