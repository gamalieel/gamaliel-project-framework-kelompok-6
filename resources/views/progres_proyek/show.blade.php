@extends('layouts.poseify')

@section('title', 'Detail Progress Proyek')

@section('cta_button')
    <a class="btn btn-outline-primary border-2" href="{{ route('progres_proyek.create') }}">
        <i class="fa fa-plus me-2"></i>Tambah Progress
    </a>
@stop

@section('content_header')
    <h1>Detail Progress Proyek</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Proyek</th>
                    <td>{{ $progres_proyek->proyek->nama_proyek ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tahap</th>
                    <td>{{ $progres_proyek->tahapan->nama_tahap ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Persen Real</th>
                    <td>{{ $progres_proyek->persen_real }}%</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ $progres_proyek->tanggal }}</td>
                </tr>
                <tr>
                    <th>Catatan</th>
                    <td>{{ $progres_proyek->catatan ?? '-' }}</td>
                </tr>
            </table>
            <a href="{{ route('progres_proyek.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
@stop