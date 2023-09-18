
@extends('UserPages.master')
@section('title')
    surat-keterangan-usaha-dalam
@endsection
@section('content')
    <div class="container" style="margin-top: 8rem;">
        <div class="card p-3">
        
        <h5 class="text-center">Formulir Pengajuan SKU</h5>
        <hr>
        <form action="/sku-dalam" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">

                    <label for="jenis_usaha" class="mb-2">Jenis Usaha</label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="jenis_usaha" required>
                    </div>

                    <label for="pengahsilan">Penghasilan Perbulan <sup class="text-danger">*Rp</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="number" class="form-control" name="penghasilan" required>
                    </div>

                    <label for="tahun" class="mb-2">Tahun Berdiri</label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="number" class="form-control" name="tahun" required>
                    </div>

                    <label for="nama" class="mb-2">Nama</label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="nama" required value="{{ $nama }}">
                    </div>

                    <label for="ttl" class="mb-2">Tempat, Tanggal Lahir</label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="ttl" required value="{{ $ttl }}">
                    </div>

                    <label for="nik" class="mb-2">NIK</label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" name="nik" class="form-control" required value="{{ $nik }}">
                    </div>

                    <label for="jk" class="mb-2">Jenis Kelamin</label>
                    <div class="mb-3 input-group input-group-outline">
                        <select name="jk" class="form-control" id="" required>
                            <option value="{{ $jk }}">{{ $jk }}</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">

                    <label for="pekerjaan" class="mb-2">Pekerjaan</label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="pekerjaan" required value="{{ $pekerjaan }}">
                    </div>

                    <label for="agama" class="mb-2">Agama</label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="agama" required value="{{ $agama }}">
                    </div>

                    <label for="alamat" class="mb-2">Alamat</label>
                    <div class="mb-3 input-group input-group-outline">
                        <textarea name="alamat" class="form-control" id="" cols="30" rows="10">{{ $alamat }}</textarea>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around">
                <a href="/layanan-desa" class="btn btn-warning">Kembali</a>
                <button type="submit" class="btn btn-primary">Ajukan Surat!</button>
            </div>
        </form>
            
    </div>
    </div>
@endsection