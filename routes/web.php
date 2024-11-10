<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;

Route::get('/', function () {
    return view('auth.login');
});

// Pelajar
Route::get('/about', function () {
    return view('pelajar.about');
});

Route::get('/produk', function () {
    return view('pelajar.produk');
});

Route::get('/level', function () {
    return view('pelajar.level');
});

Route::middleware(['auth'])->group(function () {
    // Rute untuk menampilkan dan mengedit profil
    Route::get('/profil', [ProfilController::class, 'showProfile'])->name('pelajar.profil');
    Route::post('/profil', [ProfilController::class, 'readMaterial']);
});




Auth::routes();

// Rute untuk siswa
Route::middleware(['auth', 'user-access:siswa'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/produk', [MateriController::class, 'show'])->name('pelajar.produk');
    Route::get('/produk', [MateriController::class, 'produk'])->name('pelajar.produk');
});

//admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::resource('admin', MateriController::class);
    Route::get('/admin', [MateriController::class, 'index'])->name('admin.dataMapel');
}); 

Route::get('/akun', function () {
    return view('admin.dataAkun');
});
