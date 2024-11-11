<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->get(); // Hanya pengguna dengan role 'user'
        return view('admin.users.index', compact('users'));
    }
}

