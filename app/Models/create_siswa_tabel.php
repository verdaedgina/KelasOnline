<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class create_siswa_tabel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'password',
    ];
}
