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
        @method('put')
        <div class="container">
            <p class="text-muted text-center my-3">Data UMKM {{ $umkm->nama_umkm }}</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="">Nama Pemilik UMKM<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ $umkm->nama_pemilik }}" name="nama_pemilik" required>
                    </div>
                    <div class="mb-3">
                        <label for="">NIK Pemilik UMKM<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ Crypt::decrypt($umkm->nik) }}" name="nik" required>
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
                        <label for="">Logo UMKM Sekarang<span class="text-danger">*</span></label>
                        <img src="{{ asset('/storage'.'/'.$umkm->logo) }}" class=" d-block mx-auto col-6 mt-4"  alt="">
                    </div>

                    <div class="mb-3">
                        <label for="">Logo UMKM Baru<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="image" name="logo_baru" onchange="imgPreview()">
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
        <div class="container">
            <div class="row">
                @foreach ($gambarProduk as $item)
                <div class="col-md-4 mb-4">
                    <div class="card p-2" style="width: 18rem;">
                        <img src="{{ asset('/storage'.'/'.$item->gambar_produk) }}" class="card-img-top" style="max-height: 150px;max-width:100%;object-fit: contain" alt="gambar_produk">
                        <div class="card-body">
                          <a href="/{{ auth()->user()->role }}/umkm/gambar-produk/{{ $item->id }}" class="btn btn-primary d-block mx-auto">Ubah Gambar Ini</a>
                          <a href="/{{ auth()->user()->role }}/umkm/gambar-produk/{{ $item->id }}/hapus" class="btn btn-danger d-block mx-auto mt-3" onclick="return confirm('yakin ingin mengahpus gambar?')">Hapus Gambar</a>
                        </div>
                      </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="text-center" style="margin-top: 100px">
            <button type="submit" style="width: 90%" onclick="return confirm('Yakin Ingin Merubah Data?')" class="btn btn-primary my-4">Update Data</button><br>
            <a href="/{{ auth()->user()->role}}/umkm" style="width: 90%" class="btn btn-warning">Kembali</a>
        </div>  
        </form>
    
</div>
@endsection
@push('js')
    <script>
    function imgPreview()
   {
       const image = document.querySelector('#image');
       const imagePreview = document.querySelector('.img-preview');

       imagePreview.style.display = 'block';

       const oFReader = new FileReader();
       oFReader.readAsDataURL(image.files[0]);

       oFReader.onload = function(oFREvent){
           imagePreview.src = oFREvent.target.result;
       }
   }
    </script>
@endpush