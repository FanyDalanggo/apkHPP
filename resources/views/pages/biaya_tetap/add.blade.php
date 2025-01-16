@extends('layouts.app')

@section('title', 'Biaya Tetap')

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
                <h1>Biaya Tetap</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Biaya Tetap</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Biaya Tetap</h2>
                <div class="card">
                    <form action="{{ route('biaya_tetap.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Jenis Biaya</label>
                                <input type="text" name="jenis_biaya"
                                    class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" name="jumlah"
                                    class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" name="harga"
                                    class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Total</label>
                                <input type="number" name="total"
                                    class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <a href="{{ route('biaya_tetap.index') }}" class="btn btn-primary">
                                <i class="fas fa-arrow-left" style="margin-right: 5px;"></i>Back</a>
                                <span style="margin-right: 5px;"></span>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane" style="margin-right: 5px;"></i>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
@endpush


