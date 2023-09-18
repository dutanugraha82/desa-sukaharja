
@extends('admin.master')
@section('title')
    detail {{ $data->nama }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card p-3">
            <div class="row">
                <div class="col-md-6">

                    <div class="mb-3">
                    <label for="jenis_usaha" class="mb-2">Jenis Usaha</label>
                        <input type="text" class="form-control" name="jenis_usaha" value="{{ $data->jenis_usaha }}" required readonly>
                    </div>

                    <div class="mb-3">
                    <label for="pengahsilan">Penghasilan Perbulan <sup class="text-danger">*Rp</sup></label>
                        <input type="number" class="form-control" name="penghasilan" value="{{ $data->penghasilan }}" required readonly>
                    </div>

                    <div class="mb-3">
                    <label for="tahun" class="mb-2">Tahun Berdiri</label>
                        <input type="number" class="form-control" name="tahun_berdiri" value="{{ $data->tahun_berdiri }}" required readonly>
                    </div>

                    <div class="mb-3">
                    <label for="nama" class="mb-2">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" value="{{ $data->nama }}" required readonly >
                    </div>

                    <div class="mb-3">
                    <label for="ttl" class="mb-2">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control"  name="ttl" value="{{ $data->ttl }}" required readonly >
                    </div>

                    <div class="mb-3">
                    <label for="nik" class="mb-2">NIK</label>
                        <input type="text" name="nik" class="form-control" value="{{ Crypt::decrypt($data->nik) }}" required readonly >
                    </div>

                    <div class="mb-3">
                    <label for="jk" class="mb-2">Jenis Kelamin</label>
                        <select name="jk" class="form-control" id="" required readonly>
                            <option value="">{{ $data->jk }}</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="mb-3">
                    <label for="pekerjaan" class="mb-2">Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan" value="{{ $data->pekerjaan }}" required readonly >
                    </div>

                    <div class="mb-3">
                    <label for="agama" class="mb-2">Agama</label>
                        <input type="text" class="form-control" name="agama" value="{{ $data->agama }}" required readonly>
                    </div>

                    <div class="mb-3">
                    <label for="kelurahan" class="mb-2">Kelurahan</label>
                        <input type="text" class="form-control"  name="kelurahan" value="{{ $data->kelurahan }}" required readonly>
                    </div>

                    <div class="mb-3">
                    <label for="kecamatan" class="mb-2">Kecamatan</label>
                        <input type="text" class="form-control" name="kecamatan" value="{{ $data->kecamatan }}" required readonly>
                    </div>

                    <div class="mb-3">
                    <label for="kota" class="mb-2">Kota</label>
                        <input type="text" class="form-control" name="kota" value="{{ $data->kota }}" required readonly>
                    </div>

                    <div class="mb-3">
                    <label for="alamat" class="mb-2">Alamat Usaha</label>
                        <textarea name="alamat_usaha" class="form-control" id="" cols="30" rows="10" readonly>{{ $data->alamat_usaha }}</textarea>
                    </div>

                    <div class="mb-3">
                    <label for="alamat" class="mb-2">Alamat Usaha</label>
                        <textarea name="alamat_usaha" class="form-control" id="" cols="30" rows="10" readonly>{{ $data->alamat_asal }}</textarea>
                    </div>
                </div>
            </div>
             
            <div style="margin-top: 50px">
                <a style="width: 70vw" href="/{{ auth()->user()->role }}/sku-luar" class="btn btn-warning d-block mx-auto">Kembali</a> <br>
                <form action="/{{ auth()->user()->role }}/sku-luar/{{ $data->id }}" method="POST">
                @csrf
                @method('delete')
                <button style="width: 70vw" class="btn btn-danger d-block mx-auto" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')">Hapus</button>
                </form>
            </div>
    </div>
    </div>
@endsection