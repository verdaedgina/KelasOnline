<?php
namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Materi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function add(Request $request, $materiId)
    {
        // Validasi apakah materi dengan ID tersebut ada
        $materi = Materi::find($materiId);
    
        if (!$materi) {
            return response()->json(['message' => 'Materi tidak ditemukan'], 404);
        }
    
        // Simpan data ke dalam tabel Profil
        $profil = Profil::create([
            'user_id' => Auth::id(),
            'materi_id' => $materiId,
        ]);
    
        return response()->json(['message' => 'Profil berhasil disimpan', 'profil' => $profil], 200);
    }

    public function addHistory(Request $request, $materiId)
    {
        // Tambahkan entri history
        $history = History::create([
            'user_id' => Auth::id(),
            'materi_id' => $materiId,
        ]);

        // Panggil addScore untuk memperbarui skor
        $this->addScore();

        return response()->json(['message' => 'History ditambahkan dan skor diperbarui']);
    }

    
}
