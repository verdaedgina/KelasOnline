<?php
namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Profil;
use App\Models\Materi;
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

    // Tentukan redirect berdasarkan sumber halaman
    if ($request->has('redirect_to') && $request->redirect_to === 'materi') {
        return redirect()->route('pelajar.materi', ['id' => $request->materi_id])
                         ->with('success', 'Mapel berhasil ditambahkan.');
    } else {
        return redirect()->route('pelajar.produk', ['id' => $request->materi_id])
                         ->with('success', 'Mapel berhasil ditambahkan.');
    }
}

    
    public function index()
    {
        $userId = Auth::id(); // Ambil ID user yang sedang login
        $histories = History::where('user_id', $userId)->with('materi')->get(); 
        return view('pelajar.history', compact('histories'));
    }

    public function showMateri($id)
{
    $materi = Materi::findOrFail($id);
    return view('pelajar.materi', compact('materi'));
}

}
