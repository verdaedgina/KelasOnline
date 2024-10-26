<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('auth.login');
});

//pelajar
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

Route::middleware(['auth', 'user-access:siswa'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

//admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/mapel', [MapelController::class, 'mapel'])->name('admin.dataMapel');
    Route::get('/mapel/create', [MapelController::class, 'create'])->name('admin.create');
}); 

Route::get('/akun', function () {
    return view('admin.dataAkun');
});