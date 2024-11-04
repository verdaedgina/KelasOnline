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
             return redirect()->route('pelajar.produk')->with('error', 'tidak ditemukan.');
         }
     
         // Kirim data tiket ke tampilan
         return view('pelajar.produk', compact('materi'));
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
    $this->validate($request, [
        'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Gambar menjadi nullable jika tidak diupload
        'kelas' => 'required|string',
        'nama_mapel' => 'required|string',
        'video' => 'required|url',
        'artikel' => 'required|url',
    ]);

    // Temukan materi berdasarkan ID
    $materi = Materi::findOrFail($id);

    // Cek apakah ada file gambar yang diupload
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada
        if ($materi->image) {
            Storage::disk('local')->delete('public/images/' . $materi->image);
        }

        // Upload gambar baru
        $image = $request->file('gambar');
        $imageName = $image->hashName(); // Simpan nama gambar baru
        $image->storeAs('public/images', $imageName);

        // Update data dengan gambar baru
        $materi->update([
            'image' => $imageName,
            'kelas' => $request->kelas,
            'mapel' => $request->nama_mapel, // Pastikan ini sesuai dengan nama kolom di database
            'video' => $request->video,
            'artikel' => $request->artikel,
        ]);
    } else {
        // Jika tidak ada gambar baru, hanya update data lain
        $materi->update([
            'kelas' => $request->kelas,
            'mapel' => $request->nama_mapel, // Pastikan ini sesuai dengan nama kolom di database
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
        Storage::disk('local')->delete('public/images/'.$materi->image);
        $materi->delete();

        if($materi){
     //redirect dengan pesan sukses
         return redirect()->route('admin.dataMapel')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
    //redirect dengan pesan error
    return redirect()->route('admin.dataMapel')->with(['error' => 'Data Gagal Dihapus!']);
  }
    }
}
