@extends('layouts.poseify')

@section('title', 'Data Kontraktor')

@section('content')
<div class="container-fluid py-5 bg-dark">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="text-warning mb-1">
                    <i class="fa fa-hard-hat me-2"></i>Data Kontraktor
                </h2>
                <p class="text-muted mb-0">Kelola data kontraktor proyek</p>
            </div>
            <a href="{{ route('kontraktor.create') }}" class="btn btn-warning text-dark">
                <i class="fa fa-plus me-1"></i>Tambah Kontraktor
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4">
            @forelse($kontraktor as $item)
                <div class="col-lg-6">
                    <div class="card bg-secondary border-0 h-100 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h5 class="text-warning mb-1">{{ $item->nama }}</h5>
                                    <small class="text-muted">{{ $item->proyek->nama_proyek ?? 'Proyek' }}</small>
                                </div>
                                <small class="text-muted">ID: {{ $item->kontraktor_id }}</small>
                            </div>

                            @if($item->penanggung_jawab)
                                <div class="mb-2">
                                    <small class="text-muted d-block">Penanggung Jawab</small>
                                    <span class="text-body">{{ $item->penanggung_jawab }}</span>
                                </div>
                            @endif

                            @if($item->kontak)
                                <div class="mb-2">
                                    <small class="text-muted d-block">Kontak</small>
                                    <span class="text-body">{{ $item->kontak }}</span>
                                </div>
                            @endif

                            @if($item->alamat)
                                <div class="mb-3">
                                    <small class="text-muted d-block">Alamat</small>
                                    <p class="text-body mb-0">{{ $item->alamat }}</p>
                                </div>
                            @endif

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('kontraktor.edit', $item->kontraktor_id) }}" class="btn btn-sm btn-outline-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('kontraktor.destroy', $item->kontraktor_id) }}" method="POST" class="d-inline">
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
                    <i class="fa fa-hard-hat fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Belum ada data kontraktor</h5>
                    <p class="text-muted">Mulai tambahkan kontraktor proyek</p>
                    <a href="{{ route('kontraktor.create') }}" class="btn btn-warning text-dark">
                        <i class="fa fa-plus me-1"></i>Tambah Kontraktor Pertama
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection