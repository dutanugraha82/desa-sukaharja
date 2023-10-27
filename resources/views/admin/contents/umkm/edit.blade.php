@extends('admin.master')
@section('pageTitle')
    umkm-{{ $umkm->nama_umkm }}
@endsection
@section('content')
<div class="container-fluid">
    <h5 class="text-center">Ubah Data UMKM</h5>
    <hr>
    <form class="my-4" action="/{{ auth()->user()->role }}/umkm/{{ $umkm->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <p class="text-muted text-center my-3">Form Data UMKM</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="">NIK Pemilik UMKM<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ $umkm->nama_pemilik }}" name="nik" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Nama UMKM <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_umkm" value="{{ $umkm->nama_umkm }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="">No WhatsApp <span class="text-danger">*(62xxx)</span></label>
                        <input type="text" placeholder="62xxxx" class="form-control" name="nohp" value="{{ $umkm->nohp }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Logo UMKM <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="image" name="logo" onchange="imgPreview()" required>
                        <img class="img-preview d-block mx-auto col-6 mt-4"  alt="">
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
        <div class="container" style="height: 25rem">
            <div class="row">
                @foreach ($gambarProduk as $item)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('/storage'.'/'.$item->gambar_produk) }}" class="card-img-top" style="max-height: 150px;max-width:100%;object-fit: contain" alt="gambar_produk">
                        <div class="card-body">
                          <a href="#" class="btn btn-primary">Ubah Gambar Ini</a>
                        </div>
                      </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="text-center" style="margin-top: 100px">
            <button type="submit" style="width: 90%" class="btn btn-primary my-4">Update Data</button>
        </div>  
        </form>
    
</div>
@endsection