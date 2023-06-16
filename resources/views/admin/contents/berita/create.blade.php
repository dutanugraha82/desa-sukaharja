@extends('admin.master')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush
@section('pageTitle')
    buat-berita
@endsection
@section('content')
    <div class="card p-3">
        <form action="/admin/berita" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="title">Judul</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" name="gambar" id="image" onchange="imgPreview()" required>
                    </div>
                    <img class="col-5 img-preview" alt="">
                </div>
                <div class="col-md-6">
                    <textarea name="deskripsi" id="summernote" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-5">
                <a href="/admin/berita" class="btn btn-warning">Kembali</a>
                <button type="submit" class="btn btn-primary">Buat Berita</button>
            </div>
        </form>
    </div>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $('#summernote').summernote({
      placeholder: 'deskripsi berita',
      tabsize: 2,
      height: 400
    });
  </script>
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