<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User Admin
         $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');

        // User Petugas
        $petugas = User::create([
            'name' => 'Petugas User',
            'email' => 'petugas@example.com',
            'password' => bcrypt('password'),
        ]);
        $petugas->assignRole('petugas');
    }
}
