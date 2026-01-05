@extends('layouts.nova')

@section('title', 'Tambah Progress Proyek')

@section('content')
<section style="padding: 40px 0;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-30">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('progres_proyek.index') }}">Progress Proyek</a></li>
                <li class="breadcrumb-item active">Tambah Progress</li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="mb-30">
            <h2 class="mb-10">Tambah Progress Proyek</h2>
            <p style="color: #718096;">Catat realisasi progress untuk tahapan proyek</p>
        </div>

        <!-- Form Card -->
        <div class="card">
            <div class="card-body" style="padding: 30px;">
                <form action="{{ route('progres_proyek.store') }}" method="POST">
                    @csrf

                    <div class="row g-4">
                        <!-- Tahapan Proyek -->
                        <div class="col-12">
                            <label for="tahap_id" class="form-label" style="font-weight: 600; color: #2D3748; margin-bottom: 10px;">
                                Tahapan Proyek <span style="color: var(--danger-color);">*</span>
                            </label>
                            <select class="form-control @error('tahap_id') is-invalid @enderror"
                                id="tahap_id" name="tahap_id" required>
                                <option value="">-- Pilih Tahapan --</option>
                                @foreach($tahapan as $item)
                                    <option value="{{ $item->tahap_id }}">
                                        {{ $item->proyek->nama_proyek }} - {{ $item->nama_tahap }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tahap_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Realisasi Persentase -->
                        <div class="col-md-6">
                            <label for="persen_real" class="form-label" style="font-weight: 600; color: #2D3748; margin-bottom: 10px;">
                                Realisasi Persentase (%) <span style="color: var(--danger-color);">*</span>
                            </label>
                            <input type="number" class="form-control @error('persen_real') is-invalid @enderror"
                                id="persen_real" name="persen_real"
                                value="{{ old('persen_real', 0) }}"
                                min="0" max="100" step="0.01" required>
                            @error('persen_real')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tanggal Realisasi -->
                        <div class="col-md-6">
                            <label for="tanggal" class="form-label" style="font-weight: 600; color: #2D3748; margin-bottom: 10px;">
                                Tanggal Realisasi <span style="color: var(--danger-color);">*</span>
                            </label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                id="tanggal" name="tanggal"
                                value="{{ old('tanggal') }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Catatan -->
                        <div class="col-12">
                            <label for="catatan" class="form-label" style="font-weight: 600; color: #2D3748; margin-bottom: 10px;">
                                Catatan
                            </label>
                            <textarea class="form-control @error('catatan') is-invalid @enderror"
                                id="catatan" name="catatan" rows="4"
                                placeholder="Catatan atau penjelasan mengenai progress (opsional)">{{ old('catatan') }}</textarea>
                            @error('catatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="col-12" style="border-top: 1px solid #E2E8F0; padding-top: 20px;">
                            <div class="d-flex gap-2">
                                <button type="submit" class="button button-primary">
                                    <i class="fas fa-save me-2"></i> Simpan Progress
                                </button>
                                <a href="{{ route('progres_proyek.index') }}" class="button" style="background: #E2E8F0; color: #2D3748;">
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
