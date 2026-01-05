@extends('layouts.poseify')

@section('title', 'Data Tahapan Proyek')

@push('styles')
<style>
    .project-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        overflow: hidden;
        margin-bottom: 30px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .project-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }
    .project-card-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        padding: 20px;
    }
    .project-card-body {
        padding: 20px;
    }
    .project-info-item {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
        padding-bottom: 12px;
        border-bottom: 1px solid #f0f0f0;
    }
    .project-info-item:last-child {
        border-bottom: none;
    }
    .project-info-item i {
        color: #667eea;
        width: 25px;
        margin-right: 10px;
    }
    .project-info-label {
        font-weight: 600;
        min-width: 120px;
        color: #666;
    }
    .project-info-value {
        color: #333;
    }
    .search-filter-section {
        background: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        margin-bottom: 30px;
    }
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        padding: 60px 0;
        margin-bottom: 40px;
    }
</style>
@endpush

@section('content_header')
    <h1>Data Tahapan Proyek</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0" style="width:auto;">List Data Tahapan Proyek</h3>
            <a href="{{ route('tahapan_proyek.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Tahapan
            </a>
        </div>

        <div class="card-body">
    <div class="row">
        @forelse ($tahapans as $item)
            <div class="col-lg-4 col-md-6">
                <div class="project-card">
                    <div class="project-card-header">
                        <h5 class="mb-0">
                            <i class="fa fa-tasks me-2"></i>
                            {{ $item->nama_tahap }}
                        </h5>
                    </div>

                    <div class="project-card-body">
                        <div class="project-info-item">
                            <i class="fa fa-folder"></i>
                            <span class="project-info-label">Proyek</span>
                            <span class="project-info-value">
                                {{ $item->proyek->nama_proyek ?? '-' }}
                            </span>
                        </div>

                        <div class="project-info-item">
                            <i class="fa fa-percent"></i>
                            <span class="project-info-label">Target</span>
                            <span class="project-info-value">
                                {{ $item->target_persen }}%
                            </span>
                        </div>

                        <div class="project-info-item">
                            <i class="fa fa-calendar"></i>
                            <span class="project-info-label">Mulai</span>
                            <span class="project-info-value">
                                {{ $item->tgl_mulai }}
                            </span>
                        </div>

                        <div class="project-info-item">
                            <i class="fa fa-calendar-check"></i>
                            <span class="project-info-label">Selesai</span>
                            <span class="project-info-value">
                                {{ $item->tgl_selesai }}
                            </span>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-3">
                            <a href="{{ route('tahapan_proyek.show', $item) }}"
                               class="btn btn-sm btn-info">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a href="{{ route('tahapan_proyek.edit', $item->tahap_id) }}"
                               class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>

                            <form action="{{ route('tahapan_proyek.destroy', $item->tahap_id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Tidak ada data tahapan proyek
                </div>
            </div>
        @endforelse
    </div>


        <div class="mt-3">
            {{ $tahapans->links() }}
        </div>
    </div>
@stop

@section('js')
    <script>
        $(function() {
            $('#crudTable').DataTable({
                "paging": false, // pagination pakai Laravel
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": true,
                "info": false,
                "searching": true
            });
        });
    </script>
@stop

