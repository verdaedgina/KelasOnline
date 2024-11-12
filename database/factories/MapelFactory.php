<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Kelas;
class MateriFactory extends Factory

{
    public function definition(): array
    {
        $namaMapel = $this->faker->word(); // Gunakan satu kata untuk nama mata pelajaran

        return [
            'id_kelas' => Kelas::inRandomOrder()->first()->id,
            'namaMapel' => $namaMapel,
            'slug' => str()->slug($namaMapel), // Membuat slug berdasarkan namaMapel
        ];
    }
}

