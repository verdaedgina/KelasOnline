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

        // Materi
        Mapel::create([
            'namaMapel' => 'bahasa indonesia',
            'slug' => Str::slug('bahasa indonesia'),
            'id_kelas' => $kelas10->id
        ]);

        Mapel::create([
            'namaMapel' => 'bahasa inggris',
            'slug' => Str::slug('bahasa inggris'),
            'id_kelas' => $kelas10->id
        ]);

        Mapel::create([
            'namaMapel' => 'bahasa jawa',
            'slug' => Str::slug('bahasa jawa'),
            'id_kelas' => $kelas10->id
        ]);

        Mapel::create([
            'namaMapel' => 'matematika',
            'slug' => Str::slug('matematika'),
            'id_kelas' => $kelas10->id
        ]);

        Mapel::create([
            'namaMapel' => 'ppkn',
            'slug' => Str::slug('ppkn'),
            'id_kelas' => $kelas10->id
        ]);

        Mapel::create([
            'namaMapel' => 'sejarah',
            'slug' => Str::slug('sejarah'),
            'id_kelas' => $kelas10->id
        ]);

        Mapel::create([
            'namaMapel' => 'ppb',
            'slug' => Str::slug('ppb'),
            'id_kelas' => $kelas10->id
        ]);

        Mapel::create([
            'namaMapel' => 'bdr',
            'slug' => Str::slug('bdr'),
            'id_kelas' => $kelas10->id
        ]);

        Mapel::create([
            'namaMapel' => 'pbtgm',
            'slug' => Str::slug('pbtgm'),
            'id_kelas' => $kelas10->id
        ]);

        Mapel::create([
            'namaMapel' => 'ipas',
            'slug' => Str::slug('ipas'),
            'id_kelas' => $kelas10->id
        ]);

        Mapel::create([
            'namaMapel' => 'seni budaya',
            'slug' => Str::slug('seni budaya'),
            'id_kelas' => $kelas10->id
        ]);

        Mapel::create([
            'namaMapel' => 'informatika',
            'slug' => Str::slug('informatika'),
            'id_kelas' => $kelas10->id
        ]);

        Mapel::create([
            'namaMapel' => 'olahraga',
            'slug' => Str::slug('olahraga'),
            'id_kelas' => $kelas10->id
        ]);

        Mapel::create([
            'namaMapel' => 'mpp',
            'slug' => Str::slug('mpp'),
            'id_kelas' => $kelas10->id
        ]);

        Mapel::create([
            'namaMapel' => 'pkkkwu',
            'slug' => Str::slug('pkkkwu'),
            'id_kelas' => $kelas10->id
        ]);

        Mapel::create([
            'namaMapel' => 'pweb',
            'slug' => Str::slug('pweb'),
            'id_kelas' => $kelas10->id
        ]);

        Mapel::create([
            'namaMapel' => 'agama',
            'slug' => Str::slug('agama'),
            'id_kelas' => $kelas10->id
        ]);
    }
}
