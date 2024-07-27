<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        if (User::validateUser($credentials['username'], $credentials['password'])) {
            $user = User::where('username', $credentials['username'])->first();
            Auth::login($user);
            
            // Simpan level user dalam sesi
            session(['user_level' => $user->level]);
            
            return redirect()->route('dashboard');
        }

        return view('auth.login', [
            'keluar' => '<div class="alert alert-danger alert-dismissible show fade"><strong>Username atau Password Salah!</strong><button class="close" data-dismiss="alert"><span>&times;</span></button></div>'
        ]);
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