<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $remember = $request->has('remember');

        $fields = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($fields, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('user.dashboard');
        }

        return redirect()->back()
            ->withErrors(['message' => 'Opps unmatched credentials try again :)']);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home.index');
    }

    public function deleteAccount(Request $request)
    {
        $request->user()->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home.index');
    }
}
