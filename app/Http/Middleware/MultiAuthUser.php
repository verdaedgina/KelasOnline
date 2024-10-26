<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MultiAuthUser
{
    public function handle(Request $request, Closure $next, $role): Response
{
    // Cek apakah pengguna sudah terautentikasi
    if (auth()->check()) {
        logger('Current User Role: ' . auth()->user()->role); // Log untuk melihat role
        // Cek apakah role pengguna cocok
        if (auth()->user()->role === $role) {
            return $next($request);
        }
    }

    // Jika tidak, kembalikan respons dengan pesan
    return response()->json(['message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.'], 403);
}

}
