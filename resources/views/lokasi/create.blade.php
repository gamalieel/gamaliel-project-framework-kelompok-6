@extends('layouts.nova')

@section('title', 'Tambah Lokasi Proyek')

@section('content')
<section style="padding: 40px 0;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-30">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('lokasi.index') }}">Lokasi Proyek</a></li>
                <li class="breadcrumb-item active">Tambah Lokasi</li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="mb-30">
            <h2 class="mb-10">Tambah Lokasi Proyek</h2>
            <p style="color: #718096;">Masukkan data lokasi dan koordinat geografis proyek baru</p>
        </div>

        <!-- Form -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('lokasi.store') }}" method="POST">
                    @csrf

                    <!-- Pilih Proyek -->
                    <div class="mb-25">
                        <label for="proyek_id" class="form-label" style="font-weight: 600; color: #2D3748;">
                            <i class="fas fa-project-diagram me-2"></i>Pilih Proyek
                        </label>
                        <select class="form-control @error('proyek_id') is-invalid @enderror"
                                id="proyek_id" name="proyek_id" required>
                            <option value="">-- Pilih Proyek --</option>
                            @foreach($proyek as $p)
                                <option value="{{ $p->proyek_id }}" {{ old('proyek_id') == $p->proyek_id ? 'selected' : '' }}>
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
                                       value="{{ old('lat') }}"
                                       step="any"
                                       placeholder="-6.200000"
                                       required>
                                @error('lat')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                @enderror
                                <small style="color: #718096;">Contoh: -6.200000</small>
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
                                       value="{{ old('lng') }}"
                                       step="any"
                                       placeholder="106.816666"
                                       required>
                                @error('lng')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                @enderror
                                <small style="color: #718096;">Contoh: 106.816666</small>
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
                                  rows="5"
                                  placeholder='{"type": "Point", "coordinates": [106.816666, -6.200000]}'>{{ old('geojson') }}</textarea>
                        @error('geojson')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                        <small style="color: #718096;">Format GeoJSON untuk data geografis lanjutan</small>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="button button-primary">
                            <i class="fas fa-save me-2"></i> Simpan Lokasi
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
