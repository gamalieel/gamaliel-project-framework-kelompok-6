@extends('layouts.nova')

@section('title', 'Tambah Proyek')

@section('content')
<section style="padding: 40px 0;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-30">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('proyek.index') }}">Proyek</a></li>
                <li class="breadcrumb-item active">Tambah Proyek</li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="mb-30">
            <h2 class="mb-10">Tambah Proyek Baru</h2>
            <p style="color: #718096;">Masukkan data proyek pembangunan Anda</p>
        </div>

        <!-- Form Card -->
        <div class="card">
            <div class="card-body" style="padding: 30px;">
                <form action="{{ route('proyek.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-4">
                        <!-- Kode Proyek -->
                        <div class="col-md-6">
                            <label for="kode_proyek" class="form-label" style="font-weight: 600; color: #2D3748; margin-bottom: 10px;">
                                Kode Proyek <span style="color: var(--danger-color);">*</span>
                            </label>
                            <input type="text" class="form-control @error('kode_proyek') is-invalid @enderror" 
                                id="kode_proyek" name="kode_proyek"
                                value="{{ old('kode_proyek', $proyek->kode_proyek ?? '') }}" 
                                placeholder="Contoh: PRJK-001" required>
                            @error('kode_proyek')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nama Proyek -->
                        <div class="col-md-6">
                            <label for="nama_proyek" class="form-label" style="font-weight: 600; color: #2D3748; margin-bottom: 10px;">
                                Nama Proyek <span style="color: var(--danger-color);">*</span>
                            </label>
                            <input type="text" class="form-control @error('nama_proyek') is-invalid @enderror" 
                                id="nama_proyek" name="nama_proyek"
                                value="{{ old('nama_proyek', $proyek->nama_proyek ?? '') }}" 
                                placeholder="Nama lengkap proyek" required>
                            @error('nama_proyek')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tahun -->
                        <div class="col-md-3">
                            <label for="tahun" class="form-label" style="font-weight: 600; color: #2D3748; margin-bottom: 10px;">
                                Tahun <span style="color: var(--danger-color);">*</span>
                            </label>
                            <input type="number" class="form-control @error('tahun') is-invalid @enderror" 
                                id="tahun" name="tahun"
                                value="{{ old('tahun', $proyek->tahun ?? date('Y')) }}" 
                                min="2020" max="{{ date('Y') + 5 }}" required>
                            @error('tahun')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Sumber Dana -->
                        <div class="col-md-3">
                            <label for="sumber_dana" class="form-label" style="font-weight: 600; color: #2D3748; margin-bottom: 10px;">
                                Sumber Dana <span style="color: var(--danger-color);">*</span>
                            </label>
                            <input type="text" class="form-control @error('sumber_dana') is-invalid @enderror" 
                                id="sumber_dana" name="sumber_dana"
                                value="{{ old('sumber_dana', $proyek->sumber_dana ?? '') }}" 
                                placeholder="Contoh: APBD" required>
                            @error('sumber_dana')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Anggaran -->
                        <div class="col-md-6">
                            <label for="anggaran" class="form-label" style="font-weight: 600; color: #2D3748; margin-bottom: 10px;">
                                Anggaran (Rp) <span style="color: var(--danger-color);">*</span>
                            </label>
                            <input type="number" class="form-control @error('anggaran') is-invalid @enderror" 
                                id="anggaran" name="anggaran"
                                value="{{ old('anggaran', $proyek->anggaran ?? '') }}" 
                                placeholder="Anggaran dalam rupiah" step="0.01" required>
                            @error('anggaran')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Lokasi -->
                        <div class="col-12">
                            <label for="lokasi" class="form-label" style="font-weight: 600; color: #2D3748; margin-bottom: 10px;">
                                Lokasi <span style="color: var(--danger-color);">*</span>
                            </label>
                            <input type="text" class="form-control @error('lokasi') is-invalid @enderror" 
                                id="lokasi" name="lokasi"
                                value="{{ old('lokasi', $proyek->lokasi ?? '') }}" 
                                placeholder="Alamat atau deskripsi lokasi proyek" required>
                            @error('lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="col-12">
                            <label for="deskripsi" class="form-label" style="font-weight: 600; color: #2D3748; margin-bottom: 10px;">
                                Deskripsi <span style="color: var(--danger-color);">*</span>
                            </label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                id="deskripsi" name="deskripsi" rows="4" 
                                placeholder="Deskripsi lengkap tentang proyek" required>{{ old('deskripsi', $proyek->deskripsi ?? '') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Dokumen -->
                        <div class="col-12">
                            <label for="dokumen" class="form-label" style="font-weight: 600; color: #2D3748; margin-bottom: 10px;">
                                Dokumen (PDF, Excel, Word)
                            </label>
                            <input type="file" class="form-control @error('dokumen') is-invalid @enderror" 
                                id="dokumen" name="dokumen" accept=".pdf,.xlsx,.xls,.doc,.docx">
                            <small style="color: #718096;">Maksimal ukuran file: 10MB</small>
                            @if(!empty($proyek->dokumen))
                                <div class="mt-2">
                                    <a href="{{ asset('uploads/proyek/'.$proyek->dokumen) }}" target="_blank" class="badge badge-primary">
                                        <i class="fas fa-file"></i> Lihat Dokumen Saat Ini
                                    </a>
                                </div>
                            @endif
                            @error('dokumen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="col-12" style="border-top: 1px solid #E2E8F0; padding-top: 20px;">
                            <div class="d-flex gap-2">
                                <button type="submit" class="button button-primary">
                                    <i class="fas fa-save me-2"></i> Simpan Proyek
                                </button>
                                <a href="{{ route('proyek.index') }}" class="button" style="background: #E2E8F0; color: #2D3748;">
                                    <i class="fas fa-times me-2"></i> Batal
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
