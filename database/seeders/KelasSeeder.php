<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Kelas;
use Illuminate\Support\Str;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelas10 = Kelas::create([
            'nama_kelas' => 'kelas10',
            'slug' => Str::slug('kelas10')
        ]);

        $kelas11 = Kelas::create([
            'nama_kelas' => 'kelas11',
            'slug' => Str::slug('kelas11')
        ]);

        $kelas12 = Kelas::create([
            'nama_kelas' => 'kelas12',
            'slug' => Str::slug('kelas12')
        ]);
    }
}
