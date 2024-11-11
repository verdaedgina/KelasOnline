<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\create_siswa_tabel;

class SiswaController extends Controller
{
    /**
     * Menampilkan semua data akun pengguna
     */
    public function index()
    {
        // Ambil semua data pengguna
        $users = create_siswa_tabel::all();

        // Kirim data ke view
        return view('dataAkun', compact('users'));
    }
}
