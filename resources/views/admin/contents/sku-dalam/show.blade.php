<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>SKU</title>
  </head>
  <body>
    <div class="container-fluid">
        <img class="d-block mx-auto" src="{{ asset('img/kop-surat.JPG') }}" alt="" style="width:90vw">
        <hr style="border-width: 3px;border-color: black;width: 90vw;">
    </div>
    <div class="container-fluid mt-4">
        <p class="text-center" style="font-size: 1.8em; letter-spacing: 7px;"><u>SURAT KETERANGAN</u></p>
        <p class="text-center" style="font-size: 1.2em;">Nomor :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/ Ds.</p>
    </div>
    <div class="container mt-4">
     @foreach ($data as $item)
        <div style="margin-left: 100px;">
            <p class="mb-5" style="font-size: 1.2em; text-align: justify;">Yang bertandatangan di bawah ini Pemerintah Desa Sukaharja Kecamatan Telukjambe Timur<br>Kabupaten Karawang menyatakan dengan sesungguhnya bahwa :</p>
            <div class="row">
                <div class="col-3">
                    <p style="font-size: 1.2em;">Nama</p>
                    <p style="font-size: 1.2em;">Tempat/Tgl Lahir</p>
                    <p style="font-size: 1.2em;">NIK</p>
                    <p style="font-size: 1.2em;">Jenis Kelamin</p>
                    <p style="font-size: 1.2em;">Agama</p>
                    <p style="font-size: 1.2em;">Pekerjaan</p>
                    <p style="font-size: 1.2em;">Alamat asal</p>
                </div>
                <div class="col-9">
                    <p style="font-size: 1.2em;">: {{ $item->nama }}</p>
                    <p style="font-size: 1.2em;">: {{ $item->ttl }}</p>
                    <p style="font-size: 1.2em;">: {{ $item->nik }}</p>
                    <p style="font-size: 1.2em;">: {{ $item->jk }}</p>
                    <p style="font-size: 1.2em;">: {{ $item->agama }}</p>
                    <p style="font-size: 1.2em;">: {{ $item->pekerjaan }}</p>
                    <p style="font-size: 1.2em;">: {{ $item->alamat }}</p>
                </div>
            </div>

            <div style="margin-top: 80px; width: 75vw;">
                <p style="font-size: 1.2em; text-align: justify;text-justify: inter-word;">Nama tersebut di atas adalah benar warga desa kami, yang mempunyai
                    USAHA/DAGANG dibidang “ {{ $item->jenis_usaha }} “ sejak tahun {{ $item->tahun }} dan mempunyai
                    penghasilan sebesar Rp {{ $item->penghasilan }},- per bulannya.</p>
            </div>
        @endforeach
            <div style="margin-top: 50px; width: 78vw;">
                <p style="font-size: 1.2em; text-align: justify; text-justify: inter-word;">Demikian surat keterangan ini dibuat atas dasar yang sebenarnya, agar dapat
                    digunakan seperlunya.</p>
            </div>
        </div>

        <div class="container-fluid mt-5">
            <p class="mr-5" style="font-size: 1.2em; text-align: end;">Sukaharja, {{ $tanggal_dibuat }}</p>
            <p class="mr-5" style="font-size: 1.2em; text-align: end;">An. Kepala Desa Sukaharja</p>
            <p style="font-size: 1.2em; text-align: end; margin-right: 130px;">Sekdes</p>
            <p style="font-size: 1.2em; text-align: end; margin-right: 80px; margin-top: 110px;">ADE SUHARDI HS</p>
            

        </div>
    </div>

  </body>
  <script>
    window.onload = function(){
        window.print();
    };
</script>
</html>