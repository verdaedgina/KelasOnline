<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    use HasFactory;
    protected $fillable = [
        'idKelas',
        'namaMapel',
    ];
    public function Kelas()
    {
        return $this->belongsTo(Kelas::class);
    } 
}
