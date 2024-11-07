<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function readMaterial(Request $request)
    {
        // Ambil profil pengguna yang sedang login
        $profil = Profil::where('user_id', auth()->user()->id)->first();
    
        if ($profil) {
            // Tambahkan skor 1 untuk membaca materi
            $profil->updateScoreAndLevel(1);
            return redirect()->back()->with('success', 'Score updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Profile not found.');
        }
    }

    public function showProfile()
    {
        $user = Auth::user();
        $profil = Profil::where('user_id', $user->id)->first();
    
        // Jika profil tidak ditemukan, buat objek kosong atau berikan pesan
        if (!$profil) {
            $profil = new Profil(); // Bisa juga tambahkan nilai default jika diperlukan
        }
    
        return view('pelajar.profil', compact('user', 'profil'));
    }

    public function addScore(Request $request)
    {
        // Pastikan pengguna sudah login
        if (Auth::check()) {
            // Cari data profil berdasarkan `user_id`
            $profil = Profil::firstOrCreate(
                ['user_id' => Auth::id()],
                ['username' => Auth::user()->name, 'score' => 0, 'level' => 'pemula'] // Data default jika profil belum ada
            );

            // Tambahkan skor
            $profil->updateScoreAndLevel($request->input('increment', 1)); // Increment score
            return response()->json(['success' => true, 'message' => 'Score updated successfully']);
        }
        
        return response()->json(['success' => false, 'message' => 'Failed to update score'], 400);
    }


}
