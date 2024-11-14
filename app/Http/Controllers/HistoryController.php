<?php
namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Profil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'materi_id' => 'required|exists:materi,id'
        ]);
    
        // Menyimpan data ke tabel history
        $history = new History();
        $history->user_id = $validatedData['user_id'];
        $history->materi_id = $validatedData['materi_id'];
        $history->save();
    
        return response()->json(['message' => 'Riwayat berhasil disimpan']);
    }
    

}
