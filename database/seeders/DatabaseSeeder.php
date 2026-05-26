<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun Admin Utama
        \App\Models\User::create([
            'name' => 'Admin Amikom',
            'email' => 'admin@amikom.ac.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // 2. Insert Kategori Event
        $category = \App\Models\Category::create([
            'name' => 'Seminar IT',
            'slug' => 'seminar-it',
        ]);

        $category2 = \App\Models\Category::firstOrCreate([
            'name' => 'Entertaiment',
            'slug' => 'entertaiment',
        ]);

         // Tambahan Kategori Baru
        $category3 = \App\Models\Category::firstOrCreate([
            'name' => 'Pemrograman',
            'slug' => 'pemrograman',
        ]);

        $category4 = \App\Models\Category::firstOrCreate([
            'name' => 'Data Science',
            'slug' => 'data-science',
        ]);

        $category5 = \App\Models\Category::firstOrCreate([
            'name' => 'UI/UX',
            'slug' => 'ui-ux',
        ]);

        // 3. Insert Sampel Events
        \App\Models\Event::create([
            'category_id' => $category2->id,
            'title' => 'Jazz Night 2025',
            'description' => 'Nikmati malam yang indah dengan alunan musik jazz

            yang merdu.',

            'date' => '2026-05-10 19:00:00',
            'location' => 'Amikom Baru',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-1.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $category->id,
            'title' => 'Hackaton - Unleash Your Inner Developer',
            'description' => 'Ayo asah skill coding kamu dan ciptakan solusi

            inovatif untuk tantangan masa depan!',
            'date' => '2026-05-05 10:00:00',
            'location' => 'Inkubator Amikom',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-2.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $category->id,
            'title' => 'AI & FUTURE TECH SUMMIT 2026',
            'description' => 'Jelajahi tren terkini dalam kecerdasan buatan dan

            teknologi masa depan bersama para ahli di bidangnya.',

            'date' => '2026-05-01 13:00:00',
            'location' => 'Cinema Unit 6',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-3.png',
        ]);

        // Tambahan 6 Event Baru
        \App\Models\Event::create([
            'category_id' => $category3->id,
            'title' => 'Web Development Bootcamp',
            'description' => 'Pelajari dasar hingga mahir dalam pengembangan website menggunakan Laravel dan React.',
            'date' => '2026-05-15 09:00:00',
            'location' => 'Lab Komputer 7.4.3',
            'price' => 75000,
            'stock' => 80,
            'poster_path' => 'posters/event-4.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $category3->id,
            'title' => 'Competitive Programming Challenge',
            'description' => 'Uji kemampuan algoritma dan logika pemrogramanmu dalam kompetisi seru antar mahasiswa.',
            'date' => '2026-05-18 08:00:00',
            'location' => 'Ruang 7.1.1',
            'price' => 30000,
            'stock' => 120,
            'poster_path' => 'posters/event-5.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $category4->id,
            'title' => 'Data Science Workshop',
            'description' => 'Belajar analisis data, visualisasi, dan machine learning menggunakan Python.',
            'date' => '2026-05-20 10:00:00',
            'location' => 'Lab Komputer 7.3.1',
            'price' => 100000,
            'stock' => 60,
            'poster_path' => 'posters/event-6.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $category4->id,
            'title' => 'Big Data Analytics Seminar',
            'description' => 'Kupas tuntas bagaimana perusahaan besar memanfaatkan big data untuk pengambilan keputusan.',
            'date' => '2026-05-22 13:30:00',
            'location' => 'Ruang 5.3.3',
            'price' => 60000,
            'stock' => 150,
            'poster_path' => 'posters/event-7.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $category5->id,
            'title' => 'UI/UX Design Masterclass',
            'description' => 'Pelajari prinsip desain antarmuka modern dan pengalaman pengguna yang efektif.',
            'date' => '2026-05-25 09:30:00',
            'location' => 'Lab Komputer 2.3.4',
            'price' => 85000,
            'stock' => 70,
            'poster_path' => 'posters/event-8.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $category5->id,
            'title' => 'Figma for Beginners',
            'description' => 'Workshop praktik langsung membuat prototype aplikasi menggunakan Figma dari nol.',
            'date' => '2026-05-28 14:00:00',
            'location' => 'Lab Komputer 7.5.1',
            'price' => 40000,
            'stock' => 90,
            'poster_path' => 'posters/event-9.png',
        ]);
    }
}
