<?php

namespace Database\Seeders;

use App\Models\employee;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);
        
        User::create([
            'username' => 'ahmad',
            'password' => bcrypt('ahmad'),
            'role' => 'employee',
        ]);

        employee::create([
            'id' => 'KYT003',
            'user_id' => 2,
            'nama_karyawan' => "Ahmad Syarif",
            'departement' => "Logistik"
        ]);
    }
}
