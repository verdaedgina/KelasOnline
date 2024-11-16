<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'kelas',
        'mapel',
        'materi',
        'video',
        'artikel'
    ];    

    public function histories()
{
    return $this->hasMany(History::class);
}

}
