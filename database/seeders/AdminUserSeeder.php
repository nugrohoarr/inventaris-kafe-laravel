<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'peminjam1',
            'username' => 'peminjam',
            'password' => Hash::make('peminjam'),
            'level' => 'peminjam',
        ]);
        User::create([
            'nama' => 'Dummy User 1',
            'username' => 'manajemen',
            'password' => Hash::make('manajemen'),
            'level' => 'manajemen'
        ]);
    }
}
