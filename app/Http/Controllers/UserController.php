<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $level = Auth::user();
        return view('user.userList', compact('users', 'level'));
    }

    public function create()
    {
        $level = Auth::user();
        return view('user.userForm', compact('level'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:user',
            'password' => 'required|string|min:8',
            'level' => 'required|in:administrator,manajemen',
        ]);

        // // Hash password using MD5
        // $data['password'] = md5($data['password']);
        User::create($data);

        return redirect()->route('users.index')->with('success', 'Berhasil menambahkan user');
    }


    public function edit(User $user)
    {
        $level = Auth::user();
        return view('user.userForm', compact('user', 'level'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:user,username,' . $user->id_user . ',id_user',
            'password' => 'nullable|string|min:8',
            'level' => 'required|in:administrator,manajemen',
        ]);

        if ($request->filled('password')) {
            $data['password'] = ($request->password); 
        } else {
            unset($data['password']);  
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', "User {$user->nama} berhasil diperbarui.");
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', "User {$user->nama} berhasil dihapus.");
    }
}