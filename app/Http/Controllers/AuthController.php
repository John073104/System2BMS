<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth; 


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function showSignupForm()
    {
        return view('auth.signup');
    }
    
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
    
        $role = 'user';
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role, 
        ]);
    
        return redirect()->route('login')->with('success', 'Registration successful! You can now log in.');
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            // Get the authenticated user
            $user = Auth::user();
    
            // Redirect based on user role
            if ($user->role === 'admin') {
                return redirect()->intended('admin/dashboard'); // Change this to your admin dashboard route
            } else {
                return redirect()->intended('user/dashboard'); // Change this to your user dashboard route
            }
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
