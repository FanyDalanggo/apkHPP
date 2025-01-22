@extends('layouts.app')

@section('title', 'Biaya Tetap')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Biaya Tetap</h1>
                <div class="section-header-button">
                    <a href="{{ route('biaya_tetap.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus" style="margin-right: 5px;"></i>Add New
                    </a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('biaya_tetap.index') }}">Biaya Tetap</a></div>
                    <div class="breadcrumb-item">All Biaya Tetap</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="GET" action="{{ route('biaya_tetap.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search by Jenis Biaya"
                                                name="nama" value="{{ request('nama') }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>
                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Jenis Biaya</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                            <th>aksi</th>
                                        </tr>
                                        @foreach ($biaya_tetap as $bt)
                                            <tr class="text-center">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $bt->jenis_biaya }}</td>
                                                <td class="text-center">{{ number_format($bt->jumlah, 0, ',', '.') }}</td>
                                                <td class="text-center">{{ number_format($bt->harga, 0, ',', '.') }}</td>
                                                <td class="text-center">{{ number_format($bt->total, 0, ',', '.') }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('biaya_tetap.edit', $bt->id) }}"
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('biaya_tetap.destroy', $bt->id) }}"
                                                            method="POST" class="ml-2">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    <div class="card-footer text-right">
                                        <nav class="d-inline-block">
                                            <ul class="pagination mb-0">
                                                <li class="page-item {{ $biaya_tetap->onFirstPage() ? 'disabled' : '' }}">
                                                    <a class="page-link" href="{{ $biaya_tetap->previousPageUrl() }}"
                                                        tabindex="-1">
                                                        <i class="fas fa-chevron-left"></i>
                                                    </a>
                                                </li>

                                                @for ($i = 1; $i <= $biaya_tetap->lastPage(); $i++)
                                                    <li
                                                        class="page-item {{ $biaya_tetap->currentPage() == $i ? 'active' : '' }}">
                                                        <a class="page-link"
                                                            href="{{ $biaya_tetap->url($i) }}">{{ $i }}</a>
                                                    </li>
                                                @endfor

                                                <li class="page-item {{ $biaya_tetap->hasMorePages() ? '' : 'disabled' }}">
                                                    <a class="page-link" href="{{ $biaya_tetap->nextPageUrl() }}">
                                                        <i class="fas fa-chevron-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.querySelector('input[name="nama"]');
            const searchForm = searchInput.closest('form');

            searchInput.addEventListener('input', function() {
                if (searchInput.value.trim() === "") {
                    searchForm.submit();
                }
            });
        });
    </script>
@endsection

@push('scripts')
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
