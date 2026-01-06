@extends('layouts.nova')

@section('title', 'Data Kontraktor')

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
                    <i class="fas fa-users me-1"></i>Kontraktor
                </li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1 text-dark fw-bold">Data Kontraktor</h2>
                <p class="text-muted mb-0">Kelola informasi kontraktor dan penanggung jawab proyek</p>
            </div>
            <div class="d-flex gap-2 align-items-center">
                <span class="badge bg-blue fs-6 px-3 py-2">
                    <i class="fas fa-building me-1"></i>
                    {{ $kontraktors->total() }} Total Kontraktor
                </span>
            </div>
        </div>

        <!-- Filter Card -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-light border-bottom">
                <h5 class="mb-0 text-dark fw-semibold">
                    <i class="fas fa-filter text-blue me-2"></i>Filter Data
                </h5>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('kontraktor.index') }}" class="row g-3">
                    <div class="col-md-4">
                        <label for="search" class="form-label fw-semibold text-dark">
                            <i class="fas fa-search text-muted me-1"></i>Pencarian
                        </label>
                        <input type="text" class="form-control" id="search" name="search" 
                               value="{{ request('search') }}" 
                               placeholder="Cari nama kontraktor, penanggung jawab, atau kontak...">
                    </div>
                    <div class="col-md-3">
                        <label for="kontraktor" class="form-label fw-semibold text-dark">
                            <i class="fas fa-building text-muted me-1"></i>Kontraktor
                        </label>
                        <select class="form-control" id="kontraktor" name="kontraktor">
                            <option value="">Semua Kontraktor</option>
                            @foreach($uniqueKontraktors as $nama)
                                <option value="{{ $nama }}" {{ request('kontraktor') == $nama ? 'selected' : '' }}>
                                    {{ $nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="tahun" class="form-label fw-semibold text-dark">
                            <i class="fas fa-calendar text-muted me-1"></i>Tahun
                        </label>
                        <select class="form-control" id="tahun" name="tahun">
                            <option value="">Semua Tahun</option>
                            @foreach($years as $year)
                                <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <div class="d-flex gap-2 w-100">
                            <button type="submit" class="btn btn-blue flex-fill">
                                <i class="fas fa-search me-1"></i> Cari
                            </button>
                            <a href="{{ route('kontraktor.index') }}" class="btn btn-outline-secondary flex-fill">
                                <i class="fas fa-refresh me-1"></i> Reset
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Data Grid -->
        <div class="row g-4">
            @forelse ($kontraktors as $kontraktor)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm">
                        <!-- Card Header -->
                        <div class="card-header" style="background: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%); color: white; padding: 20px; border: none;">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1 text-white fw-bold">{{ $kontraktor->nama ?: 'Tidak ada data' }}</h5>
                                    <small class="text-white-50">Kontraktor</small>
                                </div>
                                @if($kontraktor->proyek && $kontraktor->proyek->tahun)
                                    <span class="badge bg-white text-blue ms-2">{{ $kontraktor->proyek->tahun }}</span>
                                @endif
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body d-flex flex-column">
                            <div class="row g-3 mb-3">
                                <div class="col-12">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-user text-blue me-2"></i>
                                        <small class="text-muted fw-semibold">PENANGGUNG JAWAB</small>
                                    </div>
                                    <p class="mb-0 text-dark">{{ $kontraktor->penanggung_jawab ?: 'Tidak ada data' }}</p>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-12">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-phone text-success me-2"></i>
                                        <small class="text-muted fw-semibold">KONTAK</small>
                                    </div>
                                    @if($kontraktor->kontak)
                                        <a href="tel:{{ $kontraktor->kontak }}" class="text-blue text-decoration-none">
                                            {{ $kontraktor->kontak }}
                                        </a>
                                    @else
                                        <span class="text-muted">Tidak ada data</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-12">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-project-diagram text-blue me-2"></i>
                                        <small class="text-muted fw-semibold">PROYEK</small>
                                    </div>
                                    <p class="mb-0 text-dark fw-bold">{{ $kontraktor->proyek->nama_proyek ?? 'Tidak ada data' }}</p>
                                    @if($kontraktor->proyek && $kontraktor->proyek->kode_proyek)
                                        <small class="text-muted">{{ $kontraktor->proyek->kode_proyek }}</small>
                                    @endif
                                </div>
                            </div>

                            @if($kontraktor->alamat)
                                <div class="row g-3 mb-3">
                                    <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-map-marker-alt text-warning me-2"></i>
                                            <small class="text-muted fw-semibold">ALAMAT</small>
                                        </div>
                                        <p class="mb-0 text-muted small">{{ Str::limit($kontraktor->alamat, 80) }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($kontraktor->proyek && $kontraktor->proyek->anggaran)
                                <div class="row g-3 mb-3">
                                    <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-money-bill-wave text-success me-2"></i>
                                            <small class="text-muted fw-semibold">NILAI KONTRAK</small>
                                        </div>
                                        <p class="mb-0 text-success fw-bold">
                                            Rp {{ number_format($kontraktor->proyek->anggaran, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Card Footer -->
                        <div class="card-footer bg-light border-top-0 mt-auto">
                            <div class="d-flex gap-2">
                                <a href="{{ route('kontraktor.show', $kontraktor->kontraktor_id) }}" 
                                   class="btn btn-blue btn-sm flex-fill" title="Lihat Detail">
                                    <i class="fas fa-eye me-1"></i> Detail
                                </a>
                                @if($kontraktor->proyek)
                                    <a href="{{ route('proyek.show', $kontraktor->proyek->proyek_id) }}" 
                                       class="btn btn-outline-success btn-sm" title="Lihat Proyek">
                                        <i class="fas fa-folder-open"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <div class="mb-3">
                            <i class="fas fa-users fa-3x text-muted"></i>
                        </div>
                        <h5 class="text-muted">Tidak ada data kontraktor</h5>
                        <p class="text-muted">Data kontraktor tidak ditemukan atau belum ada yang sesuai dengan filter.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($kontraktors->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $kontraktors->links() }}
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

.fw-semibold {
    font-weight: 600;
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
</style>
@endsection