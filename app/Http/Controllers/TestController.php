<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        // Mock data with 'id' property added
        $users = [
            (object)[
                'id' => 1,
                'nama' => 'John Doe',
                'level' => 'administrator',
            ],
        ];

        return view('dashboard.dashboard', compact('users'));
    }
}
