<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Kelas;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    // Menampilkan daftar mapel
    public function index()
    {
        $mapels = Mapel::with('kelas')->get(); // Mengambil mapel beserta relasinya
        return view('mapel.index', compact('mapels'));
    }

    // Menampilkan form untuk menambah mapel
    public function create()
    {
        $kelas = Kelas::all(); // Mengambil semua kelas
        return view('mapel.create', compact('kelas'));
    }

    // Menyimpan mapel baru
    public function store(Request $request)
    {
        $request->validate([
            'id_kelas' => 'required|exists:kelas,id', // Validasi id_kelas harus ada di tabel kelas
            'namaMapel' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:mapels',
        ]);

        Mapel::create($request->all()); // Menyimpan mapel baru

        return redirect()->route('mapel.index')->with('success', 'Mapel berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit mapel
    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);
        $kelas = Kelas::all(); // Mengambil semua kelas untuk dropdown
        return view('mapel.edit', compact('mapel', 'kelas'));
    }

    // Mengupdate data mapel
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kelas' => 'required|exists:kelas,id',
            'namaMapel' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:mapels,slug,' . $id,
        ]);

        $mapel = Mapel::findOrFail($id);
        $mapel->update($request->all());

        return redirect()->route('mapel.index')->with('success', 'Mapel berhasil diupdate.');
    }

    // Menghapus mapel
    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        return redirect()->route('mapel.index')->with('success', 'Mapel berhasil dihapus.');
    }
}
