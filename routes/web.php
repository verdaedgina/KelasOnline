<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

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
    Route::get('/profil', [ProfilController::class, 'showProfile'])->name('pelajar.profil');
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
    Route::get('/admin/create', Create::class);
}); 

//Route::get('/akun', function () {
//    return view('admin.dataAkun');
//});

//Route::get('/data-akun', [SiswaController::class, 'index'])->name('dataAkun');

Route::middleware(['auth', 'admin'])->group(function () {
  Route::get('/akun', [UserController::class, 'index'])->name('akun.index');
});

//Route::get('/admin/users', [UserController::class, 'index'])->middleware('admin');
