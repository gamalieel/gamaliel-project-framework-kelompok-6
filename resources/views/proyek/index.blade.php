@extends('layouts.poseify')

@section('title', 'Data Proyek')

@section('cta_button')
    <a class="btn btn-outline-primary border-2" href="{{ route('proyek.create') }}">
        <i class="fa fa-plus me-2"></i>Tambah Proyek
    </a>
@stop

@section('content_header')
    <h1>Data Proyek</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-3">
        <div class="card-body">
            <form class="row g-3" method="GET" action="{{ route('proyek.index') }}">
                <div class="col-md-4">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                           placeholder="Cari nama/kode proyek">
                </div>
                <div class="col-md-3">
                    <select name="tahun" class="form-control">
                        <option value="">-- Semua Tahun --</option>
                        @foreach($tahuns as $tahun)
                            <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="sumber_dana" class="form-control">
                        <option value="">-- Semua Sumber Dana --</option>
                        @foreach($sumberDanas as $sd)
                            <option value="{{ $sd }}" {{ request('sumber_dana') == $sd ? 'selected' : '' }}>{{ $sd }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 d-flex gap-2">
                    <button class="btn btn-primary w-100" type="submit">Filter</button>
                    <a href="{{ route('proyek.index') }}" class="btn btn-secondary w-100">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">List Proyek</h3>
            <a href="{{ route('proyek.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Proyek
            </a>
        </div>
        <div class="card-body">
            <div class="row">
                @forelse ($proyeks as $proyek)
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="card h-100 shadow-sm">
                            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-1">{{ $proyek->nama_proyek }}</h5>
                                    <small>Kode: {{ $proyek->kode_proyek }}</small>
                                </div>
                                <span class="badge bg-light text-primary">{{ $proyek->tahun }}</span>
                            </div>
                            <div class="card-body">
                                <p class="mb-1"><strong>Lokasi:</strong> {{ $proyek->lokasi }}</p>
                                <p class="mb-1"><strong>Anggaran:</strong> {{ number_format($proyek->anggaran, 2) }}</p>
                                <p class="mb-1"><strong>Sumber Dana:</strong> {{ $proyek->sumber_dana }}</p>
                                @if($proyek->deskripsi)
                                    <p class="mb-1 text-muted">{{ Str::limit($proyek->deskripsi, 100) }}</p>
                                @endif
                                @if($proyek->dokumen)
                                    <a href="{{ asset('uploads/proyek/'.$proyek->dokumen) }}" target="_blank" class="small text-primary">
                                        <i class="fa fa-file"></i> Lihat Dokumen
                                    </a>
                                @endif
                            </div>
                            <div class="card-footer d-flex justify-content-end gap-2">
                                <a href="{{ route('proyek.show', $proyek->proyek_id) }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('proyek.edit', $proyek->proyek_id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('proyek.destroy', $proyek->proyek_id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus proyek ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted mb-0">Belum ada data proyek</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-3">
                {{ $proyeks->withQueryString()->links() }}
            </div>
        </div>
    </div>
@stop

