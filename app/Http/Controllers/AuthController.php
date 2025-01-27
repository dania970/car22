<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Return the login view (this should match your file structure)
    }

    public function login(Request $request)
    {
        // Validate the input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirect to the dashboard after successful login
            return redirect()->route('admin.dashboard')->with('success', 'تم تسجيل الدخول بنجاح');
        }

        // Redirect back with an error if login fails
        return back()->withErrors(['email' => 'بيانات الدخول غير صحيحة.']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'تم تسجيل الخروج بنجاح.');
    }
}
