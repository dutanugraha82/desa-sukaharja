<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/LAMBANG_KABUPATEN_KARAWANG.ico') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Sensus Penduduk</title>
  </head>
  <body>
    @include('sweetalert::alert')
    <h5 class="text-center mt-5">Sensus Penduduk</h5>
    <hr>
    <div class="container">
        <form action="/sensus-penduduk" method="POST">
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
                        @error('nik')
                            <p class="text-danger"><sup>*</sup>NIK harus 16 Digit</p>
                        @enderror
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
            <div class="d-flex mt-3 mb-5 text-center justify-content-around">
                <a href="/sensus" class="btn btn-warning">Kembali</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#kk').select2();
        });
    </script>
  </body>
</html>