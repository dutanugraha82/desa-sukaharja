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
            <form action="/{{ auth()->user()->role }}/profiles" method="POST">
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
                                <option value="{{ $item->id }}">{{ Crypt::decrypt($item->no_kk )}}</option>
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
                            <input type="text" class="form-control" name="pendidikan">
                        </div>
                        <div class="mb-3">
                            <label for="nama">Jenis Pekerjaan</label>
                            <input type="text" class="form-control" name="jenisPekerjaan">
                        </div>
                        <div class="mb-3">
                            <label for="nama">Status Perkawinan</label>
                            <input type="text" class="form-control" name="status_perkawinan">
                        </div>
                        <div class="mb-3">
                            <label for="status">Status Hubungan Dalam Keluarga</label>
                            <input type="text" class="form-control" name="status_hubungan_dalam_keluarga">
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