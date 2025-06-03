<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;
use App\Models\User;

class KelasSeeder extends Seeder
{
    public function run()
    {
        $guru = User::where('email', 'gurusripuji@gclassy.com')->first();

        Kelas::create([
            'nama' => 'Kimia X IPA 1',
            'tingkatan' => 'X IPA 1',
            'guru_id' => $guru->id,
            'is_premium' => false,
            'gambar' =>'kimia.png'
        ]);

        Kelas::create([
            'nama' => 'Kelas Tambahan',
            'tingkatan' => 'Matematika',
            'guru_id' => $guru->id,
            'is_premium' => true, // kelas premium (bimbel)
            'gambar' =>'bimbel_matematika.png'
        ]);
    }
}