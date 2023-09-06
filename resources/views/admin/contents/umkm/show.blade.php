@extends('admin.master')
@section('pageTitle')
    umkm-{{ $umkm->nama_umkm }}
@endsection
@section('content')
<div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="">NIK Pemilik UMKM<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ $umkm->nama_pemilik }}" name="nik" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="">Nama UMKM <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_umkm" value="{{ $umkm->nama_umkm }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="">No WhatsApp <span class="text-danger">*(62xxx)</span></label>
                        <input type="text" placeholder="62xxxx" class="form-control" name="nohp" value="{{ $umkm->nohp }}" readonly>
                    </div>
                    <div class="mb-3">
                        <img class="col-5" src="{{ asset('/storage'.'/'.$umkm->logo) }}" alt="logo">
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="">Alamat UMKM</label>
                        <textarea class="form-control" name="alamat" id="" cols="30" rows="10">{{ $umkm->alamat }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Deskripsi UMKM</label>
                        <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10">{{ $umkm->deskripsi }}</textarea>
                    </div>
                </div>
            </div>
            
        </div>
        <hr>
        <div class="container mb-3">
            <h5 class="text-center my-3">Produk UMKM {{ $umkm->nama_umkm }}</h5>
            <div class="row">
                @foreach ($gambarProduk as $item)
                <div class="col-md-4 mb-4">
                        <img src="{{ asset('/storage'.'/'.$item->gambar_produk) }}" class="card-img-top" style="max-height: 150px;max-width:100%;object-fit: contain" alt="gambar_produk">
                </div>
                @endforeach
            </div>
        </div>
        <div class="my-5">
            <a href="/admin/umkm" style="width: 70vw" class="btn btn-warning d-block mx-auto">Kembali</a><br>
            <form action="/admin/umkm/{{ $umkm->id }}/validasi" method="POST">
                @csrf
                @method('put')
                <button type="submit" class="btn btn-success d-block mx-auto" onclick="return confirm('Validasi {{ $umkm->nama_umkm }}')" style="width: 70vw">Validasi</button>
            </form>
        </div>
    
</div>
@endsection