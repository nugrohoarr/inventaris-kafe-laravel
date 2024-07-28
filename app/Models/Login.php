<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Login extends Model
{
    protected $table = 'user';

    public static function validasi($username, $password)
    {
        $user = self::where('username', $username)->first();

        if ($user && md5($password) === $user->password) {
            return $user;
        }

        return false;
    }

    public static function getLevel($username)
    {
        return self::where('username', $username)->first();
    }
}