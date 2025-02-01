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
        $request->validate([
            'user_id' => 'required',
            'materi_id' => 'required',
        ]);

        // Simpan data history
        History::create([
            'user_id' => $request->user_id,
            'materi_id' => $request->materi_id,
        ]);

        return redirect()->route('pelajar.produk')->with('success', 'Mapel berhasil ditambahkan.');
    }
    
    public function index()
    {
        $userId = Auth::id(); // Ambil ID user yang sedang login
        $histories = History::where('user_id', $userId)->with('materi')->get(); 
        return view('pelajar.history', compact('histories'));
    }
}
