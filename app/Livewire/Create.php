<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Kelas;
use App\Models\Mapel;

class Create extends Component
{
    public $kelas = 'choose';
    public $mapel = []; // Untuk menyimpan mata pelajaran berdasarkan kelas yang dipilih

    // Mengambil semua data kelas
    public function getKelas()
    {
        return Kelas::orderBy('nama_kelas')->get();
    }

    // Memperbarui mapel berdasarkan kelas yang dipilih
    public function updatedKelas($value)
    {
        // Menyaring mata pelajaran berdasarkan kelas yang dipilih
        $this->mapel = Mapel::where('kelas_id', $value)->orderBy('namaMapel')->get();
    }

    public function render()
    {
        $kelasList = Kelas::all(); // Ambil data kelas
        // Tidak perlu query ulang mapel di sini karena Livewire sudah meng-handle nya
        return view('admin.create', compact('kelasList'));
    }
}
