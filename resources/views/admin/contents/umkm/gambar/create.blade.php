@extends('admin.master')
@section('pageTitle')
    tambah-gambar-produk
@endsection
@section('content')
<div class="container-fluid">
    <h5 class="text-center">Tambah Gambar Produk</h5>
    <hr>
    <form class="my-4" action="/{{ auth()->user()->role }}/umkm/gambar-produk/{{ $umkm_id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
                <div class="mb-3">
                    <label for="">Gambar Produk Baru</label>
                    <input type="file" class="form-control" name="gambar_produk" id="image" onchange="imgPreview()" required>
                    <img class="img-preview mt-4" style="max-width: 300px" alt="gambar_produk_baru">
                </div>

                <div class="text-center mt-4">
                    <button type="submit" style="width: 90%" class="btn btn-primary my-4">Tambah Gambar</button><br>
                    <a href="/{{ auth()->user()->role}}/umkm/{{ $umkm_id }}" style="width: 90%" class="btn btn-warning">Kembali</a>
                </div> 
        </div>
        <hr>
        <div class="containe">
            <h5 class="text-center">Gambar Produk</h5>
            <div class="row mt-4">
                @foreach ($gambar as $item)
                <div class="col-4 mb-4">
                    <img src="{{ asset('/storage'.'/'.$item->gambar_produk) }}" class="d-block mx-auto" style="max-width: 250px" alt="gambar_produk">
                </div>
                @endforeach
            </div>
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