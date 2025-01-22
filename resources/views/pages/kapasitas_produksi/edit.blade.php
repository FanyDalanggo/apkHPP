@extends('layouts.app')

@section('title', 'Kapasitas Produksi')

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
                    <div class="breadcrumb-item">Kapasitas Produksi</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Kapasitas Produksi</h2>
                <div class="card">
                    <form action="{{ route('kapasitas_produksi.update', $kapasitas_produksi->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Edit Kapasitas Produksi</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <select class="form-control" name="produks_id">
                                    <option value="" disabled>Pilih</option>
                                    @foreach ($produk as $p)
                                        <option value="{{ $p->id }}"
                                            {{ $p->id == $kapasitas_produksi->produks_id ? 'selected' : '' }}>
                                            {{ $p->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Kapasitas Perhari</label>
                                <input type="text" name="kapasitas_perhari"
                                    class="form-control @error('kapasitas_perhari') is-invalid @enderror"
                                    value="{{ old('kapasitas_perhari', $kapasitas_produksi->kapasitas_perhari) }}">
                                @error('kapasitas_perhari')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Kapasitas Perbulan</label>
                                <input type="text" name="kapasitas_perbulan"
                                    class="form-control @error('kapasitas_perbulan') is-invalid @enderror"
                                    value="{{ old('kapasitas_perbulan', $kapasitas_produksi->kapasitas_perbulan) }}">
                                @error('kapasitas_perbulan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Jumlah Hari Kerja</label>
                                <input type="text" name="jumlah_hari_kerja"
                                    class="form-control @error('jumlah_hari_kerja') is-invalid @enderror"
                                    value="{{ old('jumlah_hari_kerja', $kapasitas_produksi->jumlah_hari_kerja) }}">
                                @error('jumlah_hari_kerja')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('kapasitas_produksi.index') }}" class="btn btn-primary">
                                <i class="fas fa-arrow-left" style="margin-right: 5px;"></i>Back
                            </a>
                            <span style="margin-right: 5px;"></span>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane" style="margin-right: 5px;"></i>Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
