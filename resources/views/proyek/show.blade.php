@extends('layouts.poseify')

@section('title', 'Detail Proyek')

@section('cta_button')
    <a class="btn btn-outline-primary border-2" href="{{ route('proyek.create') }}">
        <i class="fa fa-plus me-2"></i>Tambah Proyek
    </a>
@stop

@section('content_header')
    <h1>Detail Proyek</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-1">{{ $proyek->nama_proyek }}</h4>
                <small>Kode: {{ $proyek->kode_proyek }}</small>
            </div>
            <span class="badge bg-light text-primary">{{ $proyek->tahun }}</span>
        </div>
        <div class="card-body">
            <p class="mb-2"><strong>Lokasi:</strong> {{ $proyek->lokasi }}</p>
            <p class="mb-2"><strong>Anggaran:</strong> {{ number_format($proyek->anggaran, 2) }}</p>
            <p class="mb-2"><strong>Sumber Dana:</strong> {{ $proyek->sumber_dana }}</p>
            @if($proyek->deskripsi)
                <p class="mb-3"><strong>Deskripsi:</strong><br>{{ $proyek->deskripsi }}</p>
            @endif
            @if($proyek->dokumen)
                <p class="mb-0">
                    <strong>Dokumen:</strong>
                    <a href="{{ asset('uploads/proyek/'.$proyek->dokumen) }}" target="_blank" class="ms-1">
                        <i class="fa fa-file"></i> Lihat Dokumen
                    </a>
                </p>
            @endif
        </div>
        <div class="card-footer d-flex justify-content-end gap-2">
            <a href="{{ route('proyek.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('proyek.edit', $proyek->proyek_id) }}" class="btn btn-warning">
                <i class="fa fa-edit"></i> Edit
            </a>
        </div>
    </div>
@stop

