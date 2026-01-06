@extends('layouts.nova')

@section('title', 'Data Proyek')

@section('content')
<section style="padding: 40px 0; background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); min-height: 100vh;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb bg-light px-3 py-2 rounded">
                <li class="breadcrumb-item">
                    <a href="/" class="text-decoration-none">
                        <i class="fas fa-home me-1"></i>Home
                    </a>
                </li>
                <li class="breadcrumb-item active text-blue fw-semibold">
                    <i class="fas fa-folder me-1"></i>Proyek
                </li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1 text-dark fw-bold">Data Proyek</h2>
                <p class="text-muted mb-0">Lihat semua proyek pembangunan</p>
            </div>
            <div class="d-flex gap-2 align-items-center">
                <span class="badge bg-blue fs-6 px-3 py-2">
                    <i class="fas fa-folder me-1"></i>
                    {{ $proyeks->total() }} Total Proyek
                </span>
            </div>
        </div>

        <!-- Alert -->
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            </div>
        @endif

        <!-- Filter Card -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-light border-bottom">
                <h5 class="mb-0 text-dark fw-semibold">
                    <i class="fas fa-filter text-blue me-2"></i>Filter Data
                </h5>
            </div>
            <div class="card-body">
                <form class="row g-3" method="GET" action="{{ route('proyek.index') }}">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-dark">
                            <i class="fas fa-search text-muted me-1"></i>Cari Proyek
                        </label>
                        <input type="text" name="search" value="{{ request('search') }}" 
                               class="form-control" placeholder="Cari nama atau kode proyek">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold text-dark">
                            <i class="fas fa-calendar text-muted me-1"></i>Tahun
                        </label>
                        <select name="tahun" class="form-control">
                            <option value="">-- Semua Tahun --</option>
                            @foreach($tahuns as $tahun)
                                <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold text-dark">
                            <i class="fas fa-university text-muted me-1"></i>Sumber Dana
                        </label>
                        <select name="sumber_dana" class="form-control">
                            <option value="">-- Semua Sumber Dana --</option>
                            @foreach($sumberDanas as $sd)
                                <option value="{{ $sd }}" {{ request('sumber_dana') == $sd ? 'selected' : '' }}>{{ $sd }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 d-flex gap-2 align-items-end">
                        <button class="btn btn-blue flex-fill" type="submit">
                            <i class="fas fa-search me-1"></i> Filter
                        </button>
                        <a href="{{ route('proyek.index') }}" class="btn btn-outline-secondary flex-fill">
                            <i class="fas fa-redo me-1"></i> Reset
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Data Grid -->
        <div class="row g-4">
            @forelse ($proyeks as $proyek)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm">
                        <!-- Card Header -->
                        <div class="card-header" style="background: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%); color: white; padding: 20px; border: none;">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1 text-white fw-bold">{{ $proyek->nama_proyek }}</h5>
                                    <small class="text-white-50">{{ $proyek->kode_proyek }}</small>
                                </div>
                                <span class="badge bg-white text-blue ms-2">{{ $proyek->tahun }}</span>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body d-flex flex-column">
                            <div class="row g-3 mb-3">
                                <div class="col-12">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-map-marker-alt text-blue me-2"></i>
                                        <small class="text-muted fw-semibold">LOKASI</small>
                                    </div>
                                    <p class="mb-0 text-dark">{{ $proyek->lokasi ?: 'Tidak ada data' }}</p>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-12">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-money-bill-wave text-success me-2"></i>
                                        <small class="text-muted fw-semibold">ANGGARAN</small>
                                    </div>
                                    <p class="mb-0 text-success fw-bold">
                                        @if($proyek->anggaran)
                                            Rp {{ number_format($proyek->anggaran, 0, ',', '.') }}
                                        @else
                                            Tidak ada data
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-12">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-university text-blue me-2"></i>
                                        <small class="text-muted fw-semibold">SUMBER DANA</small>
                                    </div>
                                    <span class="badge bg-blue text-white">{{ $proyek->sumber_dana ?: 'Tidak ada data' }}</span>
                                </div>
                            </div>

                            @if($proyek->deskripsi)
                                <div class="row g-3 mb-3">
                                    <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-info-circle text-secondary me-2"></i>
                                            <small class="text-muted fw-semibold">DESKRIPSI</small>
                                        </div>
                                        <p class="mb-0 text-muted small">{{ Str::limit($proyek->deskripsi, 100) }}</p>
                                    </div>
                                </div>
                            @endif

                            <!-- Progress Info -->
                            @if($proyek->tanggal_mulai || $proyek->tanggal_selesai)
                                <div class="row g-3 mb-3">
                                    <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-calendar text-blue me-2"></i>
                                            <small class="text-muted fw-semibold">PERIODE</small>
                                        </div>
                                        <div class="d-flex justify-content-between text-sm">
                                            <span class="text-muted">
                                                @if($proyek->tanggal_mulai)
                                                    {{ \Carbon\Carbon::parse($proyek->tanggal_mulai)->format('d/m/Y') }}
                                                @else
                                                    -
                                                @endif
                                            </span>
                                            <span class="text-muted">s/d</span>
                                            <span class="text-muted">
                                                @if($proyek->tanggal_selesai)
                                                    {{ \Carbon\Carbon::parse($proyek->tanggal_selesai)->format('d/m/Y') }}
                                                @else
                                                    -
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Document Download -->
                            @if($proyek->dokumen)
                                <div class="mt-auto mb-3">
                                    <a href="{{ asset('uploads/proyek/'.$proyek->dokumen) }}" target="_blank" 
                                       class="btn btn-outline-blue btn-sm w-100">
                                        <i class="fas fa-file-download me-1"></i> Download Dokumen
                                    </a>
                                </div>
                            @endif
                        </div>

                        <!-- Card Footer -->
                        <div class="card-footer bg-light border-top-0 mt-auto">
                            <div class="d-flex gap-2">
                                <a href="{{ route('proyek.show', $proyek->proyek_id) }}" 
                                   class="btn btn-blue btn-sm flex-fill" title="Lihat Detail">
                                    <i class="fas fa-eye me-1"></i> Detail
                                </a>
                                @if($proyek->lokasi_proyek && $proyek->lokasi_proyek->count() > 0)
                                    <button class="btn btn-outline-success btn-sm" title="Lihat Lokasi">
                                        <i class="fas fa-map-marked-alt"></i>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <div class="mb-3">
                            <i class="fas fa-folder-open fa-3x text-muted"></i>
                        </div>
                        <h5 class="text-muted">Tidak ada proyek ditemukan</h5>
                        <p class="text-muted">Data proyek tidak ditemukan atau belum ada yang sesuai dengan filter.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($proyeks->hasPages())
            <div class="d-flex justify-content-center mt-40">
                {{ $proyeks->render() }}
            </div>
        @endif
    </div>
</section>

<style>
.card {
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    border: 1px solid #e2e8f0;
    border-radius: 0.5rem;
    background: white;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.15);
}

.card-header {
    border-bottom: none !important;
    border-radius: 0.5rem 0.5rem 0 0 !important;
}

.badge {
    font-size: 0.75rem;
    padding: 0.375rem 0.75rem;
}

.btn-sm {
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
}

.text-sm {
    font-size: 0.875rem;
}

.mb-15 {
    margin-bottom: 15px;
}

.mb-10 {
    margin-bottom: 10px;
}

.mb-30 {
    margin-bottom: 30px;
}

.mt-40 {
    margin-top: 40px;
}

.fw-semibold {
    font-weight: 600;
}

.card-body .row:last-child {
    margin-bottom: 0;
}

.card-footer {
    padding: 1rem;
    background-color: #f8fafc;
    border-top: 1px solid #e2e8f0;
    border-radius: 0 0 0.5rem 0.5rem;
}

.breadcrumb {
    margin-bottom: 0;
    background-color: #f1f5f9;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: "›";
    color: #6c757d;
}

.form-control:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
}

/* Blue Color Scheme */
.btn-blue {
    background-color: #3b82f6;
    border-color: #3b82f6;
    color: white;
}

.btn-blue:hover {
    background-color: #2563eb;
    border-color: #2563eb;
    color: white;
}

.btn-outline-blue {
    color: #3b82f6;
    border-color: #3b82f6;
    background-color: transparent;
}

.btn-outline-blue:hover {
    background-color: #3b82f6;
    border-color: #3b82f6;
    color: white;
}

.text-blue {
    color: #3b82f6 !important;
}

.bg-blue {
    background-color: #3b82f6 !important;
}

.badge.bg-blue {
    background-color: #3b82f6 !important;
    color: white;
}

.badge.bg-white.text-blue {
    background-color: white !important;
    color: #3b82f6 !important;
    border: 1px solid rgba(255,255,255,0.3);
}

/* Override primary colors with blue */
.btn-primary {
    background-color: #3b82f6;
    border-color: #3b82f6;
}

.btn-primary:hover {
    background-color: #2563eb;
    border-color: #2563eb;
}

.btn-outline-primary {
    color: #3b82f6;
    border-color: #3b82f6;
}

.btn-outline-primary:hover {
    background-color: #3b82f6;
    border-color: #3b82f6;
}

.text-primary {
    color: #3b82f6 !important;
}

.bg-primary {
    background-color: #3b82f6 !important;
}

.badge.bg-primary {
    background-color: #3b82f6 !important;
}

/* Card specific styles */
.card-body {
    background-color: white;
}

.card-header h5 {
    text-shadow: 0 1px 2px rgba(0,0,0,0.1);
}

/* Section background */
section {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    min-height: 100vh;
}

@media (max-width: 768px) {
    .col-lg-4 {
        margin-bottom: 1.5rem;
    }
    
    .card-header {
        padding: 15px;
    }
    
    .card-body {
        padding: 15px;
    }
    
    .d-flex.gap-2 {
        flex-direction: column;
        gap: 0.5rem !important;
    }
    
    .flex-fill {
        width: 100%;
    }
}

@media (max-width: 576px) {
    .col-md-4, .col-md-3, .col-md-2 {
        margin-bottom: 1rem;
    }
    
    .btn {
        font-size: 0.875rem;
        padding: 0.5rem 1rem;
    }
}
</style>
@endsection
