<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Seeder untuk Categories
        $categories = [
            ['name' => 'Berita Kegiatan', 'slug' => 'berita-kegiatan'],
            ['name' => 'Kampanye Keamanan', 'slug' => 'kampanye-keamanan'],
            ['name' => 'Laporan Harian', 'slug' => 'laporan-harian'],
            ['name' => 'Pengumuman Resmi', 'slug' => 'pengumuman-resmi'],
            ['name' => 'Edukasi Masyarakat', 'slug' => 'edukasi-masyarakat'],
        ];

        foreach ($categories as &$category) {
            $category['id'] = Str::uuid();
            $category['description'] = 'Kategori untuk ' . $category['name'];
            $category['created_at'] = now();
            $category['updated_at'] = now();
        }

        DB::table('categories')->insert($categories);
    }
}
