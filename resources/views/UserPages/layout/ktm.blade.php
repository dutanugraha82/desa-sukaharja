@extends('UserPages.master')
@section('title')
    pengajuan-ktm
@endsection
@section('content')
    <div class="container" style="margin-top: 8rem;">
        <div class="card p-3">
        <h5 class="text-center">Formulir Pengajuan KTM</h5>
        <hr>
        <form action="/ktm" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h5 class="mb-4">Data Orang Tua</h5>
                    @foreach ($data as $item)
                    <label for="nama">Nama Orang Tua <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="namaOrtu" value="{{ $item->nama }}" required>
                    </div>

                    <label for="ttl">Tempat, Tanggal Lahir <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="ttlOrtu" value="{{ $item->tempat_lahir.','.$tanggal_lahir }}" required>
                    </div>

                    <label for="jk">Jenis Kelamin <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <select name="jkOrtu" class="form-control" id="" required>
                            <option value="{{ $item->jk }}">{{ $item->jk }}</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <label for="nik">NIK <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="nik" value="{{ $nik }}" required>
                    </div>

                    <label for="agama">Agama <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="agama" value="{{ $item->agama }}" required>
                    </div>

                    <label for="pekerjaan">Pekerjaan <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="pekerjaan" value="{{ $item->jenis_pekerjaan }}" required>
                    </div>

                    <label for="alamat">Alamat <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <textarea name="alamat" class="form-control" required>{{ $alamat.',RT:'.$item->rt.'RW:'.$item->rw.'ds.'.$item->desa.'kec.'.$item->kecamatan }}</textarea>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <h5 class="mb-4">Data Anak yang diajukan</h5>

                    <label for="namaAnak">Nama anak yang diajukan <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" name="namaAnak" class="form-control" required>
                    </div>

                    <label for="ttlAnak">Tempat, Tanggal Lahir Anak <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" name="ttlAnak" class="form-control" required>
                    </div>

                    <label for="jkAnak">Jenis Kelamin Anak <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <select name="jkAnak" class="form-control" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <label for="sekolah">Tujuan Sekolah <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="sekolah" required>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around mt-4">
                <a href="/layanan-desa" class="btn btn-warning">Kembali</a>
                <button type="submit" class="btn btn-primary">Ajukan Surat!</button>
            </div>
        </form>
    </div>
    </div>
@endsection