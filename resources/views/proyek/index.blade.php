@extends('layouts.nova')

@section('title', 'Data Proyek')

@section('content')
<section style="padding: 40px 0;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-30">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Proyek</li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-30">
            <div>
                <h2 class="mb-10">Data Proyek</h2>
                <p style="color: #718096;">Lihat semua proyek pembangunan</p>
            </div>
        </div>

        <!-- Alert -->
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            </div>
        @endif

        <!-- Filter Card -->
        <div class="card mb-30">
            <div class="card-header" style="background: #F7FAFC; border-bottom: 1px solid #E2E8F0; padding: 20px;">
                <h5 style="margin: 0; color: #2D3748;">Filter Data</h5>
            </div>
            <div class="card-body">
                <form class="row g-3" method="GET" action="{{ route('proyek.index') }}">
                    <div class="col-md-4">
                        <label class="form-label" style="font-weight: 600; color: #2D3748;">Cari Proyek</label>
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                               placeholder="Cari nama atau kode proyek">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" style="font-weight: 600; color: #2D3748;">Tahun</label>
                        <select name="tahun" class="form-control">
                            <option value="">-- Semua Tahun --</option>
                            @foreach($tahuns as $tahun)
                                <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" style="font-weight: 600; color: #2D3748;">Sumber Dana</label>
                        <select name="sumber_dana" class="form-control">
                            <option value="">-- Semua Sumber Dana --</option>
                            @foreach($sumberDanas as $sd)
                                <option value="{{ $sd }}" {{ request('sumber_dana') == $sd ? 'selected' : '' }}>{{ $sd }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 d-flex gap-2 align-items-end">
                        <button class="btn btn-primary w-100" type="submit">
                            <i class="fas fa-search me-2"></i> Filter
                        </button>
                        <a href="{{ route('proyek.index') }}" class="btn btn-secondary w-100">
                            <i class="fas fa-redo me-2"></i> Reset
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Data Grid -->
        <div class="row g-4">
            @forelse ($proyeks as $proyek)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%); color: white; padding: 20px; border-radius: 8px 8px 0 0;">
                            <div class="d-flex justify-content-between align-items-start mb-10">
                                <div>
                                    <h5 style="margin: 0; color: white;">{{ $proyek->nama_proyek }}</h5>
                                    <small style="color: rgba(255,255,255,0.8);">{{ $proyek->kode_proyek }}</small>
                                </div>
                                <span class="badge" style="background: rgba(255,255,255,0.2); color: white;">{{ $proyek->tahun }}</span>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="mb-15">
                                <small style="color: #718096; font-weight: 600;">LOKASI</small>
                                <p style="margin: 5px 0 0; color: #2D3748;">{{ $proyek->lokasi }}</p>
                            </div>

                            <div class="mb-15">
                                <small style="color: #718096; font-weight: 600;">ANGGARAN</small>
                                <p style="margin: 5px 0 0; color: #2D3748; font-weight: 600;">Rp {{ number_format($proyek->anggaran, 0, ',', '.') }}</p>
                            </div>

                            <div class="mb-15">
                                <small style="color: #718096; font-weight: 600;">SUMBER DANA</small>
                                <p style="margin: 5px 0 0; color: #2D3748;">{{ $proyek->sumber_dana }}</p>
                            </div>

                            @if($proyek->deskripsi)
                                <div class="mb-15">
                                    <small style="color: #718096; font-weight: 600;">DESKRIPSI</small>
                                    <p style="margin: 5px 0 0; color: #718096; font-size: 13px;">{{ Str::limit($proyek->deskripsi, 80) }}</p>
                                </div>
                            @endif

                            @if($proyek->dokumen)
                                <div class="mb-15">
                                    <a href="{{ asset('uploads/proyek/'.$proyek->dokumen) }}" target="_blank" class="button button-small button-primary" style="width: 100%; text-align: center; display: block;">
                                        <i class="fas fa-file-download me-1"></i> Download Dokumen
                                    </a>
                                </div>
                            @endif
                        </div>

                        <div class="card-footer" style="background: #F7FAFC; border-top: 1px solid #E2E8F0; display: flex; gap: 10px; padding: 15px;">
                            <a href="{{ route('proyek.show', $proyek->proyek_id) }}" class="button button-small button-primary" style="flex-grow: 1; text-align: center;" title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info" role="alert">
                        <i class="fas fa-info-circle me-2"></i> Tidak ada proyek ditemukan.
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($proyeks->hasPages())
            <div class="d-flex justify-content-center mt-40">
                {{ $proyeks->render() }}
            </div>
        @endif
    </div>
</section>
@endsection
