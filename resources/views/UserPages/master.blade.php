<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/LAMBANG_KABUPATEN_KARAWANG.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Box Icon --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather Sans">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css"/>
    {{-- fontSize --}}
    <style>
      .fs-icon{
          font-size: 4em;
      }
      .fs-merriweathersans{
        font-family: "Merriweather Sans";
      }
  </style>
  @stack('css')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Desa Sukaharja | @yield('title')</title>
  </head>
  <body>
    @include('sweetalert::alert')
    @include('UserPages.partition.navbar')

<main style="margin-top: 8rem;">
    @yield('content')
</main>
@include('UserPages.partition.footer')

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
     AOS.init();
    </script>
    @stack('js')
  </body>
</html>