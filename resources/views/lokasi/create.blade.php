@extends('layouts.poseify')

@section('title', 'Tambah Lokasi Proyek')

@section('content')
<div class="container-fluid py-5 bg-secondary">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card bg-dark border-0 shadow-lg">
                    <div class="card-header bg-success text-white">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-map-marker-alt me-2"></i>
                            <h4 class="mb-0">Tambah Lokasi Proyek</h4>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('lokasi.store') }}" method="POST">
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

                                <!-- Latitude -->
                                <div class="col-md-6">
                                    <label for="lat" class="form-label text-body">
                                        <i class="fa fa-compass me-1"></i>Latitude
                                    </label>
                                    <input type="number" 
                                           class="form-control bg-secondary text-body border-dark @error('lat') is-invalid @enderror" 
                                           id="lat" name="lat" 
                                           value="{{ old('lat') }}" 
                                           step="any" 
                                           placeholder="Contoh: -6.200000" required>
                                    @error('lat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Longitude -->
                                <div class="col-md-6">
                                    <label for="lng" class="form-label text-body">
                                        <i class="fa fa-compass me-1"></i>Longitude
                                    </label>
                                    <input type="number" 
                                           class="form-control bg-secondary text-body border-dark @error('lng') is-invalid @enderror" 
                                           id="lng" name="lng" 
                                           value="{{ old('lng') }}" 
                                           step="any" 
                                           placeholder="Contoh: 106.816666" required>
                                    @error('lng')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- GeoJSON -->
                                <div class="col-12">
                                    <label for="geojson" class="form-label text-body">
                                        <i class="fa fa-code me-1"></i>GeoJSON (Opsional)
                                    </label>
                                    <textarea class="form-control bg-secondary text-body border-dark @error('geojson') is-invalid @enderror" 
                                              id="geojson" name="geojson" rows="6" 
                                              placeholder='Contoh: {"type": "Point", "coordinates": [106.816666, -6.200000]}'>{{ old('geojson') }}</textarea>
                                    @error('geojson')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Format GeoJSON untuk data geografis tambahan</small>
                                </div>
                            </div>

                            <!-- Map Preview -->
                            <div class="mt-4">
                                <label class="form-label text-body">
                                    <i class="fa fa-map me-1"></i>Preview Lokasi
                                </label>
                                <div class="bg-secondary rounded p-3 text-center">
                                    <i class="fa fa-map fa-3x text-muted mb-2"></i>
                                    <p class="text-muted mb-0">Map preview akan muncul setelah koordinat diisi</p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('lokasi.index') }}" class="btn btn-outline-secondary">
                                    <i class="fa fa-arrow-left me-1"></i>Kembali
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-save me-1"></i>Simpan Lokasi
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