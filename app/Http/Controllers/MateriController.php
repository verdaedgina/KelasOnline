<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Kelas; // Import the Kelas model
use App\Models\Mapel; // Import the Mapel model
use Illuminate\Support\Facades\Storage;



class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materi = Materi::all();
        return view('admin.dataMapel', compact('materi'));
    }

    public function produk()
    {
        $materi = Materi::all();
        return view('pelajar.produk', compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelasList = Kelas::all(); // Ambil semua kelas
        $mapels = Mapel::all(); // Ambil semua mapel
        return view('admin.create', compact('kelasList', 'mapels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'kelas' => 'required',
            'mapel' => 'required',
            'video' => 'required|url',
            'artikel' => 'required|url',
        ]);

        // Proses upload gambar jika ada
        $image = $request->file('image');
        $image->storeAs('public/materis', $image->hashName());
    
        // Simpan data
        Materi::create([
            'image' => $image->hashName(),
            'kelas' => $request->kelas,
            'mapel' => $request->mapel,
            'video' => $request->video,
            'artikel' => $request->artikel,
        ]);
        return redirect()->route('admin.dataMapel')->with('success', 'Mapel berhasil ditambahkan.');
        
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $materi = Materi::find($id);
        if (!$materi) {
            return redirect()->route('pelajar.produk')->with('error', 'Materi tidak ditemukan.');
        }
    
        return view('pelajar.produk', compact('materi')); // Passing 'materi' to the view
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $materi = Materi::findOrFail($id);
        $kelasList = Kelas::all();
        $mapels = Mapel::all();
        return view('admin.edit', compact('materi', 'kelasList', 'mapels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validasi input
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'kelas' => 'required',
        'mapel' => 'required',
        'video' => 'required|url',
        'artikel' => 'required|url',
    ]);

    $materi = Materi::findOrFail($id);

    if (!$request->hasFile('image')) {
        $materi->update([
            'image' => $image->hashName(),
            'kelas' => $request->kelas,
            'mapel' => $request->mapel,
            'video' => $request->video,
            'artikel' => $request->artikel,
        ]);
    } else {
        // Hapus gambar lama
        Storage::disk('local')->delete('public/tikets/' . $materi->image);

        // Upload gambar baru
        $image = $request->file('image');
        $image->storeAs('public/materis', $image->hashName());

        $materi->update([
            'image' => $image->hashName(),
            'kelas' => $request->kelas,
            'mapel' => $request->mapel,
            'video' => $request->video,
            'artikel' => $request->artikel,
        ]);
    }

    // Redirect dengan pesan sukses
    return redirect()->route('admin.dataMapel')->with(['success' => 'Data Berhasil Diupdate!']);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materi = Materi::findOrFail($id);
        Storage::disk('local')->delete('public/materis/' . $materi->image);
        $materiDeleted = $materi->delete();
      
        return $tiketDeleted 
            ? redirect()->route('admin.data')->with(['success' => 'Data Berhasil Dihapus!']) 
            : redirect()->route('admin.data')->with(['error' => 'Data Gagal Dihapus!']);
    }
}
