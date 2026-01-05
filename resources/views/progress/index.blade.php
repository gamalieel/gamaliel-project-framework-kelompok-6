@extends('layouts.poseify')

@section('title', 'Data Progress Proyek')

@section('content')
<div class="container-fluid py-5 bg-dark">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="text-primary mb-1">
                    <i class="fa fa-chart-line me-2"></i>Data Progress Proyek
                </h2>
                <p class="text-muted mb-0">Kelola progress dan perkembangan proyek</p>
            </div>
            <a href="{{ route('progress.create') }}" class="btn btn-primary">
                <i class="fa fa-plus me-1"></i>Tambah Progress
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4">
            @forelse($progress as $item)
                <div class="col-lg-6">
                    <div class="card bg-secondary border-0 h-100 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h5 class="text-primary mb-1">{{ $item->proyek->nama_proyek ?? 'Proyek' }}</h5>
                                    <small class="text-muted">{{ $item->tahapan->nama_tahap ?? 'Tahapan' }}</small>
                                </div>
                                <span class="badge bg-success fs-6">{{ $item->persen_real }}%</span>
                            </div>

                            <div class="progress mb-3" style="height: 10px;">
                                <div class="progress-bar bg-primary" role="progressbar" 
                                     style="width: {{ $item->persen_real }}%"></div>
                            </div>

                            <div class="row g-2 mb-3">
                                <div class="col-6">
                                    <small class="text-muted d-block">Tanggal</small>
                                    <span class="text-body">{{ $item->tanggal }}</span>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted d-block">Progress ID</small>
                                    <span class="text-body">{{ $item->progres_id }}</span>
                                </div>
                            </div>

                            @if($item->catatan)
                                <div class="mb-3">
                                    <small class="text-muted d-block">Catatan</small>
                                    <p class="text-body mb-0">{{ $item->catatan }}</p>
                                </div>
                            @endif

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('progress.edit', $item->progres_id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('progress.destroy', $item->progres_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" 
                                            onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="fa fa-chart-line fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Belum ada data progress</h5>
                    <p class="text-muted">Mulai tambahkan progress proyek</p>
                    <a href="{{ route('progress.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus me-1"></i>Tambah Progress Pertama
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection