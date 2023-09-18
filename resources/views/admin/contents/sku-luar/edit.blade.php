
@extends('admin.master')
@section('pageTitle')
    edit
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card p-3">
       
        <h5 class="text-center">Update Pengajuan SKU LUAR</h5>
        <hr>
        <form action="/{{ auth()->user()->role }}/sku-luar/{{ $data->id }}" method="POST">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">

                    <label for="jenis_usaha" class="mb-2">Jenis Usaha <sup class="text-danger">*</sup></label>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="jenis_usaha" value="{{ $data->jenis_usaha }}" required>
                    </div>

                    <label for="pengahsilan">Penghasilan Perbulan <sup class="text-danger">*Rp</sup></label>
                    <div class="mb-3">
                        <input type="number" class="form-control" name="penghasilan" value="{{ $data->penghasilan }}" required>
                    </div>

                    <label for="tahun" class="mb-2">Tahun Berdiri <sup class="text-danger">*</sup></label>
                    <div class="mb-3">
                        <input type="number" class="form-control" name="tahun_berdiri" value="{{ $data->tahun_berdiri }}" required>
                    </div>

                    <label for="nama" class="mb-2">Nama Lengkap<sup class="text-danger">*</sup></label>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="nama" value="{{ $data->nama }}" required >
                    </div>

                    <label for="ttl" class="mb-2">Tempat, Tanggal Lahir <sup class="text-danger">*</sup></label>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="contoh: Karawang, 14 September 2023" name="ttl" value="{{ $data->ttl }}" required >
                    </div>

                    <label for="nik" class="mb-2">NIK <sup class="text-danger">*</sup></label>
                    <div class="mb-3">
                        <input type="text" name="nik" class="form-control" value="{{ Crypt::decrypt($data->nik) }}" required >
                    </div>

                    <label for="jk" class="mb-2">Jenis Kelamin <sup class="text-danger">*</sup></label>
                    <div class="mb-3">
                        <select name="jk" class="form-control" id="" required>
                            <option value="{{ $data->jk }}">{{ $data->jk }}</option>
                            <option value="LAKI-LAKI">Laki-Laki</option>
                            <option value="PEREMPUAN">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">

                    <label for="pekerjaan" class="mb-2">Pekerjaan <sup class="text-danger">*</sup></label>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="pekerjaan" required value="{{ $data->pekerjaan }}">
                    </div>

                    <label for="agama" class="mb-2">Agama <sup class="text-danger">*</sup></label>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="agama" value="{{ $data->agama }}" required>
                    </div>

                    <label for="kelurahan" class="mb-2">Kelurahan Pengaju<sup class="text-danger">*</sup></label>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="kelurahan domisili" name="kelurahan"  value="{{ $data->kelurahan }}"required>
                    </div>

                    <label for="kecamatan" class="mb-2">Kecamatan Pengaju <sup class="text-danger">*</sup></label>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="kecamatan domisili" name="kecamatan" value="{{ $data->kecamatan }}" required>
                    </div>

                    <label for="kota" class="mb-2">Kota Pengaju <sup class="text-danger">*</sup></label>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="kota domisili" name="kota" value="{{ $data->kota }}" required>
                    </div>

                    <label for="alamat" class="mb-2">Alamat Lengkap Pengaju <sup class="text-danger">*</sup></label>
                    <div class="mb-3">
                        <textarea name="alamat_asal" class="form-control" id="" cols="30" rows="10" placeholder="mohon ketik kembali alamat Anda secara lengkap disini">{{ $data->alamat_asal }}</textarea>
                    </div>

                    <label for="alamat" class="mb-2">Alamat Usaha <sup class="text-danger">*</sup></label>
                    <div class="mb-3">
                        <textarea name="alamat_usaha" class="form-control" id="" cols="30" rows="10" placeholder="Alamat lengkap usaha Anda">{{ $data->alamat_usaha }}</textarea>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <a style="width: 70vw" href="/{{ auth()->user()->role }}/sku-luar" class="btn btn-warning">Kembali</a><br>
                <button style="width: 70vw; margin-top:10px" type="submit" onclick="return confirm('Yakin Ingin Merubah Data Ini?')" class="btn btn-primary">Update Surat!</button>
            </div>
        </form>
             
    </div>
    </div>
@endsection