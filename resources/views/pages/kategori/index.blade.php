@extends('layouts.app')

@section('title', 'Kategori')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kategori</h1>
                <div class="section-header-button">
                    <a href="{{ route('kategori.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus" style="margin-right: 5px;"></i>Add New
                    </a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Kategori</a></div>
                    <div class="breadcrumb-item">All Kategori</div>
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
                                    <form method="GET" action="{{ route('kategori.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="nama">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                
                                <!-- Clearfix untuk mengatur posisi elemen -->
                                <div class="clearfix mb-3"></div>
                
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($kategori as $k)
                                                <tr>
                                                    <td>{{ ($kategori->currentPage() - 1) * $kategori->perPage() + $loop->iteration }}</td>
                                                    <td>{{ $k->nama }}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-sm btn-info mr-2">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </a>
                                                            <form action="{{ route('kategori.destroy', $k->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger">
                                                                    <i class="fas fa-times"></i> Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">No data found</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                
                                <div class="card-footer text-right">
                                    <nav class="d-inline-block">
                                        <ul class="pagination mb-0">
                                            <li
                                                class="page-item {{ $kategori->onFirstPage() ? 'disabled' : '' }}">
                                                <a class="page-link" href="{{ $kategori->previousPageUrl() }}"
                                                    tabindex="-1">
                                                    <i class="fas fa-chevron-left"></i>
                                                </a>
                                            </li>

                                            @for ($i = 1; $i <= $kategori->lastPage(); $i++)
                                                <li
                                                    class="page-item {{ $kategori->currentPage() == $i ? 'active' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ $kategori->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor

                                            <li
                                                class="page-item {{ $kategori->hasMorePages() ? '' : 'disabled' }}">
                                                <a class="page-link" href="{{ $kategori->nextPageUrl() }}">
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
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
