<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelas>
 */
class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nama_kelas = implode(' ', $this->faker->words(2)); // Dua kata untuk nama kelas

        return [
            'nama_kelas' => $nama_kelas,
            'slug' => str()->slug($nama_kelas),
        ];
    }
}
