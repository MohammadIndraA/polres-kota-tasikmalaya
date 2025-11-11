<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class MenuProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          DB::table('menu_profiles')->insert([
            [
                'id' => Str::uuid(),
                'name' => 'Sejarah Singkat',
                'slug' => 'sejarah-singkat',
                'status' => 'published',
                'content' => 'Layanan penerbitan Surat Keterangan Catatan Kepolisian (SKCK) bagi masyarakat yang membutuhkan untuk keperluan administrasi seperti melamar kerja, pindah domisili, atau keperluan lainnya.',
                'image' => 'skck.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Visi Misi',
                'slug' => 'visi-misi',
                'status' => 'published',
                'content' => 'Layanan penerbitan Surat Keterangan Catatan Kepolisian (SKCK) bagi masyarakat yang membutuhkan untuk keperluan administrasi seperti melamar kerja, pindah domisili, atau keperluan lainnya.',
                'image' => 'skck.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Struktur Organisasi',
                'slug' => 'struktur-organisasi',
                'status' => 'published',
                'content' => 'Layanan penerbitan Surat Keterangan Catatan Kepolisian (SKCK) bagi masyarakat yang membutuhkan untuk keperluan administrasi seperti melamar kerja, pindah domisili, atau keperluan lainnya.',
                'image' => 'skck.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Tentang Kami',
                'slug' => 'tentang-kami',
                'status' => 'published',
                'content' => 'Layanan penerbitan Surat Keterangan Catatan Kepolisian (SKCK) bagi masyarakat yang membutuhkan untuk keperluan administrasi seperti melamar kerja, pindah domisili, atau keperluan lainnya.',
                'image' => 'skck.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
