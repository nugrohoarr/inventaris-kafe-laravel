<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id_user';
    protected $table = 'users';
    public $timestamps = false;

    // Set auto-incrementing to false if id_user is not auto-incrementing
    public $incrementing = true;

    protected $fillable = [
        'nama',
        'username',
        'password',
        'level',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static function getData()
    {
        return self::all();
    }
    public function getKeyName()
    {
        return 'id_user';
    }


    public static function getUserUpdate($id_user)
    {
        return self::find($id_user);
    }

    public static function simpanUser($data)
    {
        return self::create($data);
    }

    public static function updateUser($id_user, $data)
    {
        $user = self::find($id_user);
        return $user ? $user->update($data) : false;
    }

    public static function getLevel($username)
    {
        return self::where('username', $username)->first();
    }

    public static function deleteUser($id)
    {
        $user = self::find($id);
        return $user ? $user->delete() : false;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = md5($value);
    }

    public static function validateUser($username, $password)
    {
        $user = self::where('username', $username)->first();

        if ($user && md5($password) === $user->password) {
            return $user;
        }

        return false;
    }
}

