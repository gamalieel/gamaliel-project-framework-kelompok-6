@extends('layouts.nova')

@section('title', 'Data Kontraktor')

@section('content')
<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">Data Kontraktor</h2>
                    <p class="text-muted mb-0">Kelola informasi kontraktor dan penanggung jawab proyek</p>
                </div>
                <div class="d-flex gap-2">
                    <span class="badge badge-primary">{{ $kontraktors->total() }} Total Kontraktor</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="GET" action="{{ route('kontraktor.index') }}" class="row g-3">
                        <div class="col-md-4">
                            <label for="search" class="form-label">Pencarian</label>
                            <input type="text" class="form-control" id="search" name="search" 
                                   value="{{ request('search') }}" 
                                   placeholder="Cari nama kontraktor, penanggung jawab, atau kontak...">
                        </div>
                        <div class="col-md-3">
                            <label for="kontraktor" class="form-label">Kontraktor</label>
                            <select class="form-control" id="kontraktor" name="kontraktor">
                                <option value="">Semua Kontraktor</option>
                                @foreach($uniqueKontraktors as $nama)
                                    <option value="{{ $nama }}" {{ request('kontraktor') == $nama ? 'selected' : '' }}>
                                        {{ $nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="tahun" class="form-label">Tahun</label>
                            <select class="form-control" id="tahun" name="tahun">
                                <option value="">Semua Tahun</option>
                                @foreach($years as $year)
                                    <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <div class="d-flex gap-2 w-100">
                                <button type="submit" class="btn btn-outline-primary">
                                    <i class="fas fa-search"></i> Cari
                                </button>
                                <a href="{{ route('kontraktor.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-refresh"></i> Reset
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if($kontraktors->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kontraktor</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Kontak</th>
                                        <th>Proyek</th>
                                        <th>Periode</th>
                                        <th>Nilai Kontrak</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kontraktors as $index => $kontraktor)
                                        <tr>
                                            <td>{{ $kontraktors->firstItem() + $index }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2">
                                                        <i class="fas fa-building"></i>
                                                    </div>
                                                    <div>
                                                        <strong>{{ $kontraktor->nama ?: 'Tidak ada data' }}</strong>
                                                        @if($kontraktor->alamat)
                                                            <br><small class="text-muted">{{ Str::limit($kontraktor->alamat, 50) }}</small>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <strong>{{ $kontraktor->penanggung_jawab ?: 'Tidak ada data' }}</strong>
                                            </td>
                                            <td>
                                                @if($kontraktor->kontak)
                                                    <a href="tel:{{ $kontraktor->kontak }}" class="text-primary">
                                                        <i class="fas fa-phone"></i> {{ $kontraktor->kontak }}
                                                    </a>
                                                @else
                                                    <span class="text-muted">Tidak ada data</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div>
                                                    <strong>{{ $kontraktor->proyek->nama_proyek ?? 'Tidak ada data' }}</strong>
                                                    <br><small class="text-muted">{{ $kontraktor->proyek->kode_proyek ?? '-' }}</small>
                                                </div>
                                            </td>
                                            <td>
                                                @if($kontraktor->proyek && $kontraktor->proyek->tahun)
                                                    <span class="badge badge-primary">{{ $kontraktor->proyek->tahun }}</span>
                                                @else
                                                    <span class="text-muted">Tidak ada data</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($kontraktor->proyek && $kontraktor->proyek->anggaran)
                                                    <strong class="text-success">Rp {{ number_format($kontraktor->proyek->anggaran, 0, ',', '.') }}</strong>
                                                @else
                                                    <span class="text-muted">Tidak ada data</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex gap-1">
                                                    <a href="{{ route('kontraktor.show', $kontraktor->kontraktor_id) }}" 
                                                       class="btn btn-sm btn-outline-primary" title="Lihat Detail">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    @if($kontraktor->proyek)
                                                        <a href="{{ route('proyek.show', $kontraktor->proyek->proyek_id) }}" 
                                                           class="btn btn-sm btn-outline-success" title="Lihat Proyek">
                                                            <i class="fas fa-folder-open"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <div>
                                <p class="text-muted mb-0">
                                    Menampilkan {{ $kontraktors->firstItem() }} - {{ $kontraktors->lastItem() }} 
                                    dari {{ $kontraktors->total() }} data
                                </p>
                            </div>
                            <div>
                                {{ $kontraktors->links() }}
                            </div>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="mb-3">
                                <i class="fas fa-users fa-3x text-muted"></i>
                            </div>
                            <h5 class="text-muted">Tidak ada data kontraktor</h5>
                            <p class="text-muted">Data kontraktor tidak ditemukan atau belum ada yang sesuai dengan filter.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.avatar-sm {
    width: 40px;
    height: 40px;
    font-size: 16px;
}
</style>
@endsection