<?php

namespace Database\Seeders;

use App\Models\Information;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil user dengan role 'mitra'
        $mitra = User::whereHas('roles', function ($q) {
            $q->where('name', 'mitra');
        })->first();

        // info data
        $data = [
            [
                'title' => 'Lomba Desain Poster',
                'description' => 'Lomba desain poster untuk Hari Kartini dengan hadiah 2 juta rupiah.',
                'category' => 'perlombaan',
                'deadline' => '2025-04-20',
                'image' => 'info/poster.jpeg',
            ],
            [
                'title' => 'Turnamen Mobile Legends',
                'description' => 'Daftarkan tim kamu dan menangkan hadiah jutaan rupiah!',
                'category' => 'perlombaan',
                'deadline' => '2025-04-15',
                'image' => 'info/ml.jpeg',
            ],
            [
                'title' => 'Pelatihan Digital Marketing',
                'description' => 'Pelatihan gratis untuk pemuda yang ingin belajar pemasaran digital.',
                'category' => 'pelatihan',
                'deadline' => '2025-04-25',
                'image' => 'info/marketing.png',
            ],
            [
                'title' => 'Workshop Public Speaking',
                'description' => 'Belajar berbicara di depan umum bersama mentor profesional.',
                'category' => 'pelatihan',
                'deadline' => '2025-04-28',
                'image' => 'info/speaking.jpeg',
            ],
            [
                'title' => 'Admin Sosial Media',
                'description' => 'Dicari admin sosial media yang kreatif dan komunikatif.',
                'category' => 'lowongan',
                'deadline' => null,
                'image' => 'info/admin.jpeg',
            ],
            [
                'title' => 'Staf Gudang',
                'description' => 'Dibutuhkan staf gudang untuk penempatan Cianjur dengan gaji kompetitif.',
                'category' => 'lowongan',
                'deadline' => null,
                'image' => 'info/gudang.jpeg',
            ],
        ];

        foreach ($data as $item) {
            Information::create([
                'title' => $item['title'],
                'description' => $item['description'],
                'category' => $item['category'],
                'deadline' => $item['deadline'],
                'image' => $item['image'],
                'user_id' => $mitra->id,
            ]);
        }
    }
}
