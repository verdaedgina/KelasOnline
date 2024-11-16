<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kelas;
use App\Models\Mapel;

class FormMapel extends Component
{
    // Di dalam komponen Livewire FormMapel.php
public $kelasList; // untuk menangkap kelas yang dipilih
public $mapels = []; // untuk menampung mapel sesuai kelas yang dipilih

public function getKelasList()
{
    // Ambil mapel berdasarkan kelas yang dipilih
   $this->mapels = Mapel::where('id_kelas', $this->kelas)->get();
//     return Mapel::where('id_kelas', $this->kelas)->orderBy('namaMapel')->get();
}

public function render()
{
    // Pastikan kelasList berisi data kelas yang benar
    $kelasList = Kelas::all(); 

    return view('admin.form-mapel', compact('kelasList'));
}

}
