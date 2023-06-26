<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Surat KTM</title>
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
    <div class="container mt-3">
        @foreach ($data as $item)
        <div style="margin-left: 80px;">
            <p class="mb-5" style="font-size: 1.2em; text-align: justify;">Pemerintah Desa Sukaharja Kecamatan Telukjambe Timur Kabupaten Karawang menerangkan<br>
                bahwa :</p>
                <div style="margin-left: 60px;">
                    <p style="font-size: 1.2em;">Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $item->nama_ortu }}</p>
                    <p style="font-size: 1.2em;">Tempat/Tgl Lahir &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $item->ttl_ortu }}</p>
                    <p style="font-size: 1.2em;">Jenis Kelamin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $item->jk_ortu }}</p>
                    <p style="font-size: 1.2em;">Nik &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $item->nik }}</p>
                    <p style="font-size: 1.2em;">Agama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $item->agama }}</p>
                    <p style="font-size: 1.2em;">Pekerjaan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $item->pekerjaan }}</p>
                    <p style="font-size: 1.2em;">Alamat asal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $item->alamat }}</p>
                </div>

            <div style="margin-top: 40px; width: 75vw;">
                <p style="font-size: 1.2em; text-align: justify;text-justify: inter-word;">Adalah benar warga Desa kami, menurut keterangannya bahwa keberadaan Ekonominya
                    <b>Kurang Mampu</b>,</p>
            </div>
            
            <div style="margin-left: 60px;margin-top: 30px;">
                <p style="font-size: 1.2em;">Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $item->nama_anak }}</p>
            <p style="font-size: 1.2em;">Tempat/Tgl Lahir &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $item->ttl_anak }}</p>
            <p style="font-size: 1.2em;">Jenis Kelamin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $item->jk_anak }}</p>
            <p style="font-size: 1.2em;">Tujuan Sekolah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $item->sekolah }}</p>
            </div>
            
            <div style="margin-top: 30px; width: 80vw;">
                <p style="font-size: 1.2em; text-align: justify; text-justify: inter-word;">Demikian Surat Keterangan ini kami buat sesuai dengan yang sebenarnya, untuk dipergunakan
                    sebagaimana mestinya.</p>
            </div>
        @endforeach
        </div>

        <div class="container-fluid mt-4">
            <p class="mr-5" style="font-size: 1.2em; text-align: end;">Sukaharja, {{ $tanggal_dibuat }}</p>
            <p class="mr-5" style="font-size: 1.2em; text-align: end;">An. Kepala Desa Sukaharja</p>
            <p style="font-size: 1.2em; text-align: end; margin-right: 130px;">Sekdes</p>
            <p style="font-size: 1.2em; text-align: end; margin-right: 80px; margin-top: 110px;">ADE SUHARDI HS</p>
            

        </div>
    </div>
    <script>
        window.onload = function(){
            window.print();
        };
    </script>
  </body>
</html>