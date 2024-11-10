<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'role', // Menyimpan role sebagai string
    ];

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
    ];

    /**
     * Mengambil role pengguna dalam format yang dapat dibaca.
     *
     * @return Attribute
     */
    // protected function role(): Attribute
    // {
    //     return new Attribute(
    //         get: fn ($value) =>  ["admin","siswa"][$value], // Mengembalikan nilai asli, tidak perlu diubah
    //     );
    // }
    
}

