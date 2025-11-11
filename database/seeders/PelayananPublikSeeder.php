<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PelayananPublikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pelayanan_publiks')->insert([
            [
                'id' => Str::uuid(),
                'name' => 'Penerbitan SKCK',
                'slug' => 'penerbitan-skck',
                'status' => 'published',
                'content' => 'Layanan penerbitan Surat Keterangan Catatan Kepolisian (SKCK) bagi masyarakat yang membutuhkan untuk keperluan administrasi seperti melamar kerja, pindah domisili, atau keperluan lainnya.',
                'image' => 'skck.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Laporan Kehilangan',
                'slug' => 'laporan-kehilangan',
                'status' => 'published',
                'content' => 'Layanan pelaporan kehilangan barang atau dokumen penting seperti KTP, SIM, STNK, dan lainnya. Proses cepat dan mudah dengan membawa identitas diri.',
                'image' => 'kehilangan.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Pengaduan Masyarakat',
                'slug' => 'pengaduan-masyarakat',
                'status' => 'published',
                'content' => 'Fasilitas bagi masyarakat untuk menyampaikan keluhan, laporan, atau informasi terkait gangguan keamanan, tindak kriminal, atau pelayanan publik.',
                'image' => 'pengaduan.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Pelayanan SIM Keliling',
                'slug' => 'sim-keliling',
                'status' => 'published',
                'content' => 'Layanan perpanjangan SIM secara mobile di berbagai titik Kota Tasikmalaya. Jadwal dan lokasi diumumkan secara berkala.',
                'image' => 'sim-keliling.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
