<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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


    }
}
