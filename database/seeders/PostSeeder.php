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

      $titles = [
            'Upacara Hari Pahlawan di Polres',
            'Pelayanan SKCK Kini Lebih Cepat',
            'Polres Gelar Operasi Pekat',
            'Tips Aman Berkendara di Musim Hujan',
            'Polres Tasikmalaya Rangkul Komunitas Motor',
            'Sosialisasi Bahaya Narkoba di Sekolah',
            'Pelayanan SIM Keliling Kembali Dibuka',
            'Polres Luncurkan Aplikasi Layanan Publik',
            'Kegiatan Jumat Curhat Bersama Warga',
            'Polres Buka Posko Pengaduan Masyarakat',
            'Polisi Cilik Ikuti Pelatihan Lalu Lintas',
            'Polres Tasikmalaya Gelar Donor Darah',
            'Peringatan HUT Bhayangkara ke-78',
            'Polres Edukasi Etika Berlalu Lintas',
            'Polres dan TNI Gelar Patroli Gabungan',
            'Polres Adakan Lomba Poster Anti Narkoba',
            'Kampanye Keselamatan Jalan Raya',
            'Polres Bantu Evakuasi Banjir di Cigalontang',
            'Polres Hadir di Tengah Masyarakat',
            'Polres Tasikmalaya Dukung UMKM Lokal',
        ];

        foreach ($titles as $title) {
            $slug = Str::slug($title);
            DB::table('posts')->insert([
                'id' => Str::uuid(),
                'title' => $title,
                'slug' => $slug,
                'content' => 'Ini adalah konten lengkap dari artikel berjudul "' . $title . '". Artikel ini membahas informasi penting terkait kegiatan, pelayanan, atau edukasi yang dilakukan oleh Polres Kota Tasikmalaya.',
                'excerpt' => 'Ringkasan dari artikel "' . $title . '" yang memberikan gambaran umum isi konten.',
                'user_id' => $userIds[array_rand($userIds)], // bisa diisi UUID user jika tersedia
                'category_id' => $categoryIds[array_rand($categoryIds)], // bisa diisi UUID kategori jika tersedia
                'image' => $slug . '.jpg',
                'status' => 'published',
                'views' => rand(10, 500),
                'published_at' => now()->subDays(rand(1, 30)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
