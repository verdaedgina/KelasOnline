<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Kelas;
use App\Models\Mapel;
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
    public function create(Request $request)
    {
        $kelasList = Kelas::all(); // Ambil semua kelas
        $mapels = []; // Inisialisasi array mapel

        // Jika ada id kelas yang dipilih, ambil mapel terkait
        if ($request->has('id_Kelas')) {
            $mapels = Mapel::where('id_kelas', $request->id_Kelas)->get();
        }

        return view('livewire.create', compact('kelasList', 'mapels'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input\
        
        $request->validate([
            'kelas' => 'required',
            'mapel' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'materi' => 'required',
            'video' => 'required|url',
            'artikel' => 'required|url',
        ]);

        // Proses upload gambar jika ada
        $image = $request->file('image');
        $image->storeAs('public/materis', $image->hashName());

        // Simpan data materi
        Materi::create([
            'kelas' => $request->kelas,
            'mapel' => $request->mapel,
            'image' => $image->hashName(),
            'materi' => $request->materi,
            'video' => $request->video,
            'artikel' => $request->artikel,
        ]);

        return redirect()->route('admin.dataMapel')->with('success', 'Mapel berhasil ditambahkan.');
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'kelas' => 'required',
            'mapel' => 'required',
            'materi' => 'required',
            'video' => 'required|url',
            'artikel' => 'required|url',
        ]);

        $materi = Materi::findOrFail($id);

        // Jika tidak ada gambar baru, update materi tanpa mengubah gambar
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            Storage::disk('local')->delete('public/materis/' . $materi->image);

            // Upload gambar baru
            $image = $request->file('image');
            $image->storeAs('public/materis', $image->hashName());
            $materi->image = $image->hashName();
        }

        // Update data materi
        $materi->update([
            'kelas' => $request->kelas,
            'mapel' => $request->mapel,
            'materi' => $request->materi,
            'video' => $request->video,
            'artikel' => $request->artikel,
        ]);

        return redirect()->route('admin.dataMapel')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materi = Materi::findOrFail($id);
        Storage::disk('local')->delete('public/materis/' . $materi->image);
        $materiDeleted = $materi->delete();

        return $materiDeleted 
            ? redirect()->route('admin.dataMapel')->with('success', 'Data berhasil dihapus.')
            : redirect()->route('admin.dataMapel')->with('error', 'Data gagal dihapus.');
    }

    public function pilihMateri($materiId)
    {
        $user = auth()->username(); // Ambil user yang sedang login
        $profil = $username->profil; // Pastikan ada relasi profil dengan user
        
        $materi = Materi::find($materiId); // Ambil materi yang dipilih

        if ($materi) {
            // Tambah skor pengguna
            $profil->updateScoreAndLevel(1); // Menambah 1 ke skor dan otomatis memperbarui level
            
            return redirect()->route('materi.index')->with('success', 'Skor dan level berhasil diperbarui!');
        }

        return redirect()->route('materi.index')->with('error', 'Materi tidak ditemukan.');
    }
}
