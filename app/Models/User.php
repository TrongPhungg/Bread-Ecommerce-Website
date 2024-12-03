<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'role',
<<<<<<< HEAD
        'remember_token',
        'email_verified_at',
=======
>>>>>>> 74552d279f6bb414e85f1699cd275d6819f3c5a8
        'IDKhachhang'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => 'integer',
        'password' => 'hashed'
    ];

    public function khachhang()
    {
        return $this->belongsTo(Khachhang::class, 'IDkhachhang', 'id');
    }
    public $timestamps = false;
}
