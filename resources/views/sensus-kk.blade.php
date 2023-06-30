<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/LAMBANG_KABUPATEN_KARAWANG.ico') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Sensus Kartu Keluarga</title>
  </head>
  <body>
    <h5 class="text-center mt-5">Sensus Kartu Keluarga</h5>
    <hr>
    <div class="container">
        <form action="/sensus-kk" method="POST">
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
                        @error('no_kk')
                        <p class="text-danger"><sup>*</sup>No KK harus 16 Digit</p>
                        @enderror
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

            <button type="submit" class="btn btn-primary my-4 d-block ml-auto">Submit</button>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>