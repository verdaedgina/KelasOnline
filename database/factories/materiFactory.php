<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\materi>
 */
class materiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_kelas' => kelas::inRandomOrder()->first()->id,
            'namaMapel' => $namaMapel,
            'slug' => str()->slug($namaMapel),

        ];
    }
}
