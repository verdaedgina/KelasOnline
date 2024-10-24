<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapelController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

//admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/mapel', [HomeController::class, 'adminDashboard'])->name('admin.dataMapel');
});  
Route::get('/akun', function () {
    return view('admin.dataAkun');
});