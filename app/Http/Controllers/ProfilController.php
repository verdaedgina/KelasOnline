<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    // Menampilkan profil pengguna
    public function showProfile()
    {
        $user = Auth::user();
        $profil = Profil::where('user_id', $user->id)->first();

        if (!$profil) {
            $profil = new Profil(); // Jika profil tidak ditemukan, buat objek kosong atau buat profil baru
        }

        return view('pelajar.profil', compact('user', 'profil'));
    }
}
