@extends('layouts.nova')

@section('title', 'Data Proyek Guest')

@section('content')
<!-- Hero Section -->
<section style="padding: 40px 0; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1 class="display-5 fw-bold mb-3">Monitoring Proyek Pembangunan</h1>
                <p class="lead mb-4">
                    Pantau progres, lokasi, kontraktor, dan tahapan proyek secara real-time. 
                    Gunakan fitur filter, pencarian, serta lampiran dokumen untuk setiap proyek.
                </p>
                <div class="d-flex gap-2 flex-wrap">
                    <a class="btn btn-light btn-lg" href="{{ route('proyek.index') }}">
                        <i class="fas fa-chart-line me-2"></i> Lihat Data Proyek
                    </a>
                    <a class="btn btn-outline-light btn-lg" href="{{ route('progres_proyek.index') }}">
                        <i class="fas fa-list-check me-2"></i> Data Progress
                    </a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="row g-3">
                    <div class="col-6">
                        <div style="background: rgba(255,255,255,0.1); padding: 20px; border-radius: 8px; backdrop-filter: blur(10px);">
                            <h3 style="margin-bottom: 10px; font-size: 32px; font-weight: 700;">{{ \App\Models\Proyek::count() }}</h3>
                            <p style="margin: 0; font-size: 14px;">Total Proyek</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div style="background: rgba(255,255,255,0.1); padding: 20px; border-radius: 8px; backdrop-filter: blur(10px);">
                            <h3 style="margin-bottom: 10px; font-size: 32px; font-weight: 700;">{{ \App\Models\TahapanProyek::count() }}</h3>
                            <p style="margin: 0; font-size: 14px;">Tahapan Terdata</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div style="background: rgba(255,255,255,0.1); padding: 20px; border-radius: 8px; backdrop-filter: blur(10px);">
                            <h3 style="margin-bottom: 10px; font-size: 32px; font-weight: 700;">{{ \App\Models\ProgressProyek::count() }}</h3>
                            <p style="margin: 0; font-size: 14px;">Catatan Progress</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fitur Unggulan Section -->
