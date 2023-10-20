
@extends('admin.master')
@section('pageTitle')
    detail-surat-sku-dalam
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card p-3">
       
        <h5 class="text-center">Detail Data Surat {{ $data->nama }}</h5>
        <hr>
            <div class="row">
                <div class="col-md-6">

                    <label for="jenis_usaha" class="mb-2">Jenis Usaha</label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="jenis_usaha" value="{{ $data->jenis_usaha }}" readonly>
                    </div>

                    <label for="pengahsilan">Penghasilan Perbulan <sup class="text-danger">*Rp</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="penghasilan" value="{{ $data->penghasilan }}" id="penghasilan" readonly>
                    </div>

                    <label for="tahun" class="mb-2">Tahun Berdiri</label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="number" class="form-control" name="tahun" value="{{ $data->tahun }}" readonly>
                    </div>

                    <label for="nama" class="mb-2">Nama</label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="nama" readonly value="{{ $data->nama }}">
                    </div>

                    <label for="ttl" class="mb-2">Tempat, Tanggal Lahir</label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="ttl" readonly value="{{ $data->ttl }}">
                    </div>

                    <label for="nik" class="mb-2">NIK</label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" name="nik" class="form-control" readonly value="{{ $data->nik }}">
                    </div>

                    <label for="jk" class="mb-2">Jenis Kelamin</label>
                    <div class="mb-3 input-group input-group-outline">
                        <select name="jk" class="form-control" id="" readonly>
                            <option value="{{ $data->jk }}">{{ $data->jk }}</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">

                    <label for="pekerjaan" class="mb-2">Pekerjaan</label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="pekerjaan" readonly value="{{ $data->pekerjaan }}">
                    </div>

                    <label for="agama" class="mb-2">Agama</label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="agama" readonly value="{{ $data->agama }}">
                    </div>

                    <label for="alamat" class="mb-2">Alamat</label>
                    <div class="mb-3 input-group input-group-outline">
                        <textarea name="alamat" class="form-control" id="" cols="30" rows="10" readonly>{{ $data->alamat }}</textarea>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <a style="width: 70vw" href="/{{ auth()->user()->role }}/sku-dalam" class="btn btn-warning">Kembali</a><br>
                <a style="width: 70vw" href="/{{ auth()->user()->role }}/sku-dalam/{{ $data->id }}/print" class="mt-4 btn btn-primary">Cetak Surat</a><br>
            </div>
             
    </div>
    </div>
@endsection