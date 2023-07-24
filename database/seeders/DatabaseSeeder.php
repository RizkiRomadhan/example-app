<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        DB::table('users')->insert([
            'name' => "admin",
            'email' => "admin@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => "mahasiswa",
            'email' => "mahasiswa@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'role' => 'mahasiswa',
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
                'name' => "pembimbing",
                'email' => "pembimbing@gmail.com",
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'pembimbing',
                'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
                'name' => "koordinator",
                'email' => "koordinator@gmail.com",
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'koordinator',
                'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
                'name' => "penguji",
                'email' => "penguji@gmail.com",
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'penguji',
                'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
                'name' => "laboran",
                'email' => "laboran@gmail.com",
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'laboran',
                'remember_token' => Str::random(10),
        ]);
        
        DB::table('tbl_jurusan')->insert([
                'id_jurusan' => "ti01",
                'nama_jurusan' => "Teknik Informatika",
        ]);
        
        DB::table('tbl_jurusan')->insert([
                'id_jurusan' => "tm02",
                'nama_jurusan' => "Teknik Mesin",
        ]);

        DB::table('tbl_prodi')->insert([
                'id_prodi' => "ti001",
                'id_jurusan' => "ti01",
                'nama_prodi' => "Rekayasa Perangkat Lunak"
        ]);

        DB::table('tbl_prodi')->insert([
                'id_prodi' => "tm002",
                'id_jurusan' => "tm02",
                'nama_prodi' => "Teknik Mesin Perawatan",
        ]);

        DB::table('tbl_dosen')->insert([
                'nidn' => "08124813",
                'nama_dosen' => "Lidya Wati, M.Kom",
                'id_jurusan' => "ti01",
                'email' => "lidyawati@gmail.com",
                'nomor_ponsel' => "080808080808",
                'status' => "Dosen Tetap",
        ]);
        
        DB::table('tbl_dosen')->insert([
                'nidn' => "08124814",
                'nama_dosen' => "Danuri, M.Kom",
                'id_jurusan' => "ti01",
                'email' => "danuri@gmail.com",
                'nomor_ponsel' => "080808080808",
                'status' => "Dosen Tetap",
        ]);
    }
}
