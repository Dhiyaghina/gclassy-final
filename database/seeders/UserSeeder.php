<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Admin GClassy',
            'email' => 'admin@gclassy.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);

        // Guru
        User::create([
            'name' => 'Sri Puji',
            'email' => 'gurusripuji@gclassy.com',
            'password' => Hash::make('guru'),
            'role' => 'guru',
        ]);

        // Siswa
        User::create([
            'name' => 'Ghina',
            'email' => 'ghina@gclassy.com',
            'password' => Hash::make('123'),
            'role' => 'siswa',
        ]);
    }
}