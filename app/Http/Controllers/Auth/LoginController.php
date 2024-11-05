<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
<<<<<<< Updated upstream
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
=======
use Illuminate\Http\Request;

>>>>>>> Stashed changes

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
    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (auth()->attempt([
        'email' => $request->input('email'),
        'password' => $request->input('password')
    ])) {
        if (auth()->user()->role == 'siswa') {
            return redirect()->route('home');
        } else {
            return redirect()->route('admin.dataMapel');
        }
    } else {
        return redirect()->route('login')
            ->with('error', 'Email-Address and Password are incorrect.');
    }
     public function login(Request $request)
    {   
        $input = $request->all();
     
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
     
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.dataMapel');
            }else if (auth()->user()->type == 'siswa') {
                return redirect()->route('siswa.home');
            }else{
                return redirect()->route('dashboard');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
          
    }
}


}
