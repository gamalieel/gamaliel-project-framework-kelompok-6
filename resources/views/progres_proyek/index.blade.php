@extends('layouts.nova')

@section('title', 'Data Progress Proyek')

@section('content')
<section style="padding: 40px 0;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-30">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Progress Proyek</li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-30">
            <div>
                <h2 class="mb-10"><i class="fas fa-chart-line me-2" style="color: var(--primary-color);"></i>Data Progress Proyek</h2>
                <p style="color: #718096;"><i class="fas fa-info-circle me-1"></i>Lihat progres realisasi setiap tahapan proyek</p>
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
                <h5 style="margin: 0; color: white;"><i class="fas fa-chart-bar me-2"></i>Daftar Progress Proyek</h5>
            </div>
            <div class="card-body">
                @if($progress->count() > 0)
                    <div class="table-responsive">
                        <table class="table" style="margin: 0;">
                            <thead style="background: #F7FAFC;">
                                <tr>
                                    <th style="border: 1px solid #E2E8F0;"><i class="fas fa-building me-1"></i>Proyek</th>
                                    <th style="border: 1px solid #E2E8F0;"><i class="fas fa-tasks me-1"></i>Tahapan</th>
                                    <th style="border: 1px solid #E2E8F0; text-align: center;"><i class="fas fa-percentage me-1"></i>Realisasi %</th>
                                    <th style="border: 1px solid #E2E8F0; text-align: center;"><i class="fas fa-calendar me-1"></i>Tanggal</th>
                                    <th style="border: 1px solid #E2E8F0; text-align: center;"><i class="fas fa-tools me-1"></i>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($progress as $item)
                                    <tr style="transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#F7FAFC'" onmouseout="this.style.backgroundColor='white'">
                                        <td style="border: 1px solid #E2E8F0; vertical-align: middle;">
                                            <strong><i class="fas fa-cube me-2" style="color: var(--primary-color);"></i>{{ $item->proyek->nama_proyek ?? '-' }}</strong>
                                        </td>
                                        <td style="border: 1px solid #E2E8F0; vertical-align: middle;">
                                            <i class="fas fa-layer-group me-2" style="color: #718096;"></i>{{ $item->tahapan->nama_tahap ?? '-' }}
                                        </td>
                                        <td style="border: 1px solid #E2E8F0; text-align: center; vertical-align: middle;">
                                            <div style="width: 100%; background: #E2E8F0; border-radius: 20px; overflow: hidden; height: 28px; display: flex; align-items: center;">
                                                <div style="background: linear-gradient(90deg, var(--primary-color), var(--secondary-color)); width: {{ $item->persen_real }}%; height: 100%; display: flex; align-items: center; justify-content: center; color: white; font-size: 12px; font-weight: 600;">
                                                    {{ $item->persen_real }}%
                                                </div>
                                            </div>
                                        </td>
                                        <td style="border: 1px solid #E2E8F0; text-align: center; vertical-align: middle;">
                                            <i class="fas fa-calendar-alt me-2" style="color: #718096;"></i>{{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d M Y') : '-' }}
                                        </td>
                                        <td style="border: 1px solid #E2E8F0; text-align: center; vertical-align: middle;">
                                            <a href="{{ route('progres_proyek.show', $item->progres_id) }}" class="button button-small" title="Lihat Detail" style="padding: 8px 12px; background: var(--primary-color); color: white; border-radius: 5px; font-size: 14px; display: inline-flex; align-items: center; justify-content: center; vertical-align: middle;">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div style="text-align: center; padding: 40px;">
                        <i class="fas fa-folder-open" style="font-size: 48px; color: #CBD5E0; margin-bottom: 20px; display: block;"></i>
                        <p style="color: #718096; margin-bottom: 20px;"><strong>Belum ada data progress proyek</strong></p>
                        <p style="color: #A0AEC0; margin-bottom: 30px; font-size: 14px;">Tidak ada data progress untuk ditampilkan</p>
                    </div>
                @endif
                <nav aria-label="Page navigation" class="mt-20">
                    {{ $progress->links() }}
                </nav>
            </div>
        </div>
    </div>
</section>
@endsection
