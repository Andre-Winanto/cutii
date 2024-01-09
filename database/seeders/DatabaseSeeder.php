<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'gua tampan',
            'email' => 'admin@gmail.com',
            'password' => 'password'
        ]);

        \App\Models\Pegawai::create([
            'NIP' => '00001',
            'nama' => 'andre',
            'jabatan' => 'kasubag',
            'masa_kerja' => '5',
            'email' => 'andre@gmail.com',
            'password' => 'password'
        ]);

        \App\Models\Pegawai::create([
            'NIP' => '00002',
            'nama' => 'Juned',
            'jabatan' => 'Wakil Kasubag',
            'masa_kerja' => '6',
            'email' => 'juned@gmail.com',
            'password' => 'password'
        ]);
    }
}
