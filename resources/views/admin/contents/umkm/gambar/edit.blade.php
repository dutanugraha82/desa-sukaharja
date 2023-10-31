@extends('admin.master')
@section('pageTitle')
    ubah-gambar-produk
@endsection
@section('content')
<div class="container-fluid">
    <h5 class="text-center">Ubah Gambar Produk</h5>
    <hr>
    <form class="my-4" action="/{{ auth()->user()->role }}/umkm/gambar-produk/{{ $gambar->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="container">
                <div class="mb-3">
                    <label for="">Gambar Produk Sekarang</label><br>
                    <img class="col-6" src="{{ asset('/storage'.'/'.$gambar->gambar_produk) }}" alt="gambar_produk">
                </div>
                <div class="mb-3">
                    <label for="">Gambar Produk Baru</label>
                    <input type="file" class="form-control" name="gambar_produk" id="image" onchange="imgPreview()" required>
                    <img class="img-preview" style="width: 500px" alt="gambar_produk_baru">
                </div>
        </div>
        <div class="text-center mt-4">
            <button type="submit" style="width: 90%" onclick="return alert('Yakin Ingin Merubah Data?')" class="btn btn-primary my-4">Update Data</button><br>
            <a href="/{{ auth()->user()->role}}/umkm/{{ $gambar->umkm_id }}" style="width: 90%" class="btn btn-warning">Kembali</a>
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