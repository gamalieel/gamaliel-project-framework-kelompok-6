@extends('layouts.nova')

@section('title', 'Detail Proyek - ' . ($proyek->nama_proyek ?? ''))

@section('content')
<section style="padding: 40px 0;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-30">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('proyek.index') }}">Proyek</a></li>
                <li class="breadcrumb-item active">{{ $proyek->nama_proyek }}</li>
            </ol>
        </nav>

        <!-- Header dengan Action Buttons -->
        <div class="d-flex justify-content-between align-items-center mb-30">
            <div>
                <h2 class="mb-10">{{ $proyek->nama_proyek }}</h2>
                <p style="color: #718096;">Kode: {{ $proyek->kode_proyek }}</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('proyek.index') }}" class="button" style="background: #E2E8F0; color: #2D3748;">
                    <i class="fas fa-arrow-left me-2"></i> Kembali
                </a>
            </div>
        </div>

        <div class="row g-4">
            <!-- Informasi Utama -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%); color: white; border: none; padding: 20px;">
                        <h5 style="margin: 0; color: white;">Informasi Proyek</h5>
                    </div>
                    <div class="card-body" style="padding: 30px;">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <small style="color: #718096; font-weight: 600;">TAHUN</small>
                                <p style="margin: 8px 0 0; color: #2D3748; font-size: 16px; font-weight: 600;">{{ $proyek->tahun }}</p>
                            </div>
                            <div class="col-md-6">
                                <small style="color: #718096; font-weight: 600;">SUMBER DANA</small>
                                <p style="margin: 8px 0 0; color: #2D3748; font-size: 16px; font-weight: 600;">{{ $proyek->sumber_dana }}</p>
                            </div>
                            <div class="col-md-6">
                                <small style="color: #718096; font-weight: 600;">LOKASI</small>
                                <p style="margin: 8px 0 0; color: #2D3748;">{{ $proyek->lokasi }}</p>
                            </div>
                            <div class="col-md-6">
                                <small style="color: #718096; font-weight: 600;">ANGGARAN</small>
                                <p style="margin: 8px 0 0; color: #2D3748; font-size: 18px; font-weight: 700; color: var(--primary-color);">
                                    Rp {{ number_format($proyek->anggaran, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="col-12">
                                <small style="color: #718096; font-weight: 600;">DESKRIPSI</small>
                                <p style="margin: 8px 0 0; color: #2D3748; line-height: 1.6;">{{ $proyek->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dokumen -->
                @if($proyek->dokumen)
                    <div class="card mt-20">
                        <div class="card-header" style="background: #F7FAFC; border-bottom: 1px solid #E2E8F0; padding: 20px;">
                            <h5 style="margin: 0;">Dokumen Pendukung</h5>
                        </div>
                        <div class="card-body" style="padding: 20px;">
                            <a href="{{ asset('uploads/proyek/'.$proyek->dokumen) }}" target="_blank" class="btn btn-outline-primary">
                                <i class="fas fa-download me-2"></i> {{ $proyek->dokumen }}
                            </a>
                        </div>
                    </div>
                @endif

                <!-- Tahapan Proyek -->
                <div class="card mt-20">
                    <div class="card-header" style="background: #F7FAFC; border-bottom: 1px solid #E2E8F0; padding: 20px; d-flex justify-content-between align-items-center;">
                        <div>
                            <h5 style="margin: 0;">Tahapan Proyek</h5>
                        </div>
                        <a href="{{ route('tahapan_proyek.create', ['proyek_id' => $proyek->proyek_id]) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus me-1"></i> Tambah Tahapan
                        </a>
                    </div>
                    <div class="card-body">
                        @if($proyek->tahapanProyek->count() > 0)
                            <div class="table-responsive">
                                <table class="table" style="margin: 0;">
                                    <thead style="background: #F7FAFC;">
                                        <tr>
                                            <th style="border: 1px solid #E2E8F0;">Nama Tahapan</th>
                                            <th style="border: 1px solid #E2E8F0; text-align: center;">Target %</th>
                                            <th style="border: 1px solid #E2E8F0; text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($proyek->tahapanProyek as $tahapan)
                                            <tr>
                                                <td style="border: 1px solid #E2E8F0;">{{ $tahapan->nama_tahapan }}</td>
                                                <td style="border: 1px solid #E2E8F0; text-align: center;">{{ $tahapan->target_persentase }}%</td>
                                                <td style="border: 1px solid #E2E8F0; text-align: center;">
                                                    <a href="{{ route('tahapan_proyek.edit', $tahapan->tahapan_proyek_id) }}" class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p style="color: #718096; text-align: center; padding: 20px 0; margin: 0;">Belum ada tahapan. <a href="{{ route('tahapan_proyek.create', ['proyek_id' => $proyek->proyek_id]) }}">Buat tahapan baru</a></p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sidebar Info -->
            <div class="col-lg-4">
                <!-- Status Card -->
                <div class="card mb-20">
                    <div class="card-header" style="background: linear-gradient(135deg, #51CF66 0%, #40C057 100%); color: white; border: none; padding: 20px;">
                        <h5 style="margin: 0; color: white;">Status Proyek</h5>
                    </div>
                    <div class="card-body" style="padding: 25px; text-align: center;">
                        <div style="font-size: 48px; margin-bottom: 10px;">
                            <i class="fas fa-check-circle" style="color: #51CF66;"></i>
                        </div>
                        <p style="margin: 0; color: #718096; font-size: 14px;">Proyek Aktif</p>
                        <h3 style="margin: 10px 0 0; color: #2D3748;">Berjalan</h3>
                    </div>
                </div>

                <!-- Timeline -->
                <div class="card">
                    <div class="card-header" style="background: #F7FAFC; border-bottom: 1px solid #E2E8F0; padding: 20px;">
                        <h5 style="margin: 0;">Informasi Tambahan</h5>
                    </div>
                    <div class="card-body" style="padding: 20px;">
                        <div class="mb-20">
                            <small style="color: #718096; font-weight: 600;">ID PROYEK</small>
                            <p style="margin: 8px 0 0; color: #2D3748;">{{ $proyek->proyek_id }}</p>
                        </div>
                        <div class="mb-20">
                            <small style="color: #718096; font-weight: 600;">DIBUAT PADA</small>
                            <p style="margin: 8px 0 0; color: #2D3748;">{{ $proyek->created_at ? $proyek->created_at->format('d M Y H:i') : '-' }}</p>
                        </div>
                        <div>
                            <small style="color: #718096; font-weight: 600;">TERAKHIR DIUPDATE</small>
                            <p style="margin: 8px 0 0; color: #2D3748;">{{ $proyek->updated_at ? $proyek->updated_at->format('d M Y H:i') : '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
