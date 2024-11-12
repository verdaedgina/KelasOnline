<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    use HasFactory;
    protected $table = 'mapels';
    protected $fillable = [
        'id_kelas',
        'namaMapel',
        'slug',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    } 
}
