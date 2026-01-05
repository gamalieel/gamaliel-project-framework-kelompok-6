@extends('layouts.poseify')

@section('title', 'Data Progress Proyek')

@section('cta_button')
    <a class="btn btn-outline-primary border-2" href="{{ route('progres_proyek.create') }}">
        <i class="fa fa-plus me-2"></i>Tambah Progress
    </a>
@stop

@section('content_header')
    <h1>Data Progress Proyek</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0" style="width:auto;">List Progress Proyek</h3>
            <a href="{{ route('progres_proyek.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Progress
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Proyek</th>
                            <th>Tahap</th>
                            <th>Persen Real</th>
                            <th>Tanggal</th>
                            <th>Catatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($progress as $item)
                            <tr>
                                <td>{{ $item->proyek->nama_proyek ?? '-' }}</td>
                                <td>{{ $item->tahapan->nama_tahap ?? '-' }}</td>
                                <td>{{ $item->persen_real }}%</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->catatan }}</td>
                                <td class="text-nowrap">
                                    <a href="{{ route('progres_proyek.show', $item) }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('progres_proyek.edit', $item->progres_id) }}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('progres_proyek.destroy', $item->progres_id) }}" method="POST"
                                          style="display:inline-block"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data progress</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $progress->links() }}
            </div>
        </div>
    </div>
@stop