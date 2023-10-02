@extends('admin.master')
@section('pageTitle')
tambah-prestasi
@endsection
@section('content')
    <div class="card p-3">
        <div class="card-header">
            Prestasi Desa Baru
        </div>
        <div class="container-fluid">
            <form class="p-3" action="/admin/prestasi" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" name="judul" required>
                </div>
                <div class="mb-3">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control" name="foto" id="image" onchange="imgPreview()" required>
                </div>
                <div class="mb-3">
                    <img class="img-preview col-6" alt=" foto-required">
                </div>
                <div class="mb-3">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10" required></textarea>
                </div>
                <button type="submit" class="d-block mt-4 mx-auto btn btn-primary w-100">Tambah Data</button>
            </form>
        </div>
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