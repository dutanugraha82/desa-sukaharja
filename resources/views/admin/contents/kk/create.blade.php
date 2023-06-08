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
            <h5>Input Data Kartu Keluarga</h5>
            <hr>
            <form action="/admin/kk" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama">Nama Kepala Keluarga</label>
                            <input type="text" class="form-control" name="kepalaKeluarga" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama">No Kartu Keluarga</label>
                            <input type="text" class="form-control" name="no_kk" id="kk" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama">Alamat</label>
                            <input type="text" class="form-control" name="alamat" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama">RT</label>
                            <input type="text" class="form-control" name="rt" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama">RW</label>
                            <input type="text" class="form-control" name="rw" required>
                        </div>
                       
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama">Kecamatan</label>
                            <input type="text" class="form-control" name="kecamatan" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama">Kabupaten/Kota</label>
                            <input type="text" class="form-control" name="kabupaten" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama">Kode Pos</label>
                            <input type="text" class="form-control" name="pos" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama">Provinsi</label>
                            <input type="text" class="form-control" name="provinsi" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama">Desa/Kelurahan</label>
                            <input type="text" class="form-control" name="desa" required>
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
        setTimeout(() => {
            let message = document.getElementById('message');
            message.style.display = 'none';
        }, 3000);
    </script>
@endpush