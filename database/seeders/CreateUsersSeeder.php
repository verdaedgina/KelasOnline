<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('12345678'),
            ],
            [
                'username' => 'user',
                'email' => 'user@gmail.com',
                'role' => 'siswa',
                'password' => bcrypt('12345678'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
