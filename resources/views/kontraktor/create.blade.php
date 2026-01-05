@extends('layouts.poseify')

@section('title', 'Tambah Kontraktor')

@section('content')
<div class="container-fluid py-5 bg-dark">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card bg-secondary border-0 shadow-lg">
                    <div class="card-header bg-warning text-dark">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-hard-hat me-2"></i>
                            <h4 class="mb-0">Tambah Kontraktor</h4>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('kontraktor.store') }}" method="POST">
                            @csrf
                            
                            <div class="row g-3">
                                <!-- Pilih Proyek -->
                                <div class="col-12">
                                    <label for="proyek_id" class="form-label text-body">
                                        <i class="fa fa-project-diagram me-1"></i>Pilih Proyek
                                    </label>
                                    <select class="form-select bg-dark text-body border-secondary @error('proyek_id') is-invalid @enderror" 
                                            id="proyek_id" name="proyek_id" required>
                                        <option value="">-- Pilih Proyek --</option>
                                        @foreach($proyek as $p)
                                            <option value="{{ $p->proyek_id }}" {{ old('proyek_id') == $p->proyek_id ? 'selected' : '' }}>
                                                {{ $p->nama_proyek }} ({{ $p->kode_proyek }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('proyek_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Nama Kontraktor -->
                                <div class="col-md-6">
                                    <label for="nama" class="form-label text-body">
                                        <i class="fa fa-building me-1"></i>Nama Kontraktor
                                    </label>
                                    <input type="text" 
                                           class="form-control bg-dark text-body border-secondary @error('nama') is-invalid @enderror" 
                                           id="nama" name="nama" 
                                           value="{{ old('nama') }}" 
                                           placeholder="Contoh: PT. Konstruksi Jaya" required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Penanggung Jawab -->
                                <div class="col-md-6">
                                    <label for="penanggung_jawab" class="form-label text-body">
                                        <i class="fa fa-user-tie me-1"></i>Penanggung Jawab
                                    </label>
                                    <input type="text" 
                                           class="form-control bg-dark text-body border-secondary @error('penanggung_jawab') is-invalid @enderror" 
                                           id="penanggung_jawab" name="penanggung_jawab" 
                                           value="{{ old('penanggung_jawab') }}" 
                                           placeholder="Contoh: Budi Santoso">
                                    @error('penanggung_jawab')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Kontak -->
                                <div class="col-md-6">
                                    <label for="kontak" class="form-label text-body">
                                        <i class="fa fa-phone me-1"></i>Kontak
                                    </label>
                                    <input type="text" 
                                           class="form-control bg-dark text-body border-secondary @error('kontak') is-invalid @enderror" 
                                           id="kontak" name="kontak" 
                                           value="{{ old('kontak') }}" 
                                           placeholder="Contoh: 021-1234567 / 08123456789">
                                    @error('kontak')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email (jika ada) -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label text-body">
                                        <i class="fa fa-envelope me-1"></i>Email (Opsional)
                                    </label>
                                    <input type="email" 
                                           class="form-control bg-dark text-body border-secondary" 
                                           id="email" name="email" 
                                           value="{{ old('email') }}" 
                                           placeholder="Contoh: kontraktor@email.com">
                                </div>

                                <!-- Alamat -->
                                <div class="col-12">
                                    <label for="alamat" class="form-label text-body">
                                        <i class="fa fa-map-marker-alt me-1"></i>Alamat
                                    </label>
                                    <textarea class="form-control bg-dark text-body border-secondary @error('alamat') is-invalid @enderror" 
                                              id="alamat" name="alamat" rows="3" 
                                              placeholder="Masukkan alamat lengkap kontraktor">{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Info Card -->
                            <div class="mt-4">
                                <div class="alert alert-info bg-dark border-info text-body">
                                    <i class="fa fa-info-circle me-2"></i>
                                    <strong>Informasi:</strong> Data kontraktor akan ditampilkan di halaman guest untuk transparansi proyek.
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('kontraktor.index') }}" class="btn btn-outline-secondary">
                                    <i class="fa fa-arrow-left me-1"></i>Kembali
                                </a>
                                <button type="submit" class="btn btn-warning text-dark">
                                    <i class="fa fa-save me-1"></i>Simpan Kontraktor
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection