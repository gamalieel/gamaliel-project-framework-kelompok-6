
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembangunan Guest</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #0f0f13;
            color: #e9edf5;
            font-family: 'Segoe UI', sans-serif;
        }
        .hero {
            background: linear-gradient(135deg, #111827 0%, #0b1220 100%);
            border-radius: 18px;
            padding: 48px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.35);
        }
        .stat-card {
            background: #161c2b;
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 14px;
            padding: 18px;
            height: 100%;
        }
        .stat-card h3 { margin: 0; color: #f472b6; }
        .stat-card p { margin: 4px 0 0; color: #cbd5e1; }
        .btn-primary {
            background: #ec4899;
            border-color: #ec4899;
        }
        .btn-primary:hover {
            background: #db2777;
            border-color: #db2777;
        }
        .feature-card {
            background: #141a2a;
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 14px;
            padding: 20px;
            height: 100%;
        }
        a { text-decoration: none; }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center gap-3">
            <i class="fa-solid fa-building text-pink" style="color:#ec4899;font-size:28px;"></i>
            <div>
                <h4 class="mb-0">Pembangunan Guest</h4>
                <small class="text-muted">Sistem Manajemen Proyek Pembangunan</small>
            </div>
        </div>
        <div class="d-flex gap-2">
            <a class="btn btn-outline-light" href="{{ route('proyek.index') }}">
                <i class="fa fa-database me-1"></i> Data Proyek
            </a>
            <a class="btn btn-primary" href="{{ route('proyek.create') }}">
                <i class="fa fa-plus me-1"></i> Tambah Proyek
            </a>
        </div>
    </div>

    <div class="hero mb-4">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1 class="fw-bold mb-3">Monitoring Proyek Pembangunan dalam Satu Layar</h1>
                <p class="mb-4 text-light">
                    Pantau progres, lokasi, kontraktor, dan tahapan proyek secara real-time.
                    Gunakan fitur filter, pencarian, serta lampiran dokumen untuk setiap proyek.
                </p>
                <div class="d-flex gap-2">
                    <a class="btn btn-primary btn-lg" href="{{ route('proyek.index') }}">
                        <i class="fa fa-chart-line me-2"></i> Lihat Dashboard Proyek
                    </a>
                    <a class="btn btn-outline-light btn-lg" href="{{ route('progres_proyek.index') }}">
                        <i class="fa fa-list-check me-2"></i> Data Progress
                    </a>
                </div>
            </div>
            <div class="col-lg-5 mt-4 mt-lg-0">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="stat-card">
                            <h3>{{ $stats['proyek'] ?? 0 }}</h3>
                            <p>Total Proyek</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-card">
                            <h3>{{ $stats['tahapan'] ?? 0 }}</h3>
                            <p>Tahapan Terdata</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="stat-card">
                            <h3>{{ $stats['progress'] ?? 0 }}</h3>
                            <p>Catatan Progress</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-4">
            <div class="feature-card">
                <div class="d-flex align-items-center mb-2">
                    <i class="fa fa-map-marker-alt me-2 text-primary"></i>
                    <h5 class="mb-0">Lokasi & GeoJSON</h5>
                </div>
                <p class="text-muted mb-2">Simpan koordinat lat/lng dan lampirkan file GeoJSON untuk peta detail.</p>
                <a class="text-primary" href="{{ route('proyek.index') }}">Kelola lokasi</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card">
                <div class="d-flex align-items-center mb-2">
                    <i class="fa fa-briefcase me-2 text-primary"></i>
                    <h5 class="mb-0">Kontraktor</h5>
                </div>
                <p class="text-muted mb-2">Catat penanggung jawab, kontak, dan alamat kontraktor tiap proyek.</p>
                <a class="text-primary" href="{{ route('proyek.index') }}">Lihat proyek</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card">
                <div class="d-flex align-items-center mb-2">
                    <i class="fa fa-tasks me-2 text-primary"></i>
                    <h5 class="mb-0">Progress & Tahapan</h5>
                </div>
                <p class="text-muted mb-2">Update persentase real, tanggal, dan catatan untuk setiap tahapan.</p>
                <a class="text-primary" href="{{ route('progres_proyek.index') }}">Kelola progress</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
