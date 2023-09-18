
@extends('UserPages.master')
@section('title')
    surat-keterangan-usaha-luar
@endsection
@section('content')
    <div class="container" style="margin-top: 8rem;">
        <div class="card p-3">
       
        <h5 class="text-center">Formulir Pengajuan SKU LUAR</h5>
        <hr>
        <form action="/sku-luar" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">

                    <label for="jenis_usaha" class="mb-2">Jenis Usaha <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="jenis_usaha" required>
                    </div>

                    <label for="pengahsilan">Penghasilan Perbulan <sup class="text-danger">*Rp</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="number" class="form-control" name="penghasilan" required>
                    </div>

                    <label for="tahun" class="mb-2">Tahun Berdiri <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="number" class="form-control" name="tahun_berdiri" required>
                    </div>

                    <label for="nama" class="mb-2">Nama Lengkap<sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="nama" required >
                    </div>

                    <label for="ttl" class="mb-2">Tempat, Tanggal Lahir <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" placeholder="contoh: Karawang, 14 September 2023" name="ttl" required >
                    </div>

                    <label for="nik" class="mb-2">NIK <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" name="nik" class="form-control" required >
                    </div>

                    <label for="jk" class="mb-2">Jenis Kelamin <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <select name="jk" class="form-control" id="" required>
                            <option value="">----- pilih jenis kelamin -----</option>
                            <option value="LAKI-LAKI">Laki-Laki</option>
                            <option value="PEREMPUAN">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">

                    <label for="pekerjaan" class="mb-2">Pekerjaan <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="pekerjaan" required >
                    </div>

                    <label for="agama" class="mb-2">Agama <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="agama" required>
                    </div>

                    <label for="kelurahan" class="mb-2">Kelurahan Pengaju<sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" placeholder="kelurahan domisili" name="kelurahan" required>
                    </div>

                    <label for="kecamatan" class="mb-2">Kecamatan Pengaju <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" placeholder="kecamatan domisili" name="kecamatan" required>
                    </div>

                    <label for="kota" class="mb-2">Kota Pengaju <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" placeholder="kota domisili" name="kota" required>
                    </div>

                    <label for="alamat" class="mb-2">Alamat Lengkap Pengaju <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <textarea name="alamat_asal" class="form-control" id="" cols="30" rows="10" placeholder="mohon ketik kembali alamat Anda secara lengkap disini"></textarea>
                    </div>

                    <label for="alamat" class="mb-2">Alamat Usaha <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <textarea name="alamat_usaha" class="form-control" id="" cols="30" rows="10" placeholder="Alamat lengkap usaha Anda"></textarea>
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