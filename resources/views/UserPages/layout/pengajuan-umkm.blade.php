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
    <div class="container-fluid" style="margin-top: 8rem">
        <div class="card p-2">
            <h5 class="text-center ">Form Pengajuan UMKM</h5>
        <hr>
        <form class="my-4" action="/pengajuan-umkm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <p class=" text-center my-3 ">Form Data UMKM</p>
                <div class="row">
                    <div class="col-md-6">
                        <label class="" for="">NIK Pemilik UMKM<span class="text-danger">*</span></label>
                        <div class="mb-3 input-group input-group-outline">
                            <input type="text" placeholder="NIK Pemilik UMKM" class="form-control" name="nik" required>
                        </div>

                        <label class="" for="">Nama Pemilik UMKM<span class="text-danger">*</span></label>
                        <div class="mb-3 input-group input-group-outline">
                            <input type="text" class="form-control" placeholder="Nama Pemilik UMKM" name="nama_pemilik" required>
                        </div>

                        <label class="" for="">Nama UMKM <span class="text-danger">*</span></label>
                        <div class="mb-3 input-group input-group-outline">
                            <input type="text" class="form-control" placeholder="Nama UMKM" name="nama_umkm" required>
                        </div>

                        <label class="" for="">No WhatsApp <span class="text-danger">*</span></label>
                        <div class="mb-3 input-group input-group-outline d-flex">
                            <input type="text" value="+62" style="width: 60px" class="p-2" disabled>
                            <input type="text" class="form-control" name="nohp" required>
                        </div>

                        <label class="" for="">Logo UMKM <span class="text-danger">*</span></label>
                        <div class="mb-3 input-group input-group-outline">
                            <input type="file" class="form-control" id="image" name="logo" onchange="imgPreview()" required>
                        </div>
                        <img class="img-preview d-block mx-auto col-6 mt-4"  alt="">
                        
                    </div>
                    <div class="col-md-6">
                        <label class="" for="">Alamat UMKM <span class="text-danger">*</span></label>
                        <div class="mb-3 input-group input-group-outline">
                            <textarea class="form-control" name="alamat" id="" cols="30" rows="10"></textarea>
                        </div>

                        <label class="" for="">Deskripsi UMKM <span class="text-danger">*</span></label>
                        <div class="mb-3 input-group input-group-outline">
                            <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                
            </div>
            <hr>
            <div class="container">
                <p class=" text-center ">Gambar Produk</p>
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
                url: '/revert',
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