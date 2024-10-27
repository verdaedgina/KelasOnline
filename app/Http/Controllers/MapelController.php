<?php
namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MapelController extends Controller
{
    public function mapel()
    {
        $mapels = Mapel::latest()->paginate(10);
        return view('admin.dataMapel', compact('mapels'));
    }

    public function show($id)
    {
        $mapel = Mapel::find($id);
        
        if (!$mapel) {
            return redirect()->route('admin.dataMapel')->with('error', 'Materi tidak ditemukan.');
        }
    
        return view('pelajar.produk', compact('mapel'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'idkelas' => 'required|string|max:255',
            'idlink' => 'required|numeric',
            'mapel' => 'required|string|max:255',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/mapels', $image->hashName());
    
        $mapel = Mapel::create([
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
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'idkelas' => 'required|string|max:255',
            'idlink' => 'required|numeric',
            'mapel' => 'required|string|max:255',
        ]);

        $mapel = Mapel::findOrFail($id);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            Storage::disk('local')->delete('public/mapels/' . $mapel->image);

            // Upload gambar baru
            $image = $request->file('image');
            $image->storeAs('public/mapels', $image->hashName());

            $mapel->image = $image->hashName();
        }

        $mapel->idkelas = $request->idkelas;
        $mapel->idlink = $request->idlink;
        $mapel->mapel = $request->mapel;
        $mapel->save();

        return redirect()->route('admin.dataMapel')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
        Storage::disk('local')->delete('public/mapels/' . $mapel->image);
        $mapelDeleted = $mapel->delete();
      
        return $mapelDeleted 
        ? redirect()->route('admin.dataMapel')->with(['success' => 'Data Berhasil dihapus!']) 
        : redirect()->route('admin.dataMapel')->with(['error' => 'Data Gagal dihapus!']);
    }
}
