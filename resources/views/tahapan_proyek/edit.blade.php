@extends('layouts.nova')

@section('title', 'Edit Tahapan Proyek - ' . ($tahapan->nama_tahap ?? ''))

@section('content')
<section style="padding: 40px 0;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-30">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('tahapan_proyek.index') }}">Tahapan Proyek</a></li>
                <li class="breadcrumb-item active">Edit Tahapan</li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="mb-30">
            <h2 class="mb-10">Edit Tahapan Proyek</h2>
            <p style="color: #718096;">Perbarui data tahapan {{ $tahapan->nama_tahap ?? '' }}</p>
        </div>

        <!-- Form Card -->
        <div class="card">
            <div class="card-body" style="padding: 30px;">
                <form action="{{ route('tahapan_proyek.update', $tahapan->tahap_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">
                        <!-- Proyek -->
                        <div class="col-12">
                            <label for="proyek_id" class="form-label" style="font-weight: 600; color: #2D3748; margin-bottom: 10px;">
                                Proyek <span style="color: var(--danger-color);">*</span>
                            </label>
                            <select class="form-control @error('proyek_id') is-invalid @enderror"
                                id="proyek_id" name="proyek_id" required>
                                <option value="">-- Pilih Proyek --</option>
                                @foreach($proyeks as $proyek)
                                    <option value="{{ $proyek->proyek_id }}"
                                        {{ old('proyek_id', $tahapan->proyek_id) == $proyek->proyek_id ? 'selected' : '' }}>
                                        {{ $proyek->nama_proyek }}
                                    </option>
                                @endforeach
                            </select>
                            @error('proyek_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nama Tahapan -->
                        <div class="col-12">
                            <label for="nama_tahap" class="form-label" style="font-weight: 600; color: #2D3748; margin-bottom: 10px;">
                                Nama Tahapan <span style="color: var(--danger-color);">*</span>
                            </label>
                            <input type="text" class="form-control @error('nama_tahap') is-invalid @enderror"
                                id="nama_tahap" name="nama_tahap"
                                value="{{ old('nama_tahap', $tahapan->nama_tahap) }}" required>
                            @error('nama_tahap')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Target Persentase -->
                        <div class="col-md-6">
                            <label for="target_persen" class="form-label" style="font-weight: 600; color: #2D3748; margin-bottom: 10px;">
                                Target Persentase (%) <span style="color: var(--danger-color);">*</span>
                            </label>
                            <input type="number" class="form-control @error('target_persen') is-invalid @enderror"
                                id="target_persen" name="target_persen"
                                value="{{ old('target_persen', $tahapan->target_persen) }}"
                                min="0" max="100" step="0.01" required>
                            @error('target_persen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tanggal Mulai -->
                        <div class="col-md-6">
                            <label for="tgl_mulai" class="form-label" style="font-weight: 600; color: #2D3748; margin-bottom: 10px;">
                                Tanggal Mulai
                            </label>
                            <input type="date" class="form-control @error('tgl_mulai') is-invalid @enderror"
                                id="tgl_mulai" name="tgl_mulai"
                                value="{{ old('tgl_mulai', $tahapan->tgl_mulai) }}">
                            @error('tgl_mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tanggal Selesai -->
                        <div class="col-md-6">
                            <label for="tgl_selesai" class="form-label" style="font-weight: 600; color: #2D3748; margin-bottom: 10px;">
                                Tanggal Selesai
                            </label>
                            <input type="date" class="form-control @error('tgl_selesai') is-invalid @enderror"
                                id="tgl_selesai" name="tgl_selesai"
                                value="{{ old('tgl_selesai', $tahapan->tgl_selesai) }}">
                            @error('tgl_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="col-12" style="border-top: 1px solid #E2E8F0; padding-top: 20px;">
                            <div class="d-flex gap-2">
                                <button type="submit" class="button button-primary">
                                    <i class="fas fa-save me-2"></i> Perbarui Tahapan
                                </button>
                                <a href="{{ route('tahapan_proyek.index') }}" class="button" style="background: #E2E8F0; color: #2D3748;">
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
