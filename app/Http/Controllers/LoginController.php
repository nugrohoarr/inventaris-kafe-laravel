<?php

namespace App\Http\Controllers;

use App\Models\User;
// use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->only('username', 'password');

    if ($user = User::validateUser($credentials['username'], $credentials['password'])) {
        Auth::login($user);
        session(['user_level' => $user->level]);

        return redirect()->route('dashboard');
    }

    return redirect()->back()
        ->withInput($request->only('username'))
        ->with('error', 'Username atau Password Salah!');
}

    public function logout()
    {
        Auth::logout();
        session()->forget('user_level');
        return redirect()->route('login');
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }
}