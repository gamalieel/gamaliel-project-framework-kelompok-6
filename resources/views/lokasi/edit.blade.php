@extends('layouts.nova')

@section('title', 'Edit Lokasi Proyek')

@section('content')
<section style="padding: 40px 0;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-30">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('lokasi.index') }}">Lokasi Proyek</a></li>
                <li class="breadcrumb-item active">Edit Lokasi</li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="mb-30">
            <h2 class="mb-10">Edit Lokasi Proyek</h2>
            <p style="color: #718096;">Ubah koordinat dan informasi lokasi proyek</p>
        </div>

        <!-- Form -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('lokasi.update', $lokasi->lokasi_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Pilih Proyek -->
                    <div class="mb-25">
                        <label for="proyek_id" class="form-label" style="font-weight: 600; color: #2D3748;">
                            <i class="fas fa-project-diagram me-2"></i>Pilih Proyek
                        </label>
                        <select class="form-control @error('proyek_id') is-invalid @enderror"
                                id="proyek_id" name="proyek_id" required>
                            <option value="">-- Pilih Proyek --</option>
                            @foreach($proyek as $p)
                                <option value="{{ $p->proyek_id }}" {{ $lokasi->proyek_id == $p->proyek_id ? 'selected' : '' }}>
                                    {{ $p->nama_proyek }} ({{ $p->kode_proyek }})
                                </option>
                            @endforeach
                        </select>
                        @error('proyek_id')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Latitude dan Longitude -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-25">
                                <label for="lat" class="form-label" style="font-weight: 600; color: #2D3748;">
                                    <i class="fas fa-location-dot me-2"></i>Latitude
                                </label>
                                <input type="number"
                                       class="form-control @error('lat') is-invalid @enderror"
                                       id="lat" name="lat"
                                       value="{{ old('lat', $lokasi->lat) }}"
                                       step="any"
                                       required>
                                @error('lat')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-25">
                                <label for="lng" class="form-label" style="font-weight: 600; color: #2D3748;">
                                    <i class="fas fa-location-dot me-2"></i>Longitude
                                </label>
                                <input type="number"
                                       class="form-control @error('lng') is-invalid @enderror"
                                       id="lng" name="lng"
                                       value="{{ old('lng', $lokasi->lng) }}"
                                       step="any"
                                       required>
                                @error('lng')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- GeoJSON -->
                    <div class="mb-25">
                        <label for="geojson" class="form-label" style="font-weight: 600; color: #2D3748;">
                            <i class="fas fa-code me-2"></i>GeoJSON (Opsional)
                        </label>
                        <textarea class="form-control @error('geojson') is-invalid @enderror"
                                  id="geojson" name="geojson"
                                  rows="5">{{ old('geojson', $lokasi->geojson) }}</textarea>
                        @error('geojson')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                        <small style="color: #718096;">Format GeoJSON untuk data geografis lanjutan</small>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="button button-primary">
                            <i class="fas fa-save me-2"></i> Perbarui Lokasi
                        </button>
                        <a href="{{ route('lokasi.index') }}" class="button button-secondary">
                            <i class="fas fa-times me-2"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
