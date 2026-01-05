@extends('layouts.nova')

@section('title', 'Data Tahapan Proyek')

@section('content')
<section style="padding: 40px 0;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-30">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Tahapan Proyek</li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-30">
            <div>
                <h2 class="mb-10"><i class="fas fa-tasks me-2" style="color: var(--primary-color);"></i>Data Tahapan Proyek</h2>
                <p style="color: #718096;"><i class="fas fa-info-circle me-1"></i>Lihat tahapan untuk setiap proyek pembangunan</p>
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
            <div class="card-header" style="background: linear-gradient(135deg, #4C6EF5 0%, #748FFC 100%); border-bottom: 1px solid #E2E8F0; padding: 20px; border-radius: 8px 8px 0 0;">
                <h5 style="margin: 0; color: white;"><i class="fas fa-list me-2"></i>Daftar Tahapan Proyek</h5>
            </div>
            <div class="card-body">
                @if($tahapans->count() > 0)
                    <div class="table-responsive">
                        <table class="table" style="margin: 0;">
                            <thead style="background: #F7FAFC;">
                                <tr>
                                    <th style="border: 1px solid #E2E8F0;"><i class="fas fa-clipboard-list me-1"></i>Nama Tahapan</th>
                                    <th style="border: 1px solid #E2E8F0;"><i class="fas fa-building me-1"></i>Proyek</th>
                                    <th style="border: 1px solid #E2E8F0; text-align: center;"><i class="fas fa-percentage me-1"></i>Target %</th>
                                    <th style="border: 1px solid #E2E8F0; text-align: center;"><i class="fas fa-calendar me-1"></i>Tanggal Mulai</th>
                                    <th style="border: 1px solid #E2E8F0; text-align: center;"><i class="fas fa-tools me-1"></i>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tahapans as $tahapan)
                                    <tr style="transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#F7FAFC'" onmouseout="this.style.backgroundColor='white'">
                                        <td style="border: 1px solid #E2E8F0; vertical-align: middle;">
                                            <strong><i class="fas fa-check-square me-2" style="color: var(--primary-color);"></i>{{ $tahapan->nama_tahap }}</strong>
                                        </td>
                                        <td style="border: 1px solid #E2E8F0; vertical-align: middle;">
                                            <i class="fas fa-project-diagram me-2" style="color: #718096;"></i>{{ $tahapan->proyek->nama_proyek ?? '-' }}
                                        </td>
                                        <td style="border: 1px solid #E2E8F0; text-align: center; vertical-align: middle;">
                                            <span class="badge" style="background: linear-gradient(135deg, #4C6EF5 0%, #748FFC 100%); color: white; padding: 8px 12px; border-radius: 20px; font-size: 12px;">
                                                <i class="fas fa-chart-pie me-1"></i>{{ $tahapan->target_persen }}%
                                            </span>
                                        </td>
                                        <td style="border: 1px solid #E2E8F0; text-align: center; vertical-align: middle;">
                                            <i class="fas fa-calendar-alt me-2" style="color: #718096;"></i>{{ $tahapan->tgl_mulai ? \Carbon\Carbon::parse($tahapan->tgl_mulai)->format('d M Y') : '-' }}
                                        </td>
                                        <td style="border: 1px solid #E2E8F0; text-align: center; vertical-align: middle;">
                                            <a href="{{ route('tahapan_proyek.show', $tahapan->tahap_id) }}" class="button button-small" title="Lihat Detail" style="padding: 8px 12px; background: var(--primary-color); color: white; border-radius: 5px; font-size: 14px; display: inline-flex; align-items: center; justify-content: center; vertical-align: middle;">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div style="text-align: center; padding: 40px;">
                        <i class="fas fa-folder-open" style="font-size: 48px; color: #CBD5E0; margin-bottom: 20px; display: block;"></i>
                        <p style="color: #718096; margin-bottom: 20px;"><strong>Belum ada tahapan proyek</strong></p>
                        <p style="color: #A0AEC0; margin-bottom: 30px; font-size: 14px;">Tidak ada data tahapan untuk ditampilkan</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
