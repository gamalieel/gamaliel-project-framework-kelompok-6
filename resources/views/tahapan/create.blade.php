@extends('layouts.poseify')

@section('title', 'Tambah Tahapan Proyek')

@section('content')
<div class="container-fluid py-5 bg-secondary">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card bg-dark border-0 shadow-lg">
                    <div class="card-header bg-info text-white">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-tasks me-2"></i>
                            <h4 class="mb-0">Tambah Tahapan Proyek</h4>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('tahapan_proyek.store') }}" method="POST">
                            @csrf
                            
                            <div class="row g-3">
                                <!-- Pilih Proyek -->
                                <div class="col-12">
                                    <label for="proyek_id" class="form-label text-body">
                                        <i class="fa fa-project-diagram me-1"></i>Pilih Proyek
                                    </label>
                                    <select class="form-select bg-secondary text-body border-dark @error('proyek_id') is-invalid @enderror" 
                                            id="proyek_id" name="proyek_id" required>
                                        <option value="">-- Pilih Proyek --</option>
                                        @foreach($proyeks as $p)
                                            <option value="{{ $p->proyek_id }}" {{ old('proyek_id') == $p->proyek_id ? 'selected' : '' }}>
                                                {{ $p->nama_proyek }} ({{ $p->kode_proyek }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('proyek_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Nama Tahap -->
                                <div class="col-md-8">
                                    <label for="nama_tahap" class="form-label text-body">
                                        <i class="fa fa-tag me-1"></i>Nama Tahapan
                                    </label>
                                    <input type="text" 
                                           class="form-control bg-secondary text-body border-dark @error('nama_tahap') is-invalid @enderror" 
                                           id="nama_tahap" name="nama_tahap" 
                                           value="{{ old('nama_tahap') }}" 
                                           placeholder="Contoh: Persiapan Lahan" required>
                                    @error('nama_tahap')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Target Persen -->
                                <div class="col-md-4">
                                    <label for="target_persen" class="form-label text-body">
                                        <i class="fa fa-percentage me-1"></i>Target Persentase (%)
                                    </label>
                                    <input type="number" 
                                           class="form-control bg-secondary text-body border-dark @error('target_persen') is-invalid @enderror" 
                                           id="target_persen" name="target_persen" 
                                           value="{{ old('target_persen') }}" 
                                           min="0" max="100" step="0.01" 
                                           placeholder="25">
                                    @error('target_persen')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tanggal Mulai -->
                                <div class="col-md-6">
                                    <label for="tgl_mulai" class="form-label text-body">
                                        <i class="fa fa-calendar-plus me-1"></i>Tanggal Mulai
                                    </label>
                                    <input type="date" 
                                           class="form-control bg-secondary text-body border-dark @error('tgl_mulai') is-invalid @enderror" 
                                           id="tgl_mulai" name="tgl_mulai" 
                                           value="{{ old('tgl_mulai') }}">
                                    @error('tgl_mulai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tanggal Selesai -->
                                <div class="col-md-6">
                                    <label for="tgl_selesai" class="form-label text-body">
                                        <i class="fa fa-calendar-check me-1"></i>Tanggal Selesai (Target)
                                    </label>
                                    <input type="date" 
                                           class="form-control bg-secondary text-body border-dark @error('tgl_selesai') is-invalid @enderror" 
                                           id="tgl_selesai" name="tgl_selesai" 
                                           value="{{ old('tgl_selesai') }}">
                                    @error('tgl_selesai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Deskripsi -->
                                <div class="col-12">
                                    <label for="deskripsi" class="form-label text-body">
                                        <i class="fa fa-align-left me-1"></i>Deskripsi Tahapan
                                    </label>
                                    <textarea class="form-control bg-secondary text-body border-dark @error('deskripsi') is-invalid @enderror" 
                                              id="deskripsi" name="deskripsi" rows="4" 
                                              placeholder="Jelaskan detail pekerjaan pada tahapan ini...">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Timeline Preview -->
                            <div class="mt-4">
                                <label class="form-label text-body">
                                    <i class="fa fa-clock me-1"></i>Preview Timeline
                                </label>
                                <div class="bg-secondary rounded p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="badge bg-info me-3">1</div>
                                        <div class="flex-grow-1">
                                            <span class="text-body" id="preview-nama">Nama tahapan akan muncul di sini</span>
                                            <div class="progress mt-1" style="height: 6px;">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 0%" id="preview-progress"></div>
                                            </div>
                                        </div>
                                        <small class="text-muted" id="preview-target">0%</small>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('tahapan_proyek.index') }}" class="btn btn-outline-secondary">
                                    <i class="fa fa-arrow-left me-1"></i>Kembali
                                </a>
                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-save me-1"></i>Simpan Tahapan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const namaInput = document.getElementById('nama_tahap');
    const targetInput = document.getElementById('target_persen');
    const previewNama = document.getElementById('preview-nama');
    const previewTarget = document.getElementById('preview-target');
    const previewProgress = document.getElementById('preview-progress');

    function updatePreview() {
        const nama = namaInput.value || 'Nama tahapan akan muncul di sini';
        const target = targetInput.value || '0';
        
        previewNama.textContent = nama;
        previewTarget.textContent = target + '%';
        previewProgress.style.width = target + '%';
    }

    namaInput.addEventListener('input', updatePreview);
    targetInput.addEventListener('input', updatePreview);
});
</script>
@endsection