@extends('UserPages.master')
@section('title')
    Layanan Desa
@endsection
@section('content')
    <div class="container" data-aos="flip-right" data-aos-delay="30"
    data-aos-duration="1500">
        <h4 class="text-center">Layanan Desa Sukaharja</h4>
        <hr>
        <div class="container-fluid">
            <div class="row" style="margin-top: 3rem;">
                <div class="col-6 col-md-4 text-center mb-3">
                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#layanan-surat">
                        Launch demo modal
                      </button> --}}
                    <a class="btn text-white" data-bs-toggle="modal" data-bs-target="#layanan-surat">
                    <i class='bx bx-envelope fs-icon'></i>
                    <p>Layanan Surat</p>
                    </a>
                </div>
                <div class="col-6 col-md-4 text-center mb-3">
                    <a href="/data-penduduk" class="text-white nav-link">
                    <i class='bx bxs-user-badge fs-icon'></i>
                    <p>Data Penduduk</p>
                    </a>
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
                    <a href="/pengajuan-umkm" class="nav-link text-white">
                        <i class='bx bx-send fs-icon'></i>
                        <p>Pengajuan Produk UMKM</p>
                    </a>
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
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="layanan-surat">Layanan Surat</h5>
         
            </div>
            <div class="modal-body text-center d-block">
                <a class="mb-4 btn btn-primary" style="width: 10rem" href="/ktm">Surat Keterangan Tidak Mampu</a><br>
                <a class="mb-4 btn btn-primary" style="width: 10rem" href="/sku-dalam">Surat Keterangan Usaha (dalam)</a><br>
                <a class="mb-4 btn btn-primary" style="width: 10rem" href="#">Surat Keterangan Usaha (luar)</a><br>
                <a class="mb-4 btn btn-primary" style="width: 10rem" href="#">Surat Keterangan Domisili Dalam</a><br>
                <a class="mb-4 btn btn-primary" style="width: 10rem" href="#">Surat Keterangan Sudah Menikah</a><br>
                <a class="mb-4 btn btn-primary" style="width: 10rem" href="#">Surat Keterangan Umum</a><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
        </div>
    </div>
@endsection