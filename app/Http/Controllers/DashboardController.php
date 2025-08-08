<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Illuminate\Validation\Rules\Password;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Auth::user()->posts()->latest()->paginate(6);
        $user  = Auth::user();
        return view('user.dashboard', ['posts' => $posts, 'user' => $user]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['nullable', 'max:255', 'unique:users,name,' . $user->id],
            'email' => ['nullable', 'email:rfc,dns,spoof,filter', 'max:255', 'unique:users'],
            'avatar' => ['nullable', 'file', 'max:1024', 'mimes:png,jpg,jpeg']
        ]);

        $data = [
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
        ];

        // Handle avatar upload
        $path = null;
        if ($request->hasFile('avatar')) {
            // Delete old avatar if it exists
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $path = Storage::disk('public')->put('my-college/avatar', $request->avatar);
        } else {
            $path  = $user->avatar;
        }

        $data['avatar'] = $path;

        $user->update($data);

        return redirect()->route('user.dashboard')->with('success', 'Your information has been updated');
    }


    public function changepass(Request $request)
    {

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', Password::default()],
            'new_confirm_password' => ['same:new_password'],
        ]);


        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);


        return redirect()->route('user.dashboard')->with('success', "Password is Changed");
    }
}
