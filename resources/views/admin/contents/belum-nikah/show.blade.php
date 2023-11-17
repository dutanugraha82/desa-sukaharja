
@extends('admin.master')
@section('pageTitle')
    surat-keterangan-belum-menikah
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card p-3">
       
        <h5 class="text-center"> Data Surat {{ $data->nama }}</h5>
        <hr>
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    
                    <label for="nama">Nama Pengaju <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="nama" value="{{ $data->nama }}" required readonly>
                    </div>

                    <label for="ttl">Tempat, Tanggal Lahir <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="ttl" value="{{ $data->ttl }}" required readonly>
                    </div>

                    <label for="jk">Jenis Kelamin <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                       <input type="text" class="form-control" name="jk" value="{{ $data->jk }}" readonly>
                    </div>

                   
                </div>
                <div class="col-md-6">
                    <label for="nik">NIK <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="nik" value="{{ $data->nik }}" required readonly>
                    </div>

                    <label for="agama">Agama <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="agama" value="{{ $data->agama }}" required readonly>
                    </div>

                    <label for="pekerjaan">Pekerjaan <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="pekerjaan" value="{{ $data->pekerjaan }}" required readonly>
                    </div>

                    <label for="alamat">Alamat <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <textarea name="alamat" class="form-control" required readonly>{{ $data->alamat }}</textarea>
                    </div>
                </div>
            </div>

            <br>
            <div class="mt-4">
                <a style="width: 70vw" href="/{{ auth()->user()->role }}/belum-menikah" class="d-block mx-auto btn btn-warning">Kembali</a><br>
                <a style="width: 70vw" href="/{{ auth()->user()->role }}/belum-menikah/{{ $data->id }}/print" class="d-block mx-auto btn btn-primary">Cetak Surat</a><br>
            </div>
             
    </div>
    </div>
@endsection