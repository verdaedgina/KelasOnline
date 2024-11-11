<?
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kelas;
use App\Models\Mapel;

class DynamicDropdown extends Component
{
    public $kelas = null;
    public $mapels = [];

    // Fetching all kelas from database
    public function render()
    {
        $kelasList = Kelas::all(); // Get all Kelas

        // If a kelas is selected, get the corresponding mapels
        if ($this->kelas) {
            $this->mapels = Mapel::where('kelas_id', $this->kelas)->get();
        } else {
            $this->mapels = [];
        }

        return view('livewire.dynamic-dropdown', [
            'kelasList' => $kelasList,
        ]);
    }

    public function updatedKelas($kelasId)
    {
        $this->mapels = Mapel::where('kelas_id', $kelasId)->get();
    }

}
