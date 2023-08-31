@extends('UserPages.master')
@push('css')
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css" rel="stylesheet"/>
<link href="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css" rel="stylesheet"/>
@endpush
@section('title')
    pengajuan-umkm
@endsection
@section('content')
    <div class="container-fluid">
        <h5 class="text-center">Form Pengajuan UMKM</h5>
        <hr>
        <form class="my-4" action="/pengajuan-umkm" method="POST">
            @csrf
            <div class="container">
                <p class="text-muted text-center my-3">Form Data UMKM</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="">NIK Pemilik UMKM<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nik" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Nama Pemilik UMKM<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama_pemilik" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Nama UMKM <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama_umkm" required>
                        </div>
                        <div class="mb-3">
                            <label for="">No WhatsApp <span class="text-danger">*(+62xxx)</span></label>
                            <input type="text" placeholder="+62xxxx" class="form-control" name="nohp" required>
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
                            <textarea class="form-control" name="alamat" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Deskripsi UMKM</label>
                            <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                
            </div>
            <hr>
            <div class="container">
                <p class="text-muted text-center">Gambar Produk</p>
                <div class="my-3" id="produk">
                <div class="mb-3">
                    <input type="file" name="gambar_produk" multiple data-max-files="10" data-allow-reorder="true" data-max-files-size="2MB" id="gambar_produk">
                </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" style="width: 90%" class="btn btn-primary my-4">Ajukan</button><br>
                <a href="/" style="width: 90%" class="btn btn-warning">Kembali</a>
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

   FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageExifOrientation,
            FilePondPluginFileValidateSize,
            FilePondPluginImageEdit
            );
            
        const inputElement = document.querySelector('input[id="gambar_produk"]');
        const pond = FilePond.create(inputElement); 
       

        FilePond.setOptions({
            server:{
                //uploadimage
                process:'/filepond',
                headers:{
                    'X-CSRF-TOKEN':'{{ csrf_token() }}'
                },
                //deleteimage
                revert: (uniqueFileId, load, error) => {
                    deleteImage(uniqueFileId);
                    error('Error while delete image');
                    load();
                }

            }
            
        });

        function deleteImage(nameFile){
            $.ajax({
                url: '/adminunit/revert',
                headers: {
                    'X-CSRF-TOKEN':'{{ csrf_token() }}'
                },
                type:"DELETE",
                data:{
                    image: nameFile
                },
                success:function(response){
                    console.log('sukses')
                },
                error:function(response){
                    console.log('test')
                }
            });
        }

</script>
@endpush