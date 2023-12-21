<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Proyek;
use App\Models\Rencana;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Gurez ID',
            'username' => 'Restu',
            'email' => 'Restu@gmail.com',
            'profil' => null,
            'password' => bcrypt('123'),
            'role' => 1
        ]);
        User::create([
            'name' => 'Analia rose',
            'username' => 'Rose',
            'email' => 'Naniyakuza@gmail.com',
            'profil' => null,
            'password' => bcrypt('123'),
            'role' => 2
        ]);
        User::create([
            'name' => 'zulfames',
            'username' => 'zulfame',
            'email' => 'zulfadlirizal@gmail.com',
            'profil' => null,
            'password' => bcrypt('123'),
            'role' => 3
        ]);
        User::create([
            'name' => 'Fajar Gumilar',
            'username' => 'Fajar',
            'email' => 'fajar45@gmail.com',
            'profil' => null,
            'password' => bcrypt('123'),
            'role' => 0
        ]);
        Proyek::create([
            'name_proyek' => 'proyek 1',
            'klien' => 'Fajar Gumilar',
            'pengawas' => 'Analia rose',
            'manager' => 'zulfames',
            'time_str' => '2023-10-01 00:00:00',
            'time_end' => '2023-10-01 00:00:00',
            'is_str' => 0
        ]);
        Rencana::create([
            'proyek_id' => 1,
            'pekerjaan' => 'pekerjaan 1',
            'alat' => 'Cangkul',
            'time_str' => '2023-10-01 00:00:00',
            'time_end' => '2023-10-05 00:00:00',
            'status' => 0
        ]);
    }
}

