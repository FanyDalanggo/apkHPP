@extends('layouts.app')

@section('title', 'Biaya Overhead')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Biaya Overhead</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Biaya Overhead</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Biaya Overhead</h2>
                <div class="card">
                    <form action="{{ route('biaya_overhead.update', $data) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Biaya Overhead</label>
                                <input type="text" name="jenis_biaya" class="form-control"
                                    value="{{ old('nama', $data->jenis_biaya) }}" required>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="text" name="jumlah" class="form-control"
                                    value="{{ old('nama', $data->jumlah) }}" required>
                            </div>
                      </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('biaya_overhead.index') }}" class="btn btn-primary">
                                <i class="fas fa-arrow-left" style="margin-right: 5px;"></i>Back</a>
                            <span style="margin-right: 5px;"></span>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-sync" style="margin-right: 5px;"></i>Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