<section style="padding: 60px 0; background: #F7FAFC;">
    <div class="container">
        <div class="text-center mb-50">
            <h2 class="mb-20">Fitur Unggulan Sistem</h2>
            <p style="color: #718096; font-size: 16px; max-width: 500px; margin: 0 auto;">
                Kelola proyek pembangunan dengan mudah menggunakan fitur-fitur canggih kami.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card h-100" style="border: none; padding: 30px;">
                    <div class="mb-20">
                        <i class="fas fa-map-marker-alt" style="font-size: 40px; color: var(--primary-color);"></i>
                    </div>
                    <h5 class="mb-15">Lokasi & Koordinat</h5>
                    <p class="mb-20" style="color: #718096;">
                        Simpan koordinat latitude/longitude dan lampirkan file GeoJSON untuk peta detail setiap proyek.
                    </p>
                    <a href="{{ route('proyek.index') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 600;">
                        Kelola Lokasi →
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card h-100" style="border: none; padding: 30px;">
                    <div class="mb-20">
                        <i class="fas fa-briefcase" style="font-size: 40px; color: var(--primary-color);"></i>
                    </div>
                    <h5 class="mb-15">Manajemen Kontraktor</h5>
                    <p class="mb-20" style="color: #718096;">
                        Catat penanggung jawab, informasi kontak, dan alamat kontraktor untuk setiap proyek.
                    </p>
                    <a href="{{ route('proyek.index') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 600;">
                        Lihat Proyek →
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card h-100" style="border: none; padding: 30px;">
                    <div class="mb-20">
                        <i class="fas fa-tasks" style="font-size: 40px; color: var(--primary-color);"></i>
                    </div>
                    <h5 class="mb-15">Tracking Progress</h5>
                    <p class="mb-20" style="color: #718096;">
                        Update persentase progress, tanggal realisasi, dan catatan untuk setiap tahapan proyek.
                    </p>
                    <a href="{{ route('progres_proyek.index') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 600;">
                        Kelola Progress →
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card h-100" style="border: none; padding: 30px;">
                    <div class="mb-20">
                        <i class="fas fa-file-alt" style="font-size: 40px; color: var(--primary-color);"></i>
                    </div>
                    <h5 class="mb-15">Dokumentasi Proyek</h5>
                    <p class="mb-20" style="color: #718096;">
                        Lampirkan dokumen penting seperti BAP, RKK, atau file lainnya untuk setiap proyek.
                    </p>
                    <a href="{{ route('proyek.index') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 600;">
                        Lihat Dokumen →
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card h-100" style="border: none; padding: 30px;">
                    <div class="mb-20">
                        <i class="fas fa-search" style="font-size: 40px; color: var(--primary-color);"></i>
                    </div>
                    <h5 class="mb-15">Filter & Pencarian</h5>
                    <p class="mb-20" style="color: #718096;">
                        Cari proyek berdasarkan nama, kode, tahun, atau sumber dana dengan filter canggih.
                    </p>
                    <a href="{{ route('proyek.index') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 600;">
                        Cari Proyek →
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card h-100" style="border: none; padding: 30px;">
                    <div class="mb-20">
                        <i class="fas fa-chart-bar" style="font-size: 40px; color: var(--primary-color);"></i>
                    </div>
                    <h5 class="mb-15">Laporan & Analitik</h5>
                    <p class="mb-20" style="color: #718096;">
                        Dapatkan laporan komprehensif dan analitik mendalam tentang progress semua proyek.
                    </p>
                    <a href="{{ route('proyek.index') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 600;">
                        Lihat Laporan →
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Manajemen Data Section -->
<section style="padding: 60px 0;">
    <div class="container">
        <div class="text-center mb-50">
            <h2 class="mb-20">Manajemen Data Proyek</h2>
            <p style="color: #718096; font-size: 16px;">
                Kelola semua aspek proyek pembangunan Anda di satu tempat
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="card text-center h-100" style="border: none; padding: 25px;">
                    <div style="font-size: 48px; margin-bottom: 20px;">
                        <i class="fas fa-folder-open" style="color: var(--primary-color);"></i>
                    </div>
                    <h5 class="mb-15">Proyek</h5>
                    <p style="color: #718096; margin-bottom: 20px;">Kelola data proyek, lokasi, dan dokumen pendukung.</p>
                    <a href="{{ route('proyek.index') }}" class="button button-primary" style="display: inline-block;">
                        Kelola Proyek
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center h-100" style="border: none; padding: 25px;">
                    <div style="font-size: 48px; margin-bottom: 20px;">
                        <i class="fas fa-sitemap" style="color: var(--primary-color);"></i>
                    </div>
                    <h5 class="mb-15">Tahapan Proyek</h5>
                    <p style="color: #718096; margin-bottom: 20px;">Atur tahapan, target persentase, dan jadwal tiap proyek.</p>
                    <a href="{{ route('tahapan_proyek.index') }}" class="button button-primary" style="display: inline-block;">
                        Kelola Tahapan
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center h-100" style="border: none; padding: 25px;">
                    <div style="font-size: 48px; margin-bottom: 20px;">
                        <i class="fas fa-tasks" style="color: var(--primary-color);"></i>
                    </div>
                    <h5 class="mb-15">Progress Proyek</h5>
                    <p style="color: #718096; margin-bottom: 20px;">Update realisasi dan catatan untuk setiap tahapan proyek.</p>
                    <a href="{{ route('progres_proyek.index') }}" class="button button-primary" style="display: inline-block;">
                        Kelola Progress
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center h-100" style="border: none; padding: 25px;">
                    <div style="font-size: 48px; margin-bottom: 20px;">
                        <i class="fas fa-sign-in-alt" style="color: var(--primary-color);"></i>
                    </div>
                    <h5 class="mb-15">Login Admin</h5>
                    <p style="color: #718096; margin-bottom: 20px;">Akses panel admin untuk manajemen data yang lebih lengkap.</p>
                    <a href="{{ route('login') }}" class="button button-primary" style="display: inline-block;">
                        Login Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer CTA Section -->
<section style="padding: 60px 0; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-align: center;">
    <div class="container">
        <h2 class="mb-20">Siap untuk Memulai?</h2>
        <p class="lead mb-40">
            Kelola proyek pembangunan Anda dengan lebih efisien dan transparan sekarang juga.
        </p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="{{ route('proyek.index') }}" class="btn btn-light btn-lg">
                <i class="fas fa-arrow-right me-2"></i> Mulai Sekarang
            </a>
            <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">
                <i class="fas fa-sign-in-alt me-2"></i> Login Admin
            </a>
        </div>
    </div>
</section>
@endsection
