@extends('layouts.poseify')

@section('title', 'Data Lokasi Proyek')

@section('content')
<div class="container-fluid py-5 bg-secondary">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="text-success mb-1">
                    <i class="fa fa-map-marker-alt me-2"></i>Data Lokasi Proyek
                </h2>
                <p class="text-muted mb-0">Kelola lokasi dan koordinat proyek</p>
            </div>
            <a href="{{ route('lokasi.create') }}" class="btn btn-success">
                <i class="fa fa-plus me-1"></i>Tambah Lokasi
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4">
            @forelse($lokasi as $item)
                <div class="col-lg-6">
                    <div class="card bg-dark border-0 h-100 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h5 class="text-success mb-1">{{ $item->proyek->nama_proyek ?? 'Proyek' }}</h5>
                                    <small class="text-muted">ID Lokasi: {{ $item->lokasi_id }}</small>
                                </div>
                                @if($item->geojson)
                                    <span class="badge bg-success">GeoJSON</span>
                                @endif
                            </div>

                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="bg-secondary rounded p-2">
                                        <small class="text-muted d-block">Latitude</small>
                                        <span class="text-body fw-semibold">{{ $item->lat }}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="bg-secondary rounded p-2">
                                        <small class="text-muted d-block">Longitude</small>
                                        <span class="text-body fw-semibold">{{ $item->lng }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2 mt-3">
                                <a href="{{ route('lokasi.edit', $item->lokasi_id) }}" class="btn btn-sm btn-outline-success">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('lokasi.destroy', $item->lokasi_id) }}" method="POST" class="d-inline">
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
                    <i class="fa fa-map-marker-alt fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Belum ada data lokasi</h5>
                    <p class="text-muted">Mulai tambahkan lokasi proyek</p>
                    <a href="{{ route('lokasi.create') }}" class="btn btn-success">
                        <i class="fa fa-plus me-1"></i>Tambah Lokasi Pertama
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection