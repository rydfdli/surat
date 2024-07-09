<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Superadmin',
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('superadmin'),
            'role' => 'superadmin'
        ]);

        Setting::create([
            'nama_instansi' => 'Dinas Kominfo',
            'alamat' => 'Jl. Jend. Sudirman No. 1',
            'logo' => null,
            'nomor_telepon' => '08123456789',
            'email' => 'HJXkF@example.com',
            'website' => 'https://example.com',
        ]);
        
    }
}
