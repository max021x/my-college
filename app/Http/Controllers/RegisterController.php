<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterRequest ;  
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Events\Registered ; 

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {

        $validated = $request->validated();

        $path = null;

        $user = User::create([
            "name" => $validated['name'],
            "email" => $validated['email'],
            "password" => $validated['password'],
            "birthdate" => $validated['birthdate'],
            "avatar" => $path
        ]);

        if ($request->hasFile('avatar')) {
            $path = Storage::disk('public')->put('my-college/avatar', $request->avatar);
            $user->update(['avatar' => $path]);
        }

        Auth::login($user);

        // vrify email event 
        event(new Registered($user));

        return redirect()->route('user.dashboard');
    }


    public function  verifyEmailNotice () {
        return view('auth.verify-email') ; 
    }

    public function verifyEmailHandler (EmailVerificationRequest $request) {
        $request->fulfill() ; 
        return redirect()->route('user.dashboard') ; 
    }

    public function verifyEmailResend(Request $request) {
        $request->user()->sendEmailVerificationNotification() ; 
        return back()->with('success' , 'Verification link sent!') ; 
    }
    

}
