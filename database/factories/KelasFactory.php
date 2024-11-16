<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class KelasFactory extends Factory
{
    public function definition(): array
    {
        // Menghasilkan nama kelas yang lebih pendek
        $nama_kelas = implode(' ', $this->faker->words(2)); // Dua kata untuk nama kelas

        return [
            'nama_kelas' => $nama_kelas,
            'slug' => str()->slug($nama_kelas),
        ];
    }
}
