<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt login with provided credentials
        if (Auth::attempt($request->only('email', 'password'))) {
            // Check user role and redirect accordingly
            if (Auth::user()->role === 'admin') {
                // Redirect to admin dashboard if role is 'admin'
                return redirect()->route('admin.dashboard');
            } else {
                // Redirect to home page if role is 'user'
                return redirect()->route('home');
            }
        }

        // If authentication fails, return back with error message
        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    // Logout the admin
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
