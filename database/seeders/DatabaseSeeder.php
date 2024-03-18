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

        \App\Models\Kelompok::create([
            'nama' => 'KTU'
        ]);

        \App\Models\Kelompok::create([
            'nama' => 'Balai'
        ]);

        \App\Models\Kelompok::create([
            'nama' => 'APBN'
        ]);

        \App\Models\Pegawai::create([
            'NIP' => '00001',
            'nama' => 'andre',
            'jabatan' => 'kasubag',
            'masa_kerja' => '5',
            'email' => 'andre@gmail.com',
            'password' => 'password',
            'nama_kelompok' => 'Balai'
        ]);

        \App\Models\Pegawai::create([
            'NIP' => '00002',
            'nama' => 'Juned',
            'jabatan' => 'Wakil Kasubag',
            'masa_kerja' => '6',
            'email' => 'juned@gmail.com',
            'password' => 'password',
            'nama_kelompok' => 'KTU'
        ]);

        \App\Models\Pegawai::create([
            'NIP' => '00003',
            'nama' => 'Ihsan',
            'jabatan' => 'Wakil APBN',
            'masa_kerja' => '6',
            'email' => 'ihsan@gmail.com',
            'password' => 'password',
            'nama_kelompok' => 'APBN'
        ]);

        \App\Models\Atasan::create([
            'NIP' => '00004',
            'nama' => 'Bambang',
            'jabatan' => 'Ketua APBN',
            'masa_kerja' => '6',
            'email' => 'bambang@gmail.com',
            'password' => 'password',
            'nama_kelompok' => 'APBN'
        ]);

        \App\Models\Atasan::create([
            'NIP' => '00005',
            'nama' => 'Otong',
            'jabatan' => 'Ketua Balai',
            'masa_kerja' => '6',
            'email' => 'otonghunt@gmail.com',
            'password' => 'password',
            'nama_kelompok' => 'Balai'
        ]);

        \App\Models\JatahCuti::create([
            'NIP' => '00002',
            'tahun' => '2024',
            'jatah' => 12
        ]);

        \App\Models\JatahCuti::create([
            'NIP' => '00001',
            'tahun' => '2023',
            'jatah' => 12
        ]);

        \App\Models\JatahCuti::create([
            'NIP' => '00001',
            'tahun' => '2024',
            'jatah' => 12
        ]);

        \App\Models\JatahCuti::create([
            'NIP' => '00003',
            'tahun' => '2024',
            'jatah' => 12
        ]);
    }
}
