@extends('layouts.nova')

@section('title', 'Data Lokasi Proyek')

@section('content')
<section style="padding: 40px 0;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-30">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Lokasi Proyek</li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-30">
            <div>
                <h2 class="mb-10">Data Lokasi Proyek</h2>
                <p style="color: #718096;">Lihat lokasi dan koordinat geografis proyek</p>
            </div>
        </div>

        <!-- Alert -->
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            </div>
        @endif

        <!-- Data Table -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead style="background-color: #F7FAFC;">
                            <tr>
                                <th style="color: #2D3748; font-weight: 600;">ID</th>
                                <th style="color: #2D3748; font-weight: 600;">Proyek</th>
                                <th style="color: #2D3748; font-weight: 600;">Latitude</th>
                                <th style="color: #2D3748; font-weight: 600;">Longitude</th>
                                <th style="color: #2D3748; font-weight: 600;">GeoJSON</th>
                                <th style="color: #2D3748; font-weight: 600;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($lokasi as $item)
                                <tr>
                                    <td>
                                        <span class="badge bg-light text-dark">{{ $item->lokasi_id }}</span>
                                    </td>
                                    <td>
                                        <strong>{{ $item->proyek->nama_proyek ?? 'N/A' }}</strong>
                                    </td>
                                    <td>
                                        <code style="background-color: #EDF2F7; padding: 4px 8px; border-radius: 4px;">{{ $item->lat }}</code>
                                    </td>
                                    <td>
                                        <code style="background-color: #EDF2F7; padding: 4px 8px; border-radius: 4px;">{{ $item->lng }}</code>
                                    </td>
                                    <td>
                                        @if($item->geojson)
                                            <span class="badge bg-success">Ada</span>
                                        @else
                                            <span class="badge bg-secondary">Belum</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('lokasi.show', $item->lokasi_id) }}"
                                               class="btn btn-sm" style="background-color: #EDF2F7; color: #2D3748;">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <i class="fas fa-map-marker-alt fa-3x" style="color: #CBD5E0; margin-bottom: 20px;"></i>
                                        <p style="color: #718096; margin: 0;">Belum ada data lokasi proyek</p>
                                        <small style="color: #A0AEC0;">Tidak ada data lokasi untuk ditampilkan</small>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
