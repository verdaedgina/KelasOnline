<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profil;

class ProfilController extends Controller
{
    public function readMaterial(Request $request)
    {
        // Get the profil instance of the currently logged-in user
        $profil = profil::where('user_id', auth()->user()->id)->first();
    
        if ($profil) {
            // Increment score by 1 for reading a material
            $profil->updateScoreAndLevel(1);
            return redirect()->back()->with('success', 'Score updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Profile not found.');
        }
    }
    
}
