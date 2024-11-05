<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        // Validate the request
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (auth()->attempt($request->only('email', 'password'))) {
            // Check user role and redirect accordingly
            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.dataMapel');
            } else if (auth()->user()->role == 'siswa') {
                return redirect()->route('home');
            } else {
                return redirect()->route('dashboard'); // Handle other roles if necessary
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address and Password are incorrect.');
        }
    }
}
