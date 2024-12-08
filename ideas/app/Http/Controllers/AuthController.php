<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => ['required', 'min:3', 'max:40'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);
        
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Account created Successfully!');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);
        
        if (Auth::attempt($validated))
        {
            $request->session()->regenerate();
            return redirect()->route('dashboard.index')->with('success', 'Logged in Successfully!');
        }

        return redirect()->route('login')->withErrors([
            'email' => 'No user found with the provided credentials.'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('dashboard.index')->with('success', 'Logged out Successfully!');
    }
}
