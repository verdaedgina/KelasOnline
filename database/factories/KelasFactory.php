<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KelasFactory extends Factory
{
    public function definition(): array
    {
        $nama_kelas = $this->faker->sentence();

        return [
            'nama_kelas' => $nama_kelas,
            'slug' => str()->slug($nama_kelas),
        ];
    }
}
