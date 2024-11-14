<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    // Menampilkan profil pengguna dan memperbarui skor serta level
    public function showProfile()
    {
        $user = Auth::user();
        $profil = Profil::where('user_id', $user->id)->first();

        // Jika profil belum ada, buat profil baru untuk pengguna
        if (!$profil) {
            $profil = Profil::create([
                'user_id' => $user->id,
                'score' => 0,
                'level' => 'pemula',
                'username' => $user->username,
            ]);
        }

        // Hitung jumlah history untuk pengguna yang sedang login
        $totalUserHistory = History::where('user_id', $user->id)->count();
        
        // Hitung skor berdasarkan jumlah history dikali 2
        $score = $totalUserHistory * 2;

        // Update skor dan level
        $profil->score = $score;
        $profil->level = $this->calculateLevel($score);
        $profil->save();

        return view('pelajar.profil', compact('profil', 'totalUserHistory'));
    }

    // Metode untuk menentukan level berdasarkan skor
    private function calculateLevel($score)
    {
        if ($score <= 10) {
            return 'pemula';
        } elseif ($score <= 20) {
            return 'menengah';
        } elseif ($score <= 30) {
            return 'terpelajar';
        } elseif ($score <= 40) {
            return 'expert';
        } else {
            return 'master';
        }
    }
}
