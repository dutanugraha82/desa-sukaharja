
@extends('admin.master')
@section('pageTitle')
    edit-surat-ktm
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card p-3">
       
        <h5 class="text-center">Update Data Surat {{ $data->nama_ortu }}</h5>
        <hr>
        <form action="/{{ auth()->user()->role }}/ktm/{{ $data->id }}" method="POST">
            @csrf
            @method('put')
            <h5 class="mb-4">Data Orang Tua</h5>
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    
                    <label for="nama">Nama Orang Tua <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="namaOrtu" value="{{ $data->nama_ortu }}" required>
                    </div>

                    <label for="ttl">Tempat, Tanggal Lahir <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="ttlOrtu" value="{{ $data->ttl_ortu }}" required>
                    </div>

                    <label for="jk">Jenis Kelamin <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <select name="jkOrtu" class="form-control" id="" required>
                            <option value="{{ $data->jk_ortu }}">{{ $data->jk_ortu }}</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                   
                </div>
                <div class="col-md-6">
                    <label for="nik">NIK <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="nik" value="{{ $data->nik }}" required>
                    </div>

                    <label for="agama">Agama <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="agama" value="{{ $data->agama }}" required>
                    </div>

                    <label for="pekerjaan">Pekerjaan <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="pekerjaan" value="{{ $data->pekerjaan }}" required>
                    </div>

                    <label for="alamat">Alamat <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <textarea name="alamat" class="form-control" required>{{ $data->alamat }}</textarea>
                    </div>
                </div>
            </div>

            <h5 class="mb-4">Data Anak yang diajukan</h5>

                    <label for="namaAnak">Nama anak yang diajukan <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" name="namaAnak" class="form-control" value="{{ $data->nama_anak }}" required>
                    </div>

                    <label for="ttlAnak">Tempat, Tanggal Lahir Anak <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" name="ttlAnak" class="form-control" value="{{ $data->ttl_anak }}" required>
                    </div>

                    <label for="jkAnak">Jenis Kelamin Anak <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <select name="jkAnak" class="form-control" required>
                            <option value="{{ $data->jk_anak }}">{{ $data->jk_anak }}</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <label for="sekolah">Tujuan Sekolah <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="sekolah" value="{{ $data->sekolah }}" required>
                    </div>
            <br>
            <div class="mt-4">
                <a style="width: 70vw" href="/{{ auth()->user()->role }}/ktm" class="btn btn-warning">Kembali</a><br>
                <button style="width: 70vw; margin-top:10px" type="submit" onclick="return confirm('Yakin Ingin Merubah Data Ini?')" class="btn btn-primary">Update Surat!</button>
            </div>
        </form>
             
    </div>
    </div>
@endsection