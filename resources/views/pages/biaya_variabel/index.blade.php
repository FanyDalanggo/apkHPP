@extends('layouts.app')

@section('title', 'biaya_variabel')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Biaya Variabel</h1>
                <div class="section-header-button">
                    <a href="{{ route('biaya_variabel.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus" style="margin-right: 5px;"></i>Add New
                    </a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Biaya Variabel</a></div>
                    <div class="breadcrumb-item">All Biaya Variabel</div>
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
                                    <form method="GET" action="#">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="nama">
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
                                            <th>Satuan</th>
                                            <th>Total</th>
                                            <th>aksi</th>
                                        </tr>
                                        @foreach ($biaya_variabel as $by)
                                            <tr class="text-center">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $by->jenis_biaya }}</td>
                                                <td class="text-center">{{ number_format($by->jumlah, 0, ',', '.') }}</td>
                                                <td class="text-center">{{ number_format($by->harga, 0, ',', '.') }}</td>
                                                <td class="text-center">{{ $by->satuan }}</td>
                                                <td class="text-center">{{ number_format($by->total, 0, ',', '.') }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('biaya_variabel.edit', $by->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('biaya_variabel.destroy', $by->id) }}"
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
                                                <li
                                                    class="page-item {{ $biaya_variabel->onFirstPage() ? 'disabled' : '' }}">
                                                    <a class="page-link" href="{{ $biaya_variabel->previousPageUrl() }}"
                                                        tabindex="-1">
                                                        <i class="fas fa-chevron-left"></i>
                                                    </a>
                                                </li>

                                                @for ($i = 1; $i <= $biaya_variabel->lastPage(); $i++)
                                                    <li
                                                        class="page-item {{ $biaya_variabel->currentPage() == $i ? 'active' : '' }}">
                                                        <a class="page-link"
                                                            href="{{ $biaya_variabel->url($i) }}">{{ $i }}</a>
                                                    </li>
                                                @endfor

                                                <li
                                                    class="page-item {{ $biaya_variabel->hasMorePages() ? '' : 'disabled' }}">
                                                    <a class="page-link" href="{{ $biaya_variabel->nextPageUrl() }}">
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
@endsection

@push('scripts')
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
