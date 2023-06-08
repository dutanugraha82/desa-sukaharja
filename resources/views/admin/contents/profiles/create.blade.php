@extends('admin.master')
@section('pageTitle')
    input-data-pengguna
@endsection
@section('content')
    <div class="container">
        <div class="card p-3">
            @if ($errors->any())
            <div class="alert alert-danger" id="message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <h5>Input Data Pribadi</h5>
            <hr>
            <form action="/admin/profiles" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama">NIK</label>
                            <input type="text" class="form-control" name="nik" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama">Jenis Kelamin</label>
                           <select name="jk" class="form-control" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                           </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama">No KK</label><br>
                            <select name="kartu_keluarga_id" class="form-control" id="kk" required>
                                <option value="">Pilih No KK</option>
                                @foreach ($data as $item)
                                <option value="{{ $item->id }}">{{ $item->no_kk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempatLahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama">Tanggak Lahir</label>
                            <input type="date" class="form-control" name="tanggalLahir" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama">Agama</label>
                            <input type="text" class="form-control" name="agama" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama">Pendidikan</label>
                            <select name="pendidikan" class="form-control" id="">
                                <option value="">Pilih Pendidikan</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="D1">D1</option>
                                <option value="D2">D2</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama">Jenis Pekerjaan</label>
                            <input type="text" class="form-control" name="jenisPekerjaan">
                        </div>
                        <div class="mb-3">
                            <label for="nama">Status Perkawinan</label>
                            <select name="status_perkawinan" class="form-control" id="" required>
                                <option value="">Pilih Status Perkawinan</option>
                                <option value="belum-kawin">Belum Kawin</option>
                                <option value="kawin">Kawin</option>
                                <option value="cerai">Cerai</option>
                                <option value="cerai-mati">Cerai Mati</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status">Status Hubungan Dalam Keluarga</label>
                            <select name="status_hubungan_dalam_keluarga" class="form-control" required>
                                <option value="">Pilih Status</option>
                                <option value="anak">Anak</option>
                                <option value="isteri">Isteri</option>
                                <option value="kepala-keluarga">Kepala Keluarga</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="namaAyah">Nama Ayah</label>
                            <input type="text" class="form-control" name="nama_ayah" required>
                        </div>
                        <div class="mb-3">
                            <label for="namaIbu">Nama Ibu</label>
                            <input type="text" class="form-control" name="nama_ibu" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-4 d-block ml-auto">Submit</button>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
        $('#kk').select2();
        });
        setTimeout(() => {
            let message = document.getElementById('message');
            message.style.display = 'none';
        }, 3000);
    </script>
@endpush