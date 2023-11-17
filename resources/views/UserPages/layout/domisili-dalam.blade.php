
@extends('UserPages.master')
@section('title')
    surat-keterangan-domisili-dalam
@endsection
@section('content')
    <div class="container" style="margin-top: 8rem;">
        <div class="card p-3">
        
        <h5 class="text-center">Formulir Pengajuan Surat Keterangan Domisili Dalam</h5>
        <hr>
        <form action="/domisili-dalam" method="POST">
            @csrf

                    <label for="nama" class="mb-2">Nama Lengkap (sesuai KTP) <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="nama" value="{{ $profiles->nama }}"  required readonly>
                    </div>

                    <label for="ttl">Tempat, Tanggal Lahir <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="ttl" value="{{ $ttl }}" required readonly>
                    </div>

                    <label for="jk" class="mb-2">Jenis Kelamin <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="jk" value="{{ $profiles->jk }}" required readonly>
                    </div>

                    <label for="agama" class="mb-2">Agama <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="agama" value="{{ $profiles->agama }}" required readonly>
                    </div>

                    <label for="nik" class="mb-2">NIK <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" name="nik" class="form-control" value="{{ Crypt::decrypt($profiles->nik) }}" required readonly>
                    </div>

                    <label for="nik" class="mb-2">Kewarganegaraan <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" name="kewarganegaraan" class="form-control" value="Indonesia" required readonly>
                    </div>

                    <label for="pekerjaan" class="mb-2">Pekerjaan</label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="pekerjaan" value="{{ $profiles->jenis_pekerjaan }}" required readonly>
                    </div>

                    <label for="alamat" class="mb-2">Alamat</label>
                    <div class="mb-3 input-group input-group-outline">
                        <textarea name="alamat" class="form-control" id="" cols="30" rows="10">{{ $alamat }}</textarea>
                    </div>
                    <small>*Jika terdapat kesalahan data pada kolom di atas, silahkan kunjungi Kantor Desa Sukaharja.</small>
            <div class="d-flex justify-content-around mt-4">
                <a href="/layanan-desa" class="btn btn-warning">Kembali</a>
                <button type="submit" class="btn btn-primary">Ajukan Surat!</button>
            </div>
        </form>
            
    </div>
    </div>
@endsection