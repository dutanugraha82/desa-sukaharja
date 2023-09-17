@extends('UserPages.master')
@section('title')
    saran-untuk-desa
@endsection
@section('content')
    <div class="container-fluid" style="margin-top: 8rem">
        <div class="card p-2">
            <h5 class="text-center ">Saran Untuk Desa</h5>
        <hr>
        <form class="my-4" action="/saran" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <p class=" text-center my-3 ">Form Saran</p>
                <div class="row">
                    <div class="col-md-6">
                        <label class="" for="">NIK<span class="text-danger">*</span></label>
                        <div class="mb-3 input-group input-group-outline">
                            <input type="text"  class="form-control" name="nik" required>
                        </div>

                        <label class="" for="">Nama Lengkap<span class="text-danger">*</span></label>
                        <div class="mb-3 input-group input-group-outline">
                            <input type="text" class="form-control"  name="nama" required>
                        </div>


                        <label class="" for="">No WhatsApp <span class="text-danger">*</span></label>
                        <div class="mb-3 input-group input-group-outline d-flex">
                            <input type="text" value="+62" style="width: 60px" class="p-2" disabled>
                            <input type="text" class="form-control" name="nohp" required>
                        </div>

                        
                    </div>
                    <div class="col-md-6">
                        <label class="" for="">Saran dan Masukan<span class="text-danger">*</span></label>
                        <div class="mb-3 input-group input-group-outline">
                            <textarea class="form-control" name="saran" id="" cols="30" rows="15"></textarea>
                        </div>

                    </div>
                </div>
                
            </div>
            <hr>
            <div class="text-center">
                <button type="submit" style="width: 90%" class="btn btn-primary my-4">Ajukan</button><br>
                <a href="/" style="width: 90%" class="btn btn-warning">Kembali</a>
            </div>  
            </form>
        </div>
    </div>
@endsection