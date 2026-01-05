@extends('layouts.poseify')

@section('title', 'Tambah Progress Proyek')

@section('content')
<div class="container-fluid py-5 bg-dark">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card bg-secondary border-0 shadow-lg hover-lift">
                    <div class="card-header blue-gradient text-white">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-chart-line me-2"></i>
                            <h4 class="mb-0">Tambah Progress Proyek</h4>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('progress.store') }}" method="POST">
                            @csrf
                            
                            <div class="row g-3">
                                <!-- Pilih Proyek -->
                                <div class="col-md-6">
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

                                <!-- Pilih Tahapan -->
                                <div class="col-md-6">
                                    <label for="tahap_id" class="form-label text-body">
                                        <i class="fa fa-tasks me-1"></i>Pilih Tahapan
                                    </label>
                                    <select class="form-select bg-dark text-body border-secondary @error('tahap_id') is-invalid @enderror" 
                                            id="tahap_id" name="tahap_id" required>
                                        <option value="">-- Pilih Tahapan --</option>
                                        @foreach($tahapan as $t)
                                            <option value="{{ $t->tahap_id }}" {{ old('tahap_id') == $t->tahap_id ? 'selected' : '' }}>
                                                {{ $t->nama_tahap }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tahap_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Persentase Real -->
                                <div class="col-md-6">
                                    <label for="persen_real" class="form-label text-body">
                                        <i class="fa fa-percentage me-1"></i>Persentase Realisasi (%)
                                    </label>
                                    <input type="number" 
                                           class="form-control bg-dark text-body border-secondary @error('persen_real') is-invalid @enderror" 
                                           id="persen_real" name="persen_real" 
                                           value="{{ old('persen_real') }}" 
                                           min="0" max="100" step="0.01" required>
                                    @error('persen_real')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tanggal -->
                                <div class="col-md-6">
                                    <label for="tanggal" class="form-label text-body">
                                        <i class="fa fa-calendar me-1"></i>Tanggal Progress
                                    </label>
                                    <input type="date" 
                                           class="form-control bg-dark text-body border-secondary @error('tanggal') is-invalid @enderror" 
                                           id="tanggal" name="tanggal" 
                                           value="{{ old('tanggal', date('Y-m-d')) }}" required>
                                    @error('tanggal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Catatan -->
                                <div class="col-12">
                                    <label for="catatan" class="form-label text-body">
                                        <i class="fa fa-sticky-note me-1"></i>Catatan Progress
                                    </label>
                                    <textarea class="form-control bg-dark text-body border-secondary @error('catatan') is-invalid @enderror" 
                                              id="catatan" name="catatan" rows="4" 
                                              placeholder="Masukkan catatan progress (opsional)">{{ old('catatan') }}</textarea>
                                    @error('catatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('progress.index') }}" class="btn btn-outline-secondary">
                                    <i class="fa fa-arrow-left me-1"></i>Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save me-1"></i>Simpan Progress
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