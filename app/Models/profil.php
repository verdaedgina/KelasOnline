<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profil extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'username',
        'level',
        'score',
        'user_id', // Ensure user_id is fillable if needed
    ];

    public function updateScoreAndLevel($increment)
    {
        // Increment the score
        $this->score += $increment;
        
        // Update the level based on the new score
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

        // Save the changes to the database
        $this->save();
    }
}
