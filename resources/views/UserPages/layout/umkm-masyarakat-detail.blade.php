@extends('UserPages.master')
@section('title')
    (Nama Produk)
@endsection
@section('content')
    <div class="container">
        <div class="row p-2">
            <div class="col-md-6 mb-3 mb-md-0">
                <img src="{{ asset('/storage'.'/'.$umkm->logo) }}" class="d-block mx-auto" style="max-width:20rem" alt="foto-produk" >
            </div>
            <div class="col-md-6 align-self-center">
                <h4 class="text-white">{{ $umkm->nama_umkm }}</h4>
                <p class="text-white" style="text-align: justify">{{ $umkm->deskripsi }}</p>
                <div class="card">
                    <div class="card-header">
                        <p>Info UMKM</p>
                    </div>
                    <div class="p-2">  
                        <p>Nama Pemilik : {{ $umkm->nama_pemilik }}</p>
                        <p>Alamat : {{ $umkm->alamat }}</p>
                        <div class="d-flex gap-4">
                            <a class="text-success" href="https://wa.me/{{ $umkm->nohp }}">
                                <i class='bx bxl-whatsapp fs-icon'></i>
                            </a>
                            <h5 class="d-flex align-items-center">{{ $umkm->nohp }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h5 class="text-center text-white mt-3 mb-5">Produk Kami :</h5>

    <div class="container mb-4">
        <div class="row">
            @foreach ($gambarProduk as $item)
            <div class="col-md-4 mb-4 mb-md-0">
                    <img class="d-block mx-auto" style="max-width:16rem; max-height:16rem;object-fit: contain" src="{{ asset('/storage'.'/'.$item->gambar_produk) }}" alt="gambar-produk">
            </div>
            @endforeach
        </div>
    </div>
@endsection