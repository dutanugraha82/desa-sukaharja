@extends('UserPages.master')
@section('title')
    Layanan Desa
@endsection
@section('content')
    <div class="container">
        <h4 class="text-center">Layanan Desa Sukaharja</h4>
        <hr>
        <div class="container-fluid">
            <div class="row" style="margin-top: 3rem;">
                <div class="col-6 col-md-4 text-center mb-3">
                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#layanan-surat">
                        Launch demo modal
                      </button> --}}
                    <a class="btn" data-bs-toggle="modal" data-bs-target="#layanan-surat">
                    <i class='bx bx-envelope fs-icon'></i>
                    <p>Layanan Surat</p>
                    </a>
                </div>
                <div class="col-6 col-md-4 text-center mb-3">
                    <i class='bx bxs-user-badge fs-icon'></i>
                    <p>Data Penduduk</p>
                </div>
                <div class="col-6 col-md-4 text-center mb-3">
                    <i class='bx bxs-user-plus fs-icon'></i>
                    <p>Laporan Pendatang</p>
                </div>
                <div class="col-6 col-md-4 text-center mb-3">
                    <i class='bx bx-mail-send fs-icon'></i>
                    <p>Saran Untuk Desa</p>
                </div>
                <div class="col-6 col-md-4 text-center mb-3">
                    <i class='bx bx-send fs-icon'></i>
                    <p>Pengajuan Produk UMKM</p>
                </div>
                <div class="col-6 col-md-4 text-center mb-3">
                    <i class='bx bx-trophy fs-icon'></i>
                    <p>Prestasi Desa</p>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Layanan-Surat --}}
    <div class="modal fade" id="layanan-surat" tabindex="-1" aria-labelledby="layanan-surat" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="layanan-surat">Layanan Surat</h5>
         
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-around">
                    <a class="btn btn-primary" href="/ktm" style="width: 100px">KTM</a>
                </div>
                <div class="d-flex justify-content-around mt-3">
                    <a class="btn btn-primary" href="#" style="width: 120px">SKU Dalam</a>
                    <a class="btn btn-primary" href="#" style="width: 120px">SKU Luar</a>
                </div>
                
            </div>
            <div class="modal-footer">
                <p>Klik dimana saja untuk menutup</p>
            </div>
        </div>
        </div>
    </div>
@endsection