<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil ID user & category untuk relasi
        $userIds = DB::table('users')->pluck('id')->toArray();
        $categoryIds = DB::table('categories')->pluck('id')->toArray();

        // Seeder untuk Posts
        $posts = [
            [
                'title' => 'Apel Pagi Bersama Anggota Polsek',
                'slug' => 'apel-pagi-bersama-anggota-polsek',
                'content' => '<p>Hari ini, seluruh anggota Polsek mengikuti apel pagi yang dipimpin langsung oleh Kapolsek. Apel ini bertujuan untuk mengevaluasi kinerja harian dan memberikan arahan terkini.</p>',
                'excerpt' => 'Apel pagi rutin dilaksanakan setiap hari Senin.',
                'status' => 'published',
                'published_at' => now(),
            ],
            [
                'title' => 'Operasi Zebra 2025 Dimulai',
                'slug' => 'operasi-zebra-2025-dimulai',
                'content' => '<p>Polsek meluncurkan Operasi Zebra 2025 untuk meningkatkan disiplin berlalu lintas di wilayah hukum kami.</p>',
                'excerpt' => 'Operasi Zebra digelar selama 14 hari mulai 10 November 2025.',
                'status' => 'published',
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Sosialisasi Anti Narkoba di Sekolah Menengah',
                'slug' => 'sosialisasi-anti-narkoba-di-sekolah',
                'content' => '<p>Tim BNN bekerja sama dengan Polsek menggelar sosialisasi bahaya narkoba kepada siswa SMA Negeri 1.</p>',
                'excerpt' => 'Kegiatan edukasi anti narkoba sukses digelar di SMA Negeri 1.',
                'status' => 'published',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Draf Laporan Mingguan Keamanan',
                'slug' => 'draft-laporan-mingguan-keamanan',
                'content' => '<p>Laporan keamanan mingguan masih dalam tahap penyusunan.</p>',
                'excerpt' => 'Laporan dalam draft.',
                'status' => 'draft',
                'published_at' => null,
            ],
        ];

        foreach ($posts as &$post) {
            $post['id'] = Str::uuid();
            $post['user_id'] = $userIds[array_rand($userIds)];
            $post['category_id'] = $categoryIds[array_rand($categoryIds)];
            $post['views'] = rand(10, 500);
            $post['created_at'] = now();
            $post['updated_at'] = now();
        }

        DB::table('posts')->insert($posts);
    }
}
