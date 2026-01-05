@extends('layouts.nova')

@section('title', 'Home - Sistem Monitoring Proyek Pembangunan')

@section('content')
<!-- Hero Section -->
<section class="hero-section hero-style-5" style="padding: 60px 0;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content-wrapper">
                    <h2 class="mb-30 wow fadeInUp" data-wow-delay=".2s">Monitoring Proyek Pembangunan</h2>
                    <p class="mb-30 wow fadeInUp" data-wow-delay=".4s">Kelola dan pantau semua proyek pembangunan Anda dalam satu platform terpadu. Tracking progress, lokasi, kontraktor, dan tahapan proyek secara real-time.</p>
                    <div class="d-flex gap-3 flex-wrap wow fadeInUp" data-wow-delay=".6s">
                        <a href="{{ route('proyek.index') }}" class="button button-primary">
                            <i class="fas fa-chart-line me-2"></i> Lihat Data Proyek
                        </a>
                        <a href="{{ route('progres_proyek.index') }}" class="button button-secondary">
                            <i class="fas fa-tasks me-2"></i> Data Progress
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="stat-card wow fadeInUp" data-wow-delay=".2s">
                            <h3 class="mb-2" style="color: var(--primary-color); font-size: 32px; font-weight: 700;">{{ $stats['proyek'] ?? 0 }}</h3>
                            <p style="color: #718096; margin: 0;">Total Proyek</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-card wow fadeInUp" data-wow-delay=".3s">
                            <h3 class="mb-2" style="color: var(--primary-color); font-size: 32px; font-weight: 700;">{{ $stats['tahapan'] ?? 0 }}</h3>
                            <p style="color: #718096; margin: 0;">Tahapan Terdata</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="stat-card wow fadeInUp" data-wow-delay=".4s">
                            <h3 class="mb-2" style="color: var(--primary-color); font-size: 32px; font-weight: 700;">{{ $stats['progress'] ?? 0 }}</h3>
                            <p style="color: #718096; margin: 0;">Catatan Progress</p>
                            <small style="color: #A0AEC0;">Update persentase real, tanggal, dan catatan untuk setiap tahapan.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="feature-section feature-style-5" style="padding: 60px 0; background-color: #F7FAFC;">
    <div class="container">
        <div class="row justify-content-center mb-50">
            <div class="col-xxl-5 col-xl-5 col-lg-7 col-md-8">
                <div class="section-title text-center">
                    <h3 class="mb-15 wow fadeInUp" data-wow-delay=".2s">Fitur Unggulan</h3>
                    <p class="wow fadeInUp" data-wow-delay=".4s">Kelola proyek pembangunan dengan mudah menggunakan fitur-fitur canggih kami.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="card h-100" style="border: none; padding: 30px;">
                    <div class="mb-20">
                        <i class="fas fa-map-marker-alt" style="font-size: 40px; color: var(--primary-color);"></i>
                    </div>
                    <h5 class="mb-15">Lokasi & Koordinat</h5>
                    <p class="mb-20" style="color: #718096;">Simpan koordinat latitude/longitude dan lampirkan file GeoJSON untuk peta detail setiap proyek.</p>
                    <a href="{{ route('proyek.index') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 600;">Kelola Lokasi →</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                <div class="card h-100" style="border: none; padding: 30px;">
                    <div class="mb-20">
                        <i class="fas fa-briefcase" style="font-size: 40px; color: var(--primary-color);"></i>
                    </div>
                    <h5 class="mb-15">Manajemen Kontraktor</h5>
                    <p class="mb-20" style="color: #718096;">Catat penanggung jawab, informasi kontak, dan alamat kontraktor untuk setiap proyek pembangunan.</p>
                    <a href="{{ route('proyek.index') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 600;">Lihat Proyek →</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                <div class="card h-100" style="border: none; padding: 30px;">
                    <div class="mb-20">
                        <i class="fas fa-tasks" style="font-size: 40px; color: var(--primary-color);"></i>
                    </div>
                    <h5 class="mb-15">Tracking Progress</h5>
                    <p class="mb-20" style="color: #718096;">Update persentase progress, tanggal realisasi, dan catatan untuk setiap tahapan proyek secara real-time.</p>
                    <a href="{{ route('progres_proyek.index') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 600;">Kelola Progress →</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="card h-100" style="border: none; padding: 30px;">
                    <div class="mb-20">
                        <i class="fas fa-file-alt" style="font-size: 40px; color: var(--primary-color);"></i>
                    </div>
                    <h5 class="mb-15">Dokumentasi Proyek</h5>
                    <p class="mb-20" style="color: #718096;">Lampirkan dokumen penting seperti BAP, RKK, atau file lainnya untuk setiap proyek dengan mudah.</p>
                    <a href="{{ route('proyek.index') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 600;">Lihat Dokumen →</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                <div class="card h-100" style="border: none; padding: 30px;">
                    <div class="mb-20">
                        <i class="fas fa-search" style="font-size: 40px; color: var(--primary-color);"></i>
                    </div>
                    <h5 class="mb-15">Filter & Pencarian</h5>
                    <p class="mb-20" style="color: #718096;">Cari proyek berdasarkan nama, kode, tahun, atau sumber dana dengan filter canggih kami.</p>
                    <a href="{{ route('proyek.index') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 600;">Cari Proyek →</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                <div class="card h-100" style="border: none; padding: 30px;">
                    <div class="mb-20">
                        <i class="fas fa-chart-bar" style="font-size: 40px; color: var(--primary-color);"></i>
                    </div>
                    <h5 class="mb-15">Laporan & Analitik</h5>
                    <p class="mb-20" style="color: #718096;">Dapatkan laporan komprehensif dan analitik mendalam tentang progress semua proyek Anda.</p>
                    <a href="{{ route('proyek.index') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 600;">Lihat Laporan →</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section style="padding: 60px 0;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="mb-20">Siap untuk memulai?</h3>
                <p style="font-size: 16px; color: #718096; margin-bottom: 0;">Kelola proyek pembangunan Anda dengan lebih efisien dan transparan. Mulai tracking progress hari ini juga!</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('proyek.index') }}" class="button button-primary">
                    <i class="fas fa-arrow-right me-2"></i> Mulai Sekarang
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
