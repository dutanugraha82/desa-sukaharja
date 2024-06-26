
@extends('admin.master')
@section('pageTitle')
    data-surat-ktm
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card p-3">
       
        <h5 class="text-center">Detail Data Surat {{ $data->nama_ortu }}</h5>
        <hr>
            <h5 class="mb-4">Data Orang Tua</h5>
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    
                    <label for="nama">Nama Orang Tua <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="namaOrtu" value="{{ $data->nama_ortu }}" readonly>
                    </div>

                    <label for="ttl">Tempat, Tanggal Lahir <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="ttlOrtu" value="{{ $data->ttl_ortu }}" readonly>
                    </div>

                    <label for="jk">Jenis Kelamin <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <select name="jkOrtu" class="form-control" id="" readonly>
                            <option value="{{ $data->jk_ortu }}">{{ $data->jk_ortu }}</option>
                        </select>
                    </div>

                   
                </div>
                <div class="col-md-6">
                    <label for="nik">NIK <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="nik" value="{{ $data->nik }}" readonly>
                    </div>

                    <label for="agama">Agama <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="agama" value="{{ $data->agama }}" readonly>
                    </div>

                    <label for="pekerjaan">Pekerjaan <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="pekerjaan" value="{{ $data->pekerjaan }}" readonly>
                    </div>

                    <label for="alamat">Alamat <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <textarea name="alamat" class="form-control" readonly>{{ $data->alamat }}</textarea>
                    </div>
                </div>
            </div>

            <h5 class="mb-4">Data Anak yang diajukan</h5>

                    <label for="namaAnak">Nama anak yang diajukan <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" name="namaAnak" class="form-control" value="{{ $data->nama_anak }}" readonly>
                    </div>

                    <label for="ttlAnak">Tempat, Tanggal Lahir Anak <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" name="ttlAnak" class="form-control" value="{{ $data->ttl_anak }}" readonly>
                    </div>

                    <label for="jkAnak">Jenis Kelamin Anak <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <select name="jkAnak" class="form-control" readonly>
                            <option value="{{ $data->jk_anak }}">{{ $data->jk_anak }}</option>
                        </select>
                    </div>

                    <label for="sekolah">Tujuan Sekolah <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="sekolah" value="{{ $data->sekolah }}" readonly>
                    </div>
            <br>
            <div class="mt-4">
                <a style="width: 70vw" href="/{{ auth()->user()->role }}/ktm" class="d-block mx-auto btn btn-warning">Kembali</a><br>
                <a style="width: 70vw" href="/{{ auth()->user()->role }}/ktm/{{ $data->id }}/print" class="d-block mx-auto btn btn-primary">Cetak Surat</a><br>
            </div>
             
    </div>
    </div>
@endsection