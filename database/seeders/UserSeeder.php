<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeder untuk Admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@karangtaruna.com',
            'password' => Hash::make('password123'),
            'type' => 'admin',
            'organization_id' => null,
        ]);
        $admin->assignRole('admin');

        // Seeder untuk Anggota
        $anggota = User::create([
            'name' => 'John Doe',
            'email' => 'john@karangtaruna.com',
            'password' => Hash::make('password123'),
            'type' => 'anggota',
            'organization_id' => 1,
        ]);
        $anggota->assignRole('anggota');

        // Seeder untuk Mitra
        $mitra = User::create([
            'name' => 'Mitra Karang Taruna',
            'email' => 'mitra@karangtaruna.com',
            'password' => Hash::make('password123'),
            'type' => 'mitra',
            'organization_id' => null,
        ]);
        $mitra->assignRole('mitra');
    }
}
