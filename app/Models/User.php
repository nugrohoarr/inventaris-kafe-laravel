<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'username',
        'password',
        'level',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Automatically hash the password when it is set.
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * Retrieve all user data.
     *
     * @return array
     */
    public static function getData()
    {
        return self::all()->toArray();
    }

    /**
     * Retrieve a user by ID for updating.
     *
     * @param  int  $id
     * @return User|null
     */
    public static function getUserUpdate($id)
    {
        return self::find($id);
    }

    /**
     * Create a new user.
     *
     * @param  array  $data
     * @return User
     */
    public static function simpanUser($data)
    {
        $data['password'] = md5($data['password']); // Use md5 to match the original CodeIgniter functionality
        return self::create($data);
    }

    /**
     * Update an existing user.
     *
     * @param  int  $id
     * @param  array  $data
     * @return bool
     */
    public static function updateUser($id, $data)
    {
        $user = self::find($id);
        if (isset($data['password']) && $data['password'] !== '') {
            $data['password'] = md5($data['password']); // Use md5 to match the original CodeIgniter functionality
        } else {
            unset($data['password']);
        }
        return $user->update($data);
    }

    /**
     * Delete a user.
     *
     * @param  int  $id
     * @return bool|null
     */
    public static function deleteUser($id)
    {
        $user = self::find($id);
        return $user->delete();
    }
}
