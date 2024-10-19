<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapelController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/about', function () {
    return view('pelajar.about');
});

Route::get('/produk', function () {
    return view('pelajar.produk');
});

Route::get('/profil', function () {
    return view('pelajar.profil');
});
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/mapel', [App\Http\Controllers\MapelController::class, 'index'])->name('mapel');
    
});
