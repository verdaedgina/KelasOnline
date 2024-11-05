<?php

use Illuminate\Support\Facades\Route;
<<<<<<< Updated upstream
use App\Http\Controllers\MateriController;
=======
use App\Http\Controllers\MapelController;
>>>>>>> Stashed changes
use App\Http\Controllers\HomeController;

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

Route::get('/profil', function () {
    return view('pelajar.profil');
});

Auth::routes();

<<<<<<< Updated upstream
// Rute untuk siswa
Route::middleware(['auth', 'user-access:siswa'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/produk', [MateriController::class, 'produk'])->name('pelajar.produk');
});

//admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::resource('admin', MateriController::class);
    Route::get('/admin/dataMapel', [MateriController::class, 'index'])->name('admin.dataMapel');

}); 

Route::get('/akun', function () {
    return view('admin.dataAkun');
});
=======
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

});

//admin
Route::middleware(['auth', ''])->group(function () {
    Route::get('/mapel', [HomeController::class, 'mapel'])->name('admin.dataMapel');
}); 
>>>>>>> Stashed changes
