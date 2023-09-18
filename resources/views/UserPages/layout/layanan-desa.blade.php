@extends('UserPages.master')
@section('title')
    Layanan Desa
@endsection
@section('content')
<div class="container" data-aos="flip-right" data-aos-delay="30"
    data-aos-duration="1500" style="margin-top: 8rem">
    <div class="card card-body blur shadow-blur mx-3 mx-md-4">
        <h4 class="text-center ">Layanan Desa Sukaharja</h4>
        <hr>
        <div class="container-fluid">
            <div class="row" style="margin-top: 3rem;">
                <div class="col-6 col-md-4 text-center text-dark mb-3">
                    <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#layananSurat">
                        <i class='bx bx-envelope fs-icon'></i>
                        <p>Layanan Surat</p>
                      </a>
                </div>
                <div class="col-6 col-md-4 text-center text-dark mb-3">
                    <a href="/data-penduduk" class="nav-link">
                    <i class='bx bxs-user-badge fs-icon'></i>
                    <p>Data Penduduk</p>
                    </a>
                </div>
                <div class="col-6 col-md-4 text-center text-dark mb-3">
                    <a href="#" class=" nav-link">
                    <i class='bx bxs-user-plus fs-icon'></i>
                    <p>Laporan Pendatang</p>
                    </a>
                </div>
                <div class="col-6 col-md-4 text-center text-dark mb-3">
                    <a href="/saran" class=" nav-link">
                    <i class='bx bx-mail-send fs-icon'></i>
                    <p>Saran Untuk Desa</p>
                    </a>
                </div>
                <div class="col-6 col-md-4 text-center text-dark mb-3">
                    <a href="/pengajuan-umkm" class="nav-link ">
                        <i class='bx bx-send fs-icon'></i>
                        <p>Pengajuan Produk UMKM</p>
                    </a>
                </div>
                <div class="col-6 col-md-4 text-center text-dark mb-3">
                    <a href="#" class=" nav-link">
                    <i class='bx bx-trophy fs-icon'></i>
                    <p>Prestasi Desa</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Layanan-Surat --}}
</div>

    <div class="modal fade" id="layananSurat" tabindex="-1" aria-labelledby="layananSurat" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="layananSurat">Layanan Surat</h5>
         
            </div>
            <div class="modal-body text-center d-block">
                <a class="mb-4 btn btn-info" style="width: 10rem" href="/ktm">Surat Keterangan Tidak Mampu</a><br>
                <a class="mb-4 btn btn-info" style="width: 10rem" href="/sku-dalam">Surat Keterangan Usaha (dalam)</a><br>
                <a class="mb-4 btn btn-info" style="width: 10rem" href="/sku-luar">Surat Keterangan Usaha (luar)</a><br>
                <a class="mb-4 btn btn-info" style="width: 10rem" href="#">Surat Keterangan Domisili Dalam</a><br>
                <a class="mb-4 btn btn-info" style="width: 10rem" href="#">Surat Keterangan Sudah Menikah</a><br>
                <a class="mb-4 btn btn-info" style="width: 10rem" href="#">Surat Keterangan Umum</a><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
        </div>
    </div>
        
@endsection