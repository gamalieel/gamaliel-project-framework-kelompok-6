@extends('layouts.poseify')

@section('title', 'Edit Progress Proyek')

@section('cta_button')
    <a class="btn btn-outline-primary border-2" href="{{ route('progres_proyek.create') }}">
        <i class="fa fa-plus me-2"></i>Tambah Progress
    </a>
@stop

@section('content_header')
    <h1>Edit Progress Proyek</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('progres_proyek.update', $progres->progres_id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('progres_proyek.form')

                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fa fa-save"></i> Update
                </button>
                <a href="{{ route('progres_proyek.index') }}" class="btn btn-secondary mt-3">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
@stop
