<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Ambil semua data pengguna dengan role 'user'
        $users = User::where('role', '!=', 'admin')->get();
        return view('admin.users.index', compact('users'));
    }
}

