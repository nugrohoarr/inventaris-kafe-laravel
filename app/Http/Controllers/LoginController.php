<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (!Auth::check()) {
            return view('loginForm');
        } else {
            return redirect()->route('welcome');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            $request->session->regenerate();
            return redirect()->intended('welcome');
        } else {
            return back()->withErrors([
                'login' => 'Username or Password is incorrect.',
            ])->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('loginForm')->with('status', 'You have been logged out.');
    }

    public function showForgotPasswordForm()
    {
        return view('forgotPassword');
    }
}
