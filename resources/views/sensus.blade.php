<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/LAMBANG_KABUPATEN_KARAWANG.ico') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>sensus-sukaharja-2023</title>
    <style>
        .icon{
            font-size: 5em;
        }
        p{
            font-size: 0.2em;
            text-align: center;
        }
        .bg-jumbotron{
          background: rgb(180,225,255);
          background: linear-gradient(90deg, rgba(180,225,255,1) 0%, rgba(117,214,255,0.3086484593837535) 5%, rgba(217,213,213,1) 100%);
        }
    </style>
  </head>
  <body>
    @include('sweetalert::alert')
    <div class="jumbotron jumbotron-fluid bg-jumbotron">
      <div class="container">
        <h4 class="text-center text-md-left" style="font-size: 2.3em; font-weight: 200"><b>Sensus Sukaharja</b></h4>
        <hr>
        <p style="font-size: 1.5em; text-align:justify;">Selamat datang di halaman sensus penduduk desa Sukaharja</p style="font-size: 2em">
      </div>
    </div>
    <div class="container mt-4">
        <div class="row">
          <div class="col-6 text-center">
            <a class="text-dark" href="/sensus-kk"><i class='bx bxs-book-content icon text-center'><p>Sensus KK</p></i></a>
            
          </div>
          <div class="col-6 text-center">
            <a class="text-dark" href="/sensus-penduduk"><i class='bx bx-male-female icon text-center'><p>Sensus Penduduk</p></i></a><br>
          </div>
        </div>
        <div class="card mt-4">
          <div class="card-header">
            Catatan
          </div>
          <div class="card-body">
            <h5 class="card-title">Silahkan untuk mengisi sensus kk terlebih dahulu, Bila no kk sudah diisi, bisa dilanjut ke sensus penduduk untuk anggota dalam kartu keluarga dengan no kk yang sama.</h5>
             <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin logout?')">Logout</button>
            </form>
          </div>
        </div>
       
    </div>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>