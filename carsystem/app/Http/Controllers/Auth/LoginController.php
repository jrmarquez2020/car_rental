<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle user logout.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out successfully!');
    }

    /**
     * Redirect users based on their role after login.
     *
     * @return string
     */
    protected function redirectTo()
    {
        if (auth()->check()) {
            // Redirect admin to the admin dashboard
            if (auth()->user()->role === 'admin') {
                return route('admin.dashboard');
            }
            // Redirect regular users to the home page
            return '/home';
        }

        // Fallback redirect if user is not authenticated
        return '/login';
    }
}
