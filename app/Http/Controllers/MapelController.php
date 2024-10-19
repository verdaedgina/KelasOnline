<?php

namespace App\Http\Controllers;

use App\Models\mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = mapel::latest()->paginate(10);
        return view('admin.dataMapel', compact('mapels'));
    }

    public function show($id)
    {
        // Ambil data mapel berdasarkan ID
        $mapel = mapel::find($id);
        
        // Pastikan mapel ditemukan
        if (!$mapel) {
            return redirect()->route('admin.dataMapel')->with('error', 'Materi tidak ditemukan.');
        }
    
        // Kirim data mapel ke tampilan
        return view('pelajar.produk', compact('mapel'));
    }
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'idkelas' => 'required|string|max:255',
            'idlink' => 'required|numeric',
            'mapel' => 'required|date',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/tikets', $image->hashName());
    
        $tiket = Tiket::create([
            'image' => $image->hashName(),
            'idkelas' => $request->idkelas,
            'idlink' => $request->idlink,
            'mapel' => $request->mapel,
        ]);
    
        return $mapel 
            ? redirect()->route('admin.dataMapel')->with(['success' => 'Data Berhasil Disimpan!']) 
            : redirect()->route('admin.dataMapel')->with(['error' => 'Data Gagal Disimpan!']);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'idkelas' => 'required|string|max:255',
            'idlink' => 'required|numeric',
            'mapel' => 'required|date',
        ]);

        $mapel = mapel::findOrFail($id);

        if (!$request->hasFile('image')) {
            $tiket->update([
                'image' => $image->hashName(),
                'idkelas' => $request->idkelas,
                'idlink' => $request->idlink,
                'mapel' => $request->mapel,
            ]);
        } else {
            // Hapus gambar lama
            Storage::disk('local')->delete('public/mapels/' . $mapel->image);

            // Upload gambar baru
            $image = $request->file('image');
            $image->storeAs('public/mapels', $image->hashName());

            $tiket->update([
                'image' => $image->hashName(),
                'idkelas' => $request->idkelas,
                'idlink' => $request->idlink,
                'mapel' => $request->mapel,
            ]);
        }

        return redirect()->route('admin.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy($id)
    {
        $tiket = Tiket::findOrFail($id);
        Storage::disk('local')->delete('public/tikets/' . $tiket->image);
        $tiketDeleted = $tiket->delete();
      
        return $tiketDeleted 
        ? redirect()->route('admin.dataMapel')->with(['success' => 'Data Berhasil dihapus!']) 
        : redirect()->route('admin.dataMapel')->with(['error' => 'Data Gagal dihapus!']);
    }
}
