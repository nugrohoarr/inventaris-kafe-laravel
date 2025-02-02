<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'level' => 'administrator',
        ]);
        User::create([
            'nama' => 'Dummy User 1',
            'username' => 'manajemen',
            'password' => Hash::make('manajemen'),
            'level' => 'manajemen'
        ]);
    }
}
