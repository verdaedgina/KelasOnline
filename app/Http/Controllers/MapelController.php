<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class MapelController extends Controller
{
    public function create()
    {
        // Ambil semua data kelas
        $kelas = Kelas::all();

        // Kirim data kelas ke view
        return view('form', compact('kelas'));
    }
}
