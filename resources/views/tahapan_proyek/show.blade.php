@extends('layouts.nova')

@section('title', 'Detail Tahapan - ' . ($tahapan->nama_tahap ?? ''))

@section('content')
<section style="padding: 40px 0;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-30">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('tahapan_proyek.index') }}">Tahapan Proyek</a></li>
                <li class="breadcrumb-item active">{{ $tahapan->nama_tahap }}</li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-30">
            <div>
                <h2 class="mb-10">{{ $tahapan->nama_tahap }}</h2>
                <p style="color: #718096;">{{ $tahapan->proyek->nama_proyek }}</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('tahapan_proyek.index') }}" class="button" style="background: #E2E8F0; color: #2D3748;">
                    <i class="fas fa-arrow-left me-2"></i> Kembali
                </a>
            </div>
        </div>

        <!-- Info Card -->
        <div class="card">
            <div class="card-header" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%); color: white; border: none; padding: 20px;">
                <h5 style="margin: 0; color: white;">Informasi Tahapan</h5>
            </div>
            <div class="card-body" style="padding: 30px;">
                <div class="row g-4">
                    <div class="col-md-6">
                        <small style="color: #718096; font-weight: 600;">NAMA TAHAPAN</small>
                        <p style="margin: 8px 0 0; color: #2D3748; font-size: 16px; font-weight: 600;">{{ $tahapan->nama_tahap }}</p>
                    </div>
                    <div class="col-md-6">
                        <small style="color: #718096; font-weight: 600;">PROYEK</small>
                        <p style="margin: 8px 0 0; color: #2D3748; font-size: 16px;">
                            <a href="{{ route('proyek.show', $tahapan->proyek->proyek_id) }}" style="color: var(--primary-color); text-decoration: none;">
                                {{ $tahapan->proyek->nama_proyek }}
                            </a>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <small style="color: #718096; font-weight: 600;">TARGET PERSENTASE</small>
                        <p style="margin: 8px 0 0; color: #2D3748; font-size: 18px; font-weight: 700; color: var(--primary-color);">
                            {{ $tahapan->target_persen }}%
                        </p>
                    </div>
                    <div class="col-md-6">
                        <small style="color: #718096; font-weight: 600;">TANGGAL MULAI</small>
                        <p style="margin: 8px 0 0; color: #2D3748;">
                            {{ $tahapan->tgl_mulai ? \Carbon\Carbon::parse($tahapan->tgl_mulai)->format('d M Y') : '-' }}
                        </p>
                    </div>
                    @if($tahapan->deskripsi)
                        <div class="col-12">
                            <small style="color: #718096; font-weight: 600;">DESKRIPSI</small>
                            <p style="margin: 8px 0 0; color: #2D3748; line-height: 1.6;">{{ $tahapan->deskripsi }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
