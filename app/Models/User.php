<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fname',
        'lname',
        'username',
        'image',
        'email',
        'phone_verified_at',
        'phone',
        'password',
        'type'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function isAdmin()
    {
        return $this->type === 'admin';
    }
    public function getPasswordAttributeName()
    {
        return 'password';
    }

    /**
     * Determine if the given password is correct.
     *
     * @param  string  $password
     * @return bool
     */
    public function isPasswordValid($password)
    {
        return $this->password !== null && Hash::check($password, $this->password);
    }
}
