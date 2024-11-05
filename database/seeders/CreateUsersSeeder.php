<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
<<<<<<< Updated upstream
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
               'username'=>'admin',
               'email'=>'admin@gmail.com',
               'role'=>'admin',
               'password'=> bcrypt('12345678'),
            ],
            [
                'username'=>'user',
                'email'=>'user@gmail.com',
                'role'=>'siswa',
                'password'=> bcrypt('12345678'),
             ],
        ];
=======
    public function run(): void
    {
        $users = [
            // [
            //    'name'=>'User',
            //    'email'=>'user@techsolutionstuff.com',
            //    'type'=>0,
            //    'password'=> bcrypt('123456'),
            // ],
            [
               'username'=>'Super Admin',
               'email'=>'super-admin@techsolutionstuff.com',
               'role'=>'admin',
               'password'=> bcrypt('123456'),
            ],
            [
                'username'=>'users',
                'email'=>'users@techsolutionstuff.com',
                'role'=>'siswa',
                'password'=> bcrypt('123456'),
             ],
            // [
            //    'name'=>'Manager',
            //    'email'=>'manager@techsolutionstuff.com',
            //    'type'=> 2,
            //    'password'=> bcrypt('123456'),
            // ],
        ];
    
>>>>>>> Stashed changes
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
