@extends('layouts.app')

@section('title', 'Kapasitas Produksi')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kapasitas Produksi</h1>
                <div class="section-header-button">
                    <a href="{{ route('kapasitas_produksi.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus" style="margin-right: 5px;"></i>Add New
                    </a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Kapasitas Produksi</a></div>
                    <div class="breadcrumb-item">All Kapasitas Produksi</div>
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
                                    <form method="GET" action="{{ route('kapasitas_produksi.index') }}">
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
                                            <th>Nama Produk</th>
                                            <th>Kapasitas Perhari</th>
                                            <th>Kapasitas Perbulan</th>
                                            <th>Jumlah Hari Kerja</th>
                                            <th>aksi</th>
                                        </tr>
                                      
                                            
                                      @foreach ($kapasitas_produksi as $kp)
                                          
                                      <tr class="text-center">
                                          <td class="text-center">{{ $loop->iteration }}</td>
                                          <td class="text-center">{{ $kp->produks->nama }}</td>
                                          <td class="text-center">{{ $kp->kapasitas_perhari }}</td>
                                          <td class="text-center">{{ $kp->kapasitas_perbulan }}</td>
                                          <td class="text-center">{{ $kp->jumlah_hari_kerja }}</td>
                                          <td>
                                              <div class="d-flex justify-content-center">
                                                  <a href="#"
                                                      class="btn btn-sm btn-info btn-icon">
                                                      <i class="fas fa-edit"></i>
                                                      Edit
                                                  </a>
                                                  <form action="#"
                                                      method="POST" class="ml-2">
                                                      {{-- @csrf
                                                      @method('DELETE') --}}
                                                      <button type="submit" class="btn btn-sm btn-danger">
                                                          <i class="fas fa-times"></i> Delete
                                                      </button>
                                                  </form>
                                              </div>
                                          </td>
                                      </tr>
                                      @endforeach
                                         
                                    </table>
                                    {{-- <div class="card-footer text-right">
                                        <nav class="d-inline-block">
                                            <ul class="pagination mb-0">
                                                <li
                                                    class="page-item {{ $biaya_penyusutan->onFirstPage() ? 'disabled' : '' }}">
                                                    <a class="page-link" href="{{ $biaya_penyusutan->previousPageUrl() }}"
                                                        tabindex="-1">
                                                        <i class="fas fa-chevron-left"></i>
                                                    </a>
                                                </li>

                                                @for ($i = 1; $i <= $biaya_penyusutan->lastPage(); $i++)
                                                    <li
                                                        class="page-item {{ $biaya_penyusutan->currentPage() == $i ? 'active' : '' }}">
                                                        <a class="page-link"
                                                            href="{{ $biaya_penyusutan->url($i) }}">{{ $i }}</a>
                                                    </li>
                                                @endfor

                                                <li
                                                    class="page-item {{ $biaya_penyusutan->hasMorePages() ? '' : 'disabled' }}">
                                                    <a class="page-link" href="{{ $biaya_penyusutan->nextPageUrl() }}">
                                                        <i class="fas fa-chevron-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div> --}}
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
