<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MultiAuthUser
{
    public function handle(Request $request, Closure $next, $userType): Response
    {
        if (auth()->check() && auth()->user()->role == $userType) {
            return $next($request);
        }

        // Pengguna tidak memiliki akses, arahkan ke halaman tertentu atau tampilkan pesan error
        return redirect('/unauthorized')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
