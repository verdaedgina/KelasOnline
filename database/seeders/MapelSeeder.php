<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mapel;
use App\Models\Kelas; // Pastikan kelas sudah diimport
use Illuminate\Support\Str;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mendapatkan kelas berdasarkan nama
        $kelas10 = Kelas::where('nama_kelas', 'kelas10')->first();
        $kelas11 = Kelas::where('nama_kelas', 'kelas11')->first();
        $kelas12 = Kelas::where('nama_kelas', 'kelas12')->first();

        // Pastikan kelas-kelas tersebut ditemukan
        if (!$kelas10 || !$kelas11 || !$kelas12) {
            // Jika kelas tidak ada, tampilkan pesan kesalahan
            echo "Kelas tidak ditemukan!";
            return;
        }

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
