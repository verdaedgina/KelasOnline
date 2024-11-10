<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;
use App\Models\Mapel; // Tambahkan ini untuk memastikan Mapel dikenali
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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

        // Materi kelas 10
        Mapel::create([
            'namaMapel' => 'bahasa indonesia',
            'slug' => Str::slug('bahasa indonesia kelas10'),
            'id_Kelas' => $kelas10->id
        ]);

        Mapel::create([
            'namaMapel' => 'agama',
            'slug' => Str::slug('agama kelas10'),
            'id_Kelas' => $kelas10->id
        ]);

        Mapel::create([
            'namaMapel' => 'matematika',
            'slug' => Str::slug('matematika kelas10'),
            'id_Kelas' => $kelas10->id
        ]);

        // Materi kelas 11
        Mapel::create([
            'namaMapel' => 'bahasa indonesia',
            'slug' => Str::slug('bahasa indonesia kelas11'),
            'id_Kelas' => $kelas11->id
        ]);

        Mapel::create([
            'namaMapel' => 'agama',
            'slug' => Str::slug('agama kelas11'),
            'id_Kelas' => $kelas11->id
        ]);

        Mapel::create([
            'namaMapel' => 'PBB',
            'slug' => Str::slug('PBB kelas11'),
            'id_Kelas' => $kelas11->id
        ]);

        // Materi kelas 12
        Mapel::create([
            'namaMapel' => 'bahasa indonesia',
            'slug' => Str::slug('bahasa indonesia kelas12'),
            'id_Kelas' => $kelas12->id
        ]);

        Mapel::create([
            'namaMapel' => 'agama',
            'slug' => Str::slug('agama kelas12'),
            'id_Kelas' => $kelas12->id
        ]);

        Mapel::create([
            'namaMapel' => 'PBTGM',
            'slug' => Str::slug('PBTGM kelas12'),
            'id_Kelas' => $kelas12->id
        ]);
    }
}
