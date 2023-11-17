
@extends('admin.master')
@section('pageTitle')
    edit-surat-keterangan-belum-menikah
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card p-3">
       
        <h5 class="text-center">Update Data Surat {{ $data->nama }}</h5>
        <hr>
        <form action="/{{ auth()->user()->role }}/belum-menikah/{{ $data->id }}" method="POST">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    
                    <label for="nama">Nama Pengaju <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="nama" value="{{ $data->nama }}" required>
                    </div>

                    <label for="ttl">Tempat, Tanggal Lahir <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="ttl" value="{{ $data->ttl }}" required>
                    </div>

                    <label for="jk">Jenis Kelamin <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <select name="jk" class="form-control" id="" required>
                            <option value="{{ $data->jk }}">{{ $data->jk }}</option>
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

            <br>
            <div class="mt-4">
                <a style="width: 70vw" href="/{{ auth()->user()->role }}/belum-menikah" class="btn btn-warning">Kembali</a><br>
                <button style="width: 70vw; margin-top:10px" type="submit" onclick="return confirm('Yakin Ingin Merubah Data Ini?')" class="btn btn-primary">Update Surat!</button>
            </div>
        </form>
             
    </div>
    </div>
@endsection