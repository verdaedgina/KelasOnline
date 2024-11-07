<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Profil;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        // Buat profil baru setiap kali ada user baru
        Profil::create([
            'user_id' => $user->id,
            'username' => $user->username, // Atur username sesuai nama pengguna atau kolom yang sesuai
            'score' => 0, // Skor awal
            'level' => 'pemula' // Level awal
        ]);
    }
}
