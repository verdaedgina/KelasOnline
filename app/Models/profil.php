<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'score', 'level'
    ];

    // Method untuk update score dan level
    public function updateScoreAndLevel($increment)
    {
        // Tambahkan skor
        $this->score += $increment;

        // Misalnya, jika skor >= 100, level berubah
        if ($this->score < 5) {
            $this->level = 'pemula';
        } elseif ($this->score < 10) {
            $this->level = 'menengah';
        } elseif ($this->score < 30) {
            $this->level = 'terpelajar';
        } elseif ($this->score < 50) {
            $this->level = 'expert';
        } else {
            $this->level = 'master';
        }

        // Simpan perubahan ke database
        $this->save();
    }
}
