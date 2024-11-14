<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kelas;
use App\Models\Mapel;
use Livewire\Attributes\Title;

class Create extends Component
{
    public $kelas = 'choose';
    
    public function getMapel()
    {
        return Mapel::where('id_kelas', $this->kelas)->orderBy('namaMapel')->get();
    }

    public function kelas()
    {
        return Kelas::orderBy('nama_kelas')->get();
    }

    #[Title('Create')]
    public function render()
    {
        return view('livewire.create',[
            'kelas' => $this->kelas(),
            'mapel' => $this->getMapel(),
        ]);
    }
}
