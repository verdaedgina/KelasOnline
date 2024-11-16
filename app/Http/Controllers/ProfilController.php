<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    // Menampilkan profil pengguna
    public function showProfile()
    {
        $user = Auth::user();
        $profil = Profil::where('user_id', $user->id)->first();

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
        
        // Debugging, pastikan jumlah history dihitung dengan benar

        return view('pelajar.profil', compact('profil', 'totalUserHistory'));
    }


    // Fungsi untuk memperbarui profil pengguna
   public function updateProfile()
   {
       $profil = Profil::where('user_id', Auth::id())->first();
   
       if ($profil) {
           // Hitung jumlah history untuk pengguna
           $userHistoryCount = History::where('user_id', Auth::id())->count();
   
           // Debugging: Pastikan $userHistoryCount berisi nilai yang benar
           dd($userHistoryCount);
   
           // Kalikan jumlah history dengan 2 untuk mendapatkan skor tambahan
           $scoreToAdd = $userHistoryCount * 2; // Skor bertambah dua kali lipat
   
           // Tambahkan skor ke profil pengguna
           $profil->score += $scoreToAdd;
   
           // Tentukan level berdasarkan skor yang diperoleh
           $profil->level = $this->calculateLevel($profil->score);
   
           // Debugging: Lihat nilai variabel sebelum menyimpan
           dd($userHistoryCount, $scoreToAdd, $profil->score);
   
           // Simpan perubahan pada profil
           $profil->save();
   
           // Kembalikan response dengan skor dan level yang sudah diperbarui
           return response()->json([
               'message' => 'Skor berhasil diperbarui',
               'score' => $profil->score,
               'level' => $profil->level
           ]);
       }
   
       return response()->json(['message' => 'Profil tidak ditemukan'], 404);
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
