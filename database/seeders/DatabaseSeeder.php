<?php
namespace Database\Seeders;

use App\Models\LokasiProyek;
use App\Models\ProgressProyek;
use App\Models\Proyek;
use App\Models\TahapanProyek;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test user
        User::factory()->create([
            'name'     => 'Test User',
            'email'    => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Create sample Proyek (Projects)
        $proyek1 = Proyek::create([
            'kode_proyek' => 'PRJ-2025-001',
            'nama_proyek' => 'Pembangunan Jalan Raya Utama',
            'tahun'       => 2025,
            'lokasi'      => 'Jakarta Timur',
            'anggaran'    => 5000000000,
            'sumber_dana' => 'APBN',
            'deskripsi'   => 'Proyek pembangunan jalan raya utama dengan lebar 15 meter untuk menghubungkan pusat bisnis ke pelabuhan.',
        ]);

        $proyek2 = Proyek::create([
            'kode_proyek' => 'PRJ-2025-002',
            'nama_proyek' => 'Renovasi Gedung Perkantoran Pemerintah',
            'tahun'       => 2025,
            'lokasi'      => 'Bandung',
            'anggaran'    => 3500000000,
            'sumber_dana' => 'APBD',
            'deskripsi'   => 'Renovasi komprehensif gedung perkantoran dengan 10 lantai untuk meningkatkan efisiensi kerja.',
        ]);

        $proyek3 = Proyek::create([
            'kode_proyek' => 'PRJ-2025-003',
            'nama_proyek' => 'Pembangunan Sekolah Modern',
            'tahun'       => 2025,
            'lokasi'      => 'Surabaya',
            'anggaran'    => 2000000000,
            'sumber_dana' => 'Dana Swasta',
            'deskripsi'   => 'Pembangunan sekolah modern dengan fasilitas lengkap untuk mendukung pendidikan berkualitas.',
        ]);

        // Create sample Tahapan Proyek (Project Stages) for Proyek 1
        $tahap1_1 = TahapanProyek::create([
            'proyek_id'     => $proyek1->proyek_id,
            'nama_tahap'    => 'Tahap Persiapan',
            'target_persen' => 10,
            'tgl_mulai'     => Carbon::now()->startOfMonth(),
            'tgl_selesai'   => Carbon::now()->addDays(15),
        ]);

        $tahap1_2 = TahapanProyek::create([
            'proyek_id'     => $proyek1->proyek_id,
            'nama_tahap'    => 'Tahap Pembangunan Infrastruktur',
            'target_persen' => 50,
            'tgl_mulai'     => Carbon::now()->addDays(16),
            'tgl_selesai'   => Carbon::now()->addDays(90),
        ]);

        $tahap1_3 = TahapanProyek::create([
            'proyek_id'     => $proyek1->proyek_id,
            'nama_tahap'    => 'Tahap Finishing',
            'target_persen' => 30,
            'tgl_mulai'     => Carbon::now()->addDays(91),
            'tgl_selesai'   => Carbon::now()->addDays(120),
        ]);

        $tahap1_4 = TahapanProyek::create([
            'proyek_id'     => $proyek1->proyek_id,
            'nama_tahap'    => 'Tahap Penyelesaian dan Serah Terima',
            'target_persen' => 10,
            'tgl_mulai'     => Carbon::now()->addDays(121),
            'tgl_selesai'   => Carbon::now()->addDays(130),
        ]);

        // Create sample Tahapan Proyek for Proyek 2
        $tahap2_1 = TahapanProyek::create([
            'proyek_id'     => $proyek2->proyek_id,
            'nama_tahap'    => 'Survey dan Desain',
            'target_persen' => 15,
            'tgl_mulai'     => Carbon::now()->startOfMonth(),
            'tgl_selesai'   => Carbon::now()->addDays(20),
        ]);

        $tahap2_2 = TahapanProyek::create([
            'proyek_id'     => $proyek2->proyek_id,
            'nama_tahap'    => 'Renovasi Struktur',
            'target_persen' => 50,
            'tgl_mulai'     => Carbon::now()->addDays(21),
            'tgl_selesai'   => Carbon::now()->addDays(100),
        ]);

        $tahap2_3 = TahapanProyek::create([
            'proyek_id'     => $proyek2->proyek_id,
            'nama_tahap'    => 'Pemasangan Sistem dan Furniture',
            'target_persen' => 25,
            'tgl_mulai'     => Carbon::now()->addDays(101),
            'tgl_selesai'   => Carbon::now()->addDays(140),
        ]);

        // Create sample Tahapan Proyek for Proyek 3
        $tahap3_1 = TahapanProyek::create([
            'proyek_id'     => $proyek3->proyek_id,
            'nama_tahap'    => 'Tahap Persiapan Lahan',
            'target_persen' => 10,
            'tgl_mulai'     => Carbon::now()->startOfMonth(),
            'tgl_selesai'   => Carbon::now()->addDays(10),
        ]);

        $tahap3_2 = TahapanProyek::create([
            'proyek_id'     => $proyek3->proyek_id,
            'nama_tahap'    => 'Tahap Konstruksi Bangunan',
            'target_persen' => 70,
            'tgl_mulai'     => Carbon::now()->addDays(11),
            'tgl_selesai'   => Carbon::now()->addDays(150),
        ]);

        $tahap3_3 = TahapanProyek::create([
            'proyek_id'     => $proyek3->proyek_id,
            'nama_tahap'    => 'Tahap Pengadaan Peralatan',
            'target_persen' => 15,
            'tgl_mulai'     => Carbon::now()->addDays(151),
            'tgl_selesai'   => Carbon::now()->addDays(180),
        ]);

        $tahap3_4 = TahapanProyek::create([
            'proyek_id'     => $proyek3->proyek_id,
            'nama_tahap'    => 'Tahap Uji Coba dan Serah Terima',
            'target_persen' => 5,
            'tgl_mulai'     => Carbon::now()->addDays(181),
            'tgl_selesai'   => Carbon::now()->addDays(190),
        ]);

        // Create sample Progress Proyek (Progress Reports)
        // Progress for Tahap1_1
        ProgressProyek::create([
            'proyek_id'   => $proyek1->proyek_id,
            'tahap_id'    => $tahap1_1->tahap_id,
            'persen_real' => 100,
            'tanggal'     => Carbon::now()->addDays(5),
            'catatan'     => 'Tahap persiapan sudah selesai dengan baik. Semua dokumen dan perizinan sudah lengkap.',
        ]);

        // Progress for Tahap1_2
        ProgressProyek::create([
            'proyek_id'   => $proyek1->proyek_id,
            'tahap_id'    => $tahap1_2->tahap_id,
            'persen_real' => 45,
            'tanggal'     => Carbon::now()->addDays(50),
            'catatan'     => 'Pembangunan infrastruktur jalan sudah mencapai 45%. Terdapat kendala cuaca pada minggu kemarin.',
        ]);

        ProgressProyek::create([
            'proyek_id'   => $proyek1->proyek_id,
            'tahap_id'    => $tahap1_2->tahap_id,
            'persen_real' => 60,
            'tanggal'     => Carbon::now()->addDays(70),
            'catatan'     => 'Progress naik ke 60%. Segmen utama sudah selesai dipours.',
        ]);

        // Progress for Tahap2_1
        ProgressProyek::create([
            'proyek_id'   => $proyek2->proyek_id,
            'tahap_id'    => $tahap2_1->tahap_id,
            'persen_real' => 100,
            'tanggal'     => Carbon::now()->addDays(10),
            'catatan'     => 'Survey selesai dan desain renovasi sudah disetujui oleh pimpinan.',
        ]);

        // Progress for Tahap2_2
        ProgressProyek::create([
            'proyek_id'   => $proyek2->proyek_id,
            'tahap_id'    => $tahap2_2->tahap_id,
            'persen_real' => 30,
            'tanggal'     => Carbon::now()->addDays(60),
            'catatan'     => 'Renovasi struktur 3 lantai sudah selesai. Lanjut ke lantai 4.',
        ]);

        // Progress for Tahap3_2
        ProgressProyek::create([
            'proyek_id'   => $proyek3->proyek_id,
            'tahap_id'    => $tahap3_2->tahap_id,
            'persen_real' => 25,
            'tanggal'     => Carbon::now()->addDays(40),
            'catatan'     => 'Fondasi dan dinding struktur utama sudah 25% selesai.',
        ]);

        // Create sample Lokasi Proyek (Project Locations)
        LokasiProyek::create([
            'proyek_id' => $proyek1->proyek_id,
            'lat'       => -6.200000,
            'lng'       => 106.816666,
            'geojson'   => json_encode([
                'type'        => 'Point',
                'coordinates' => [106.816666, -6.200000],
            ]),
        ]);

        LokasiProyek::create([
            'proyek_id' => $proyek2->proyek_id,
            'lat'       => -6.917464,
            'lng'       => 107.619123,
            'geojson'   => json_encode([
                'type'        => 'Point',
                'coordinates' => [107.619123, -6.917464],
            ]),
        ]);

        LokasiProyek::create([
            'proyek_id' => $proyek3->proyek_id,
            'lat'       => -7.250445,
            'lng'       => 112.768845,
            'geojson'   => json_encode([
                'type'        => 'Point',
                'coordinates' => [112.768845, -7.250445],
            ]),
        ]);
    }
}
