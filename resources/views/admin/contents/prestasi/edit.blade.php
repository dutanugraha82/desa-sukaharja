@extends('admin.master')
@section('pageTitle')
edit-prestasi
@endsection
@section('content')
    <div class="card p-3">
        <div class="card-header">
            Prestasi {{ $prestasi->judul }}
        </div>
        <div class="container-fluid">
            <form class="p-3" action="/admin/prestasi/{{ $prestasi->id }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" name="judul" value="{{ $prestasi->judul }}" required>
                </div>
                <div class="mb-3">
                    <label for="foto">Foto Baru</label>
                    <input type="file" class="form-control" name="fotoBaru" id="image" onchange="imgPreview()">
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="">Foto Sekarang</label>
                        <br>
                        <img style="max-width: 500px" src="{{ asset('/storage'.'/'.$prestasi->foto) }}" alt="">
                        <input type="hidden" name="fotoLama" value="{{ $prestasi->foto }}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Foto Baru</label>
                         <img class="img-preview" style="max-width: 500px" alt="foto-baru">
                    </div>
                    
                </div>
               
                <div class="mb-3">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10" required>{{ $prestasi->deskripsi }}</textarea>
                </div>
                <div class="mt-5">
                    <a href="/{{ auth()->user()->role }}" class="btn btn-warning text-dark w-100">Kembali</a>
                    <button type="submit" class="d-block mt-4 mx-auto btn btn-primary w-100" onclick="return confirm('Yakin Ingin Merubah Data?')">Update Data</button>
                </div>
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