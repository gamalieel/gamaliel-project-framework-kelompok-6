@extends('layouts.nova')

@section('title', 'Data Progress Proyek')

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
                    <i class="fas fa-chart-line me-1"></i>Progress Proyek
                </li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1 text-dark fw-bold">Data Progress Proyek</h2>
                <p class="text-muted mb-0">Lihat progres realisasi setiap tahapan proyek</p>
            </div>
            <div class="d-flex gap-2 align-items-center">
                <span class="badge bg-blue fs-6 px-3 py-2">
                    <i class="fas fa-chart-bar me-1"></i>
                    {{ $progress->total() }} Total Progress
                </span>
            </div>
        </div>

        <!-- Alert -->
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            </div>
        @endif

        <!-- Data Grid -->
        <div class="row g-4">
            @forelse ($progress as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm">
                        <!-- Card Header -->
                        <div class="card-header" style="background: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%); color: white; padding: 20px; border: none;">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1 text-white fw-bold">{{ Str::limit($item->proyek->nama_proyek ?? 'Tidak ada data', 25) }}</h5>
                                    <small class="text-white-50">{{ $item->tahapan->nama_tahap ?? 'Tidak ada tahapan' }}</small>
                                </div>
                                <span class="badge bg-white text-blue ms-2">{{ $item->persen_real }}%</span>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body d-flex flex-column">
                            <div class="row g-3 mb-3">
                                <div class="col-12">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-project-diagram text-blue me-2"></i>
                                        <small class="text-muted fw-semibold">PROYEK</small>
                                    </div>
                                    <p class="mb-0 text-dark">{{ $item->proyek->nama_proyek ?? 'Tidak ada data' }}</p>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-12">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-tasks text-blue me-2"></i>
                                        <small class="text-muted fw-semibold">TAHAPAN</small>
                                    </div>
                                    <span class="badge bg-secondary">{{ $item->tahapan->nama_tahap ?? 'Tidak ada data' }}</span>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-12">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-percentage text-success me-2"></i>
                                        <small class="text-muted fw-semibold">REALISASI</small>
                                    </div>
                                    <div class="progress" style="height: 25px;">
                                        <div class="progress-bar bg-blue" role="progressbar" 
                                             style="width: {{ $item->persen_real }}%;" 
                                             aria-valuenow="{{ $item->persen_real }}" 
                                             aria-valuemin="0" aria-valuemax="100">
                                            <strong>{{ $item->persen_real }}%</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($item->tanggal)
                                <div class="row g-3 mb-3">
                                    <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-calendar text-blue me-2"></i>
                                            <small class="text-muted fw-semibold">TANGGAL UPDATE</small>
                                        </div>
                                        <p class="mb-0 text-dark">
                                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if($item->catatan)
                                <div class="row g-3 mb-3">
                                    <div class="col-12">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-sticky-note text-warning me-2"></i>
                                            <small class="text-muted fw-semibold">CATATAN</small>
                                        </div>
                                        <p class="mb-0 text-muted small">{{ Str::limit($item->catatan, 100) }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Card Footer -->
                        <div class="card-footer bg-light border-top-0 mt-auto">
                            <div class="d-flex gap-2">
                                <a href="{{ route('progres_proyek.show', $item->progres_id) }}" 
                                   class="btn btn-blue btn-sm flex-fill" title="Lihat Detail">
                                    <i class="fas fa-eye me-1"></i> Detail
                                </a>
                                @if($item->proyek)
                                    <a href="{{ route('proyek.show', $item->proyek->proyek_id) }}" 
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
                            <i class="fas fa-chart-line fa-3x text-muted"></i>
                        </div>
                        <h5 class="text-muted">Tidak ada data progress proyek</h5>
                        <p class="text-muted">Belum ada data progress untuk ditampilkan.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($progress->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $progress->links() }}
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

.progress-bar.bg-blue {
    background-color: #3b82f6 !important;
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
}
</style>
@endsection
