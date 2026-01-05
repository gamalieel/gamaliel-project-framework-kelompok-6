@extends('layouts.nova')

@section('title', 'Detail Progress Proyek')

@section('content')
<section style="padding: 40px 0;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-30">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('progres_proyek.index') }}">Progress Proyek</a></li>
                <li class="breadcrumb-item active">Detail Progress</li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-30">
            <div>
                <h2 class="mb-10">Detail Progress Proyek</h2>
                <p style="color: #718096;">{{ $progres_proyek->tahapan->proyek->nama_proyek }} - {{ $progres_proyek->tahapan->nama_tahap }}</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('progres_proyek.index') }}" class="button" style="background: #E2E8F0; color: #2D3748;">
                    <i class="fas fa-arrow-left me-2"></i> Kembali
                </a>
            </div>
        </div>

        <!-- Info Card -->
        <div class="card">
            <div class="card-header" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%); color: white; border: none; padding: 20px;">
                <h5 style="margin: 0; color: white;">Informasi Progress</h5>
            </div>
            <div class="card-body" style="padding: 30px;">
                <div class="row g-4">
                    <div class="col-md-6">
                        <small style="color: #718096; font-weight: 600;">PROYEK</small>
                        <p style="margin: 8px 0 0; color: #2D3748; font-size: 16px; font-weight: 600;">
                            <a href="{{ route('proyek.show', $progres_proyek->tahapan->proyek->proyek_id) }}" style="color: var(--primary-color); text-decoration: none;">
                                {{ $progres_proyek->tahapan->proyek->nama_proyek }}
                            </a>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <small style="color: #718096; font-weight: 600;">TAHAPAN</small>
                        <p style="margin: 8px 0 0; color: #2D3748; font-size: 16px;">{{ $progres_proyek->tahapan->nama_tahap }}</p>
                    </div>
                    <div class="col-md-6">
                        <small style="color: #718096; font-weight: 600;">REALISASI PERSENTASE</small>
                        <div style="margin: 8px 0 0;">
                            <div style="width: 100%; background: #E2E8F0; border-radius: 20px; overflow: hidden; height: 30px; display: flex; align-items: center;">
                                <div style="background: linear-gradient(90deg, var(--primary-color), var(--secondary-color)); width: {{ $progres_proyek->persen_real }}%; height: 100%; display: flex; align-items: center; justify-content: center; color: white; font-size: 14px; font-weight: 600;">
                                    {{ $progres_proyek->persen_real }}%
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <small style="color: #718096; font-weight: 600;">TANGGAL REALISASI</small>
                        <p style="margin: 8px 0 0; color: #2D3748;">
                            {{ $progres_proyek->tanggal ? \Carbon\Carbon::parse($progres_proyek->tanggal)->format('d M Y') : '-' }}
                        </p>
                    </div>
                    @if($progres_proyek->catatan)
                        <div class="col-12">
                            <small style="color: #718096; font-weight: 600;">CATATAN</small>
                            <p style="margin: 8px 0 0; color: #2D3748; line-height: 1.6;">{{ $progres_proyek->catatan }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
