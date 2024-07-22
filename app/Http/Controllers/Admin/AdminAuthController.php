<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AdminAuthController extends Controller
{
    /**
     * Show the admin login form.
     */
    public function showLoginForm()
    {
        return Inertia::render('Admin/Auth/Login');
    }

    /**
     * Handle an admin login request.
     */
    public function login(Request $request)
    {
        // Validate the login request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user with the provided credentials and isAdmin check
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'isAdmin' => 1])) {
            return redirect()->route('admin.dashboard'); // Redirect to the admin dashboard
        }

        // Redirect back to the login page with an error message if authentication fails
        return redirect()->route('admin.login')->with('error', 'Invalid credentials.');
    }

    /**
     * Handle an admin logout request.
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login'); // Redirect to the admin login page after logout
    }
}
