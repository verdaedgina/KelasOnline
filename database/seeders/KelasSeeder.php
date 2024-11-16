<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Support\Str;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat data kelas
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

        // Materi untuk kelas 10
        Mapel::create([
            'namaMapel' => 'bahasa indonesia',
            'slug' => Str::slug('bahasa indonesia'),
            'id_kelas' => $kelas10->id
        ]);

        Mapel::create([
            'namaMapel' => 'agama',
            'slug' => Str::slug('agama'),
            'id_kelas' => $kelas10->id
        ]);

        Mapel::create([
            'namaMapel' => 'matematika',
            'slug' => Str::slug('matematika'),
            'id_kelas' => $kelas10->id
        ]);

        // Materi untuk kelas 11
        Mapel::create([
            'namaMapel' => 'bahasa indonesia',
            'slug' => Str::slug('bahasa indonesia'),
            'id_kelas' => $kelas11->id
        ]);

        Mapel::create([
            'namaMapel' => 'agama',
            'slug' => Str::slug('agama'),
            'id_kelas' => $kelas11->id
        ]);

        Mapel::create([
            'namaMapel' => 'PBB',
            'slug' => Str::slug('PBB'),
            'id_kelas' => $kelas11->id
        ]);

        // Materi untuk kelas 12
        Mapel::create([
            'namaMapel' => 'bahasa indonesia',
            'slug' => Str::slug('bahasa indonesia'),
            'id_kelas' => $kelas12->id
        ]);

        Mapel::create([
            'namaMapel' => 'agama',
            'slug' => Str::slug('agama'),
            'id_kelas' => $kelas12->id
        ]);

        Mapel::create([
            'namaMapel' => 'PBTGM',
            'slug' => Str::slug('PBTGM'),
            'id_kelas' => $kelas12->id
        ]);
    }
}
