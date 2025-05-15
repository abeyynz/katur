<?php

namespace Database\Seeders;

use App\Models\Discussion;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscussionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Ambil user acak yang sudah ada, atau pakai user dengan role 'mitra'
        $user = User::where('type', 'mitra')->first();

        // Jika belum ada, buat dummy user mitra
        if (!$user) {
            $user = User::create([
                'name' => 'Mitra Dummy',
                'email' => 'mitradummy@example.com',
                'password' => bcrypt('password'),
                'type' => 'mitra'
            ]);
            $user->assignRole('mitra');
        }

        // Buat 10 diskusi dummy
        $topics = [
            ['Pengelolaan Sampah', 'Diskusi tentang bagaimana cara efektif mengelola sampah di lingkungan sekitar.'],
            ['Pemuda dan Digitalisasi', 'Peran pemuda dalam mendorong transformasi digital di desa.'],
            ['Kesehatan Mental Remaja', 'Menyoroti pentingnya kesehatan mental bagi pelajar dan pemuda.'],
            ['Pertanian Modern', 'Diskusi seputar pertanian cerdas dan teknologi pertanian.'],
            ['Pemuda dan UMKM', 'Strategi meningkatkan usaha kecil menengah yang dimotori oleh anak muda.'],
            ['Pemanfaatan Media Sosial', 'Tips dan dampak media sosial untuk aktivisme dan komunitas.'],
            ['Pendidikan Non-Formal', 'Peran kursus dan pelatihan di luar sekolah dalam meningkatkan skill.'],
            ['Lingkungan dan Konservasi', 'Bagaimana pemuda bisa terlibat dalam pelestarian alam.'],
            ['Kreativitas & Startup', 'Diskusi ide bisnis kreatif dan teknologi oleh anak muda.'],
            ['Pemuda dan Politik', 'Peran aktif pemuda dalam demokrasi dan pembangunan.'],
        ];

        foreach ($topics as $topic) {
            Discussion::create([
                'title' => $topic[0],
                'description' => $topic[1],
                'user_id' => $user->id,
            ]);
        }
    }
}
