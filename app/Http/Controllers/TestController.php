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
                'level' => 'manajemen',
            ],
            (object)[
                'id' => 2,
                'nama' => 'Jane Smith',
                'level' => 'peminjam',
            ],
        ];

        return view('welcome', compact('users'));
    }
}
