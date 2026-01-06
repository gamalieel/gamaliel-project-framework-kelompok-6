@extends('layouts.nova')

@section('title', 'Detail Kontraktor - ' . $kontraktor->nama)

@section('content')
<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('kontraktor.index') }}">Kontraktor</a></li>
                            <li class="breadcrumb-item active">{{ $kontraktor->nama ?: 'Detail Kontraktor' }}</li>
                        </ol>
                    </nav>
                    <h2 class="mb-1">Detail Kontraktor</h2>
                    <p class="text-muted mb-0">Informasi lengkap kontraktor dan proyek terkait</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('kontraktor.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Informasi Kontraktor -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <div class="avatar-lg bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                            <i class="fas fa-building fa-2x"></i>
                        </div>
                        <h4 class="mb-1">{{ $kontraktor->nama ?: 'Tidak ada data' }}</h4>
                        <p class="text-muted">Kontraktor Proyek</p>
                    </div>

                    <div class="mb-4">
                        <h6 class="text-uppercase text-muted mb-3">Informasi Kontak</h6>
                        
                        <div class="mb-3">
                            <label class="form-label text-muted">Penanggung Jawab</label>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-user text-primary me-2"></i>
                                <strong>{{ $kontraktor->penanggung_jawab ?: 'Tidak ada data' }}</strong>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Kontak</label>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-phone text-primary me-2"></i>
                                @if($kontraktor->kontak)
                                    <a href="tel:{{ $kontraktor->kontak }}" class="text-primary">
                                        {{ $kontraktor->kontak }}
                                    </a>
                                @else
                                    <span class="text-muted">Tidak ada data</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Alamat</label>
                            <div class="d-flex align-items-start">
                                <i class="fas fa-map-marker-alt text-primary me-2 mt-1"></i>
                                <div>
                                    {{ $kontraktor->alamat ?: 'Tidak ada data' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detail Proyek Utama -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">
                        <i class="fas fa-folder-open text-primary me-2"></i>
                        Detail Proyek
                    </h5>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Nama Proyek</label>
                                <div><strong>{{ $kontraktor->proyek->nama_proyek ?? 'Tidak ada data' }}</strong></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Kode Proyek</label>
                                <div><strong>{{ $kontraktor->proyek->kode_proyek ?? 'Tidak ada data' }}</strong></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Tanggal Mulai</label>
                                <div>
                                    @if($kontraktor->proyek && $kontraktor->proyek->tanggal_mulai)
                                        <i class="fas fa-calendar text-success me-1"></i>
                                        {{ \Carbon\Carbon::parse($kontraktor->proyek->tanggal_mulai)->format('d F Y') }}
                                    @else
                                        <span class="text-muted">Tidak ada data</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Tanggal Selesai</label>
                                <div>
                                    @if($kontraktor->proyek && $kontraktor->proyek->tanggal_selesai)
                                        <i class="fas fa-calendar text-danger me-1"></i>
                                        {{ \Carbon\Carbon::parse($kontraktor->proyek->tanggal_selesai)->format('d F Y') }}
                                    @else
                                        <span class="text-muted">Tidak ada data</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Nilai Kontrak</label>
                                <div>
                                    @if($kontraktor->proyek && $kontraktor->proyek->nilai_kontrak)
                                        <strong class="text-success">
                                            <i class="fas fa-money-bill text-success me-1"></i>
                                            Rp {{ number_format($kontraktor->proyek->nilai_kontrak, 0, ',', '.') }}
                                        </strong>
                                    @else
                                        <span class="text-muted">Tidak ada data</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Sumber Dana</label>
                                <div>
                                    @if($kontraktor->proyek && $kontraktor->proyek->sumber_dana)
                                        <span class="badge badge-primary">{{ $kontraktor->proyek->sumber_dana }}</span>
                                    @else
                                        <span class="text-muted">Tidak ada data</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted">Deskripsi Proyek</label>
                        <div>{{ $kontraktor->proyek->deskripsi ?? 'Tidak ada deskripsi' }}</div>
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        @if($kontraktor->proyek)
                            <a href="{{ route('proyek.show', $kontraktor->proyek->proyek_id) }}" class="btn btn-primary">
                                <i class="fas fa-eye"></i> Lihat Detail Proyek
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Proyek Lain dari Kontraktor yang Sama -->
            @if($otherProjects->count() > 0)
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title mb-4">
                            <i class="fas fa-list text-primary me-2"></i>
                            Proyek Lain dari {{ $kontraktor->nama }}
                        </h5>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Proyek</th>
                                        <th>Kode</th>
                                        <th>Periode</th>
                                        <th>Nilai Kontrak</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($otherProjects as $project)
                                        <tr>
                                            <td><strong>{{ $project->proyek->nama_proyek ?? 'Tidak ada data' }}</strong></td>
                                            <td>{{ $project->proyek->kode_proyek ?? '-' }}</td>
                                            <td>
                                                @if($project->proyek && $project->proyek->tanggal_mulai)
                                                    <small>
                                                        {{ \Carbon\Carbon::parse($project->proyek->tanggal_mulai)->format('d/m/Y') }}
                                                        @if($project->proyek->tanggal_selesai)
                                                            - {{ \Carbon\Carbon::parse($project->proyek->tanggal_selesai)->format('d/m/Y') }}
                                                        @endif
                                                    </small>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($project->proyek && $project->proyek->nilai_kontrak)
                                                    <strong class="text-success">Rp {{ number_format($project->proyek->nilai_kontrak, 0, ',', '.') }}</strong>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('kontraktor.show', $project->kontraktor_id) }}" 
                                                   class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-eye"></i> Lihat
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
.avatar-lg {
    width: 80px;
    height: 80px;
    font-size: 24px;
}
</style>
@endsection