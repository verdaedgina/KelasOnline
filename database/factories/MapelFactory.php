<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Kelas;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\materi>
 */
class MateriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $namaMapel = $this->faker->word(); // Gunakan satu kata untuk nama mata pelajaran

        return [
            'id_kelas' => Kelas::pluck('id')->random(), // Ambil id_kelas secara acak
            'namaMapel' => $namaMapel,
            'slug' => str()->slug($namaMapel), // Membuat slug berdasarkan namaMapel
        ];
    }
}

