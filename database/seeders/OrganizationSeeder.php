<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Organization::create([
            'name' => 'Karang Taruna Circir',
            'desa/kelurahan' => 'Ciranjang',
            'kecamatan' => 'Ciranjang',
            'address' => 'Jl. Raya Desa A No. 123'
        ]);

        Organization::create([
            'name' => 'Karang Taruna Cibcir',
            'desa/kelurahan' => 'Cibiuk',
            'kecamatan' => 'Ciranjang',
            'address' => 'Jl. Raya Desa A No. 123'
        ]);

        Organization::create([
            'name' => 'Karang Taruna Guncir',
            'desa/kelurahan' => 'Gunungsari',
            'kecamatan' => 'Ciranjang',
            'address' => 'Jl. Raya Desa A No. 123'
        ]);

        Organization::create([
            'name' => 'Karang Taruna Kacir',
            'desa/kelurahan' => 'Karangwangi',
            'kecamatan' => 'Ciranjang',
            'address' => 'Jl. Raya Desa A No. 123'
        ]);

        Organization::create([
            'name' => 'Karang Taruna Kecir',
            'desa/kelurahan' => 'Kertajaya',
            'kecamatan' => 'Ciranjang',
            'address' => 'Jl. Raya Desa A No. 123'
        ]);

        Organization::create([
            'name' => 'Karang Taruna Mecir',
            'desa/kelurahan' => 'Mekargalih',
            'kecamatan' => 'Ciranjang',
            'address' => 'Jl. Raya Desa A No. 123'
        ]);

        Organization::create([
            'name' => 'Karang Taruna Nangcir',
            'desa/kelurahan' => 'Nanggalamekar',
            'kecamatan' => 'Ciranjang',
            'address' => 'Jl. Raya Desa A No. 123'
        ]);

        Organization::create([
            'name' => 'Karang Taruna Sijacir',
            'desa/kelurahan' => 'Sindangjaya',
            'kecamatan' => 'Ciranjang',
            'address' => 'Jl. Raya Desa A No. 123'
        ]);

        Organization::create([
            'name' => 'Karang Taruna Sisacir',
            'desa/kelurahan' => 'Sindangsari',
            'kecamatan' => 'Ciranjang',
            'address' => 'Jl. Raya Desa A No. 123'
        ]);
    }
}
