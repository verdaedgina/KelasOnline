<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use App\Models\Materi; // Pastikan model Materi ada
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

    // Fungsi untuk memilih materi dan menambah skor
    public function selectMateri(Request $request, $materiId)
{
    $user = Auth::user();  // Ambil user yang sedang login
    $profil = Profil::where('user_id', $user->id)->first();  // Ambil profil pengguna

    if (!$profil) {
        // Buat profil baru jika belum ada
        $profil = Profil::create(['user_id' => $user->id, 'score' => 0, 'level' => 'pemula']);
    }

    // Cari materi yang dipilih, misalnya "Agama"
    $materi = Materi::find($materiId);

    if ($materi) {
        // Misalkan setiap materi memberi skor 1
        $increment = 1;

        // Tambahkan skor
        $profil->score += $increment;
        $profil->save();  // Simpan perubahan

        // Optional: Perbarui level jika diperlukan
        $profil->updateScoreAndLevel($increment);

        return redirect()->route('pelajar.produk')->with('success', 'Skor berhasil ditambah!');
    }

    return redirect()->route('pelajar.produk')->with('error', 'Materi tidak ditemukan.');
}

    // Menambahkan skor ketika membaca materi
    public function readMaterial(Request $request)
    {
        $profil = Profil::where('user_id', auth()->user()->id)->first();
    
        if ($profil) {
            // Tambahkan skor 1 untuk membaca materi
            if ($profil->updateScoreAndLevel(1)) {
                return redirect()->back()->with('success', 'Skor berhasil diperbarui!');
            } else {
                return redirect()->back()->with('error', 'Gagal memperbarui skor.');
            }
        } else {
            return redirect()->back()->with('error', 'Profil tidak ditemukan.');
        }
    }

    // Fungsi untuk menambahkan skor dari permintaan lainnya
    public function addScore(Request $request)
    {
        // Pastikan pengguna sudah login
        if (Auth::check()) {
            // Cari data profil berdasarkan `user_id`
            $profil = Profil::firstOrCreate(
                ['user_id' => Auth::id()],
                ['username' => Auth::user()->name, 'score' => 0, 'level' => 'pemula'] // Data default jika profil belum ada
            );
    
            // Validasi increment score jika diberikan dalam request
            $increment = $request->input('increment', 1);
            if (!is_numeric($increment) || $increment <= 0) {
                return response()->json(['success' => false, 'message' => 'Invalid increment value'], 400);
            }
    
            // Tambahkan skor
            $profil->updateScoreAndLevel($increment); // Increment score
            return response()->json(['success' => true, 'message' => 'Score updated successfully']);
        }
    
        return response()->json(['success' => false, 'message' => 'Failed to update score'], 400);
    }
}
