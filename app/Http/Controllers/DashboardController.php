<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $totalBarangs = Barang::count();
        $data = [
            'level' => $user,
            'users' => User::count(),
            'barangs' => $totalBarangs,
            'stoks' => Barang::all(), // Assuming Barang model has the stock information
        ];

        return view('dashboard.dashboard', $data);
    }
}