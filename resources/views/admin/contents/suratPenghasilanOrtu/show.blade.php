
@extends('admin.master')
@section('pageTitle')
    edit-surat-penghasilan-orang-tua
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card p-3">
       
        <h5 class="text-center">Data Surat {{ $data->nama }}</h5>
        <hr>
            <h5 class="text-center">Data Orang Tua</h5>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="nama" class="mb-2">Nama <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="nama" value="{{ $data->nama }}"  required readonly>
                    </div>

                    <label for="ttl">Tempat, Tanggal Lahir <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="ttl" value="{{ $data->ttl }}"  required readonly>
                    </div>

                    <label for="agama" class="mb-2">Agama <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="agama" value="{{ $data->agama }}"  required readonly>
                    </div>

                    <label for="jk" class="mb-2">Jenis Kelamin<sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <select name="jk" class="form-control" id="" readonly>
                            <option value="{{ $data->jk }}">{{ $data->jk }}</option>
                        </select>
                    </div>

                    <label for="penghasilan" class="mb-2">Penghasilan<sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="penghasilan" id="penghasilan" value="{{ $data->penghasilan }}" readonly required>
                    </div>

                    <label for="penghasilan" class="mb-2">Penghasilan Dalam Ejaan<sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="ejaan_penghasilan" value="{{ $data->ejaan_penghasilan }}" readonly required>
                    </div>

                    <label for="anggota" class="mb-2">Jumlah Anggota Keluarga<sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="anggota" value="{{ $data->anggota }}" readonly  required>
                    </div>

                    <label for="anggota" class="mb-2">Jumlah Anggota Keluarga Dalam Ejaan<sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="ejaan_anggota" value="{{ $data->ejaan_anggota }}" readonly required>
                    </div>


                    
                </div>

                <div class="col-md-6">
                    <label for="pekerjaan" class="mb-2">Pekerjaan <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="pekerjaan" value="{{ $data->pekerjaan }}" required readonly >
                    </div>

                    <label for="nik" class="mb-2">NIK <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" name="nik" class="form-control" required readonly value="{{ $data->nik }}"  >
                    </div>

                    <label for="kewarganegaraan" class="mb-2">kewarganegaraan <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" name="kewarganegaraan" class="form-control" value="{{ $data->kewarganegaraan }}" required readonly >
                    </div>
                    <label for="alamat" class="mb-2">Alamat Lengkap Pengaju <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <textarea readonly name="alamat" class="form-control" id="" cols="30" rows="10" placeholder="mohon ketik alamat sesuai KTP" >{{ $data->alamat }}</textarea>
                    </div>
                </div>
            </div>

            <hr class="my-5">

            <h5 class="text-center">Data Anak</h5>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="nama_anak" class="mb-2">Nama <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="nama_anak" value="{{ $data->nama_anak }}"  required readonly>
                    </div>

                    <label for="ttl">Tempat, Tanggal Lahir <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="ttl_anak" value="{{ $data->ttl_anak }}"  required readonly>
                    </div>


                    <label for="jk" class="mb-2">Jenis Kelamin<sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <select name="jk_anak" class="form-control" id="" readonly>
                            <option value="{{ $data->jk_anak }}">{{ $data->jk_anak }}</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="pekerjaan" class="mb-2">Pekerjaan <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" class="form-control" name="pekerjaan_anak" value="{{ $data->pekerjaan_anak }}"  required readonly>
                    </div>

                    <label for="nik" class="mb-2">NIK/Identitas Lain<sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <input type="text" name="nik_anak" class="form-control" value="{{ $data->nik_anak }}" required readonly>
                    </div>

                    <label for="alamat" class="mb-2">Alamat <sup class="text-danger">*</sup></label>
                    <div class="mb-3 input-group input-group-outline">
                        <textarea name="alamat_anak" class="form-control" readonly id="" cols="30" rows="10" >{{ $data->alamat_anak }}</textarea>
                    </div>
                </div>
                <a  style="width: 70vw" href="/{{ auth()->user()->role }}/surat-penghasilan-orang-tua" class="btn btn-warning d-block mx-auto my-4">Kembali</a><br>

            </div>
             
    </div>
    </div>
@endsection