<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Kelas;

class MateriFactory extends Factory
{
    public function definition(): array
    {
        $namaMapel = $this->faker->word(); // Menghasilkan satu kata untuk nama mata pelajaran

        return [
            'id_kelas' => Kelas::inRandomOrder()->first()?->id ?? Kelas::factory(), // Menggunakan factory sebagai fallback
            'namaMapel' => $namaMapel,
            'slug' => Str::slug($namaMapel), // Membuat slug dari namaMapel
        ];
    }
}
