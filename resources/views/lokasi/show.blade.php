@extends('layouts.nova')

@section('title', 'Detail Lokasi Proyek')

@section('content')
<section style="padding: 40px 0;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-30">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('lokasi.index') }}">Lokasi Proyek</a></li>
                <li class="breadcrumb-item active">Detail Lokasi</li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="mb-30">
            <h2 class="mb-10">Detail Lokasi Proyek</h2>
            <p style="color: #718096;">Informasi lengkap lokasi geografis proyek</p>
        </div>

        <!-- Detail Card -->
        <div class="card">
            <div class="card-header" style="background: linear-gradient(135deg, #4C6EF5 0%, #748FFC 100%); border-bottom: 1px solid #E2E8F0; padding: 20px; border-radius: 8px 8px 0 0;">
                <h5 style="margin: 0; color: white;"><i class="fas fa-map-marker-alt me-2"></i>{{ $lokasi->proyek->nama_proyek ?? 'Lokasi Proyek' }}</h5>
            </div>
            <div class="card-body" style="padding: 30px;">
                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <!-- ID Lokasi -->
                        <div class="mb-25">
                            <label style="display: block; margin-bottom: 8px; color: #718096; font-weight: 600; font-size: 12px; text-transform: uppercase;">
                                <i class="fas fa-hashtag me-1"></i>ID Lokasi
                            </label>
                            <div style="background-color: #F7FAFC; padding: 12px; border-radius: 6px; border: 1px solid #E2E8F0;">
                                <span style="color: #2D3748; font-weight: 600; font-size: 16px;">{{ $lokasi->lokasi_id }}</span>
                            </div>
                        </div>

                        <!-- Proyek -->
                        <div class="mb-25">
                            <label style="display: block; margin-bottom: 8px; color: #718096; font-weight: 600; font-size: 12px; text-transform: uppercase;">
                                <i class="fas fa-building me-1"></i>Proyek
                            </label>
                            <div style="background-color: #F7FAFC; padding: 12px; border-radius: 6px; border: 1px solid #E2E8F0;">
                                <span style="color: #2D3748; font-weight: 600;">{{ $lokasi->proyek->nama_proyek ?? 'N/A' }}</span>
                                @if($lokasi->proyek)
                                    <br>
                                    <small style="color: #718096;">Kode: {{ $lokasi->proyek->kode_proyek }}</small>
                                @endif
                            </div>
                        </div>

                        <!-- Latitude -->
                        <div class="mb-25">
                            <label style="display: block; margin-bottom: 8px; color: #718096; font-weight: 600; font-size: 12px; text-transform: uppercase;">
                                <i class="fas fa-location-dot me-1"></i>Latitude
                            </label>
                            <div style="background-color: #F7FAFC; padding: 12px; border-radius: 6px; border: 1px solid #E2E8F0;">
                                <code style="color: #2D3748; font-weight: 600;">{{ $lokasi->lat }}</code>
                            </div>
                        </div>

                        <!-- Longitude -->
                        <div class="mb-25">
                            <label style="display: block; margin-bottom: 8px; color: #718096; font-weight: 600; font-size: 12px; text-transform: uppercase;">
                                <i class="fas fa-location-dot me-1"></i>Longitude
                            </label>
                            <div style="background-color: #F7FAFC; padding: 12px; border-radius: 6px; border: 1px solid #E2E8F0;">
                                <code style="color: #2D3748; font-weight: 600;">{{ $lokasi->lng }}</code>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        <!-- GeoJSON -->
                        <div class="mb-25">
                            <label style="display: block; margin-bottom: 8px; color: #718096; font-weight: 600; font-size: 12px; text-transform: uppercase;">
                                <i class="fas fa-code me-1"></i>GeoJSON
                            </label>
                            @if($lokasi->geojson)
                                <div style="background-color: #EDF2F7; padding: 12px; border-radius: 6px; border: 1px solid #E2E8F0; max-height: 200px; overflow-y: auto; font-family: 'Courier New', monospace; font-size: 12px;">
                                    <span style="color: #2D3748;">{{ $lokasi->geojson }}</span>
                                </div>
                            @else
                                <div style="background-color: #F7FAFC; padding: 12px; border-radius: 6px; border: 1px solid #E2E8F0;">
                                    <span style="color: #718096; font-style: italic;">Belum ada data GeoJSON</span>
                                </div>
                            @endif
                        </div>

                        <!-- Created At -->
                        <div class="mb-25">
                            <label style="display: block; margin-bottom: 8px; color: #718096; font-weight: 600; font-size: 12px; text-transform: uppercase;">
                                <i class="fas fa-calendar-alt me-1"></i>Dibuat
                            </label>
                            <div style="background-color: #F7FAFC; padding: 12px; border-radius: 6px; border: 1px solid #E2E8F0;">
                                <span style="color: #2D3748;">{{ $lokasi->created_at->format('d M Y H:i') }}</span>
                            </div>
                        </div>

                        <!-- Updated At -->
                        <div class="mb-25">
                            <label style="display: block; margin-bottom: 8px; color: #718096; font-weight: 600; font-size: 12px; text-transform: uppercase;">
                                <i class="fas fa-sync-alt me-1"></i>Diperbarui
                            </label>
                            <div style="background-color: #F7FAFC; padding: 12px; border-radius: 6px; border: 1px solid #E2E8F0;">
                                <span style="color: #2D3748;">{{ $lokasi->updated_at->format('d M Y H:i') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="d-flex gap-2 mt-30">
                    <a href="{{ route('lokasi.index') }}" class="button button-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
