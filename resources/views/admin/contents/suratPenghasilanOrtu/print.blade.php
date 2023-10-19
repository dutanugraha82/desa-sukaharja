<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>SKU-Luar</title>
  </head>
  <style>
    p {
        margin:0;
        padding:0;
    }
  </style>
  <body>
    <div class="container-fluid">
        <img class="d-block mx-auto" src="{{ asset('img/kop-surat.JPG') }}" alt="" style="height:180px;width:90vw">
        <hr style="border-width: 3px;border-color: black;width: 90vw;">
    </div>
    <div class="container-fluid">
        <p class="text-center" style="font-size: 1.5em; letter-spacing: 7px;"><u>SURAT KETERANGAN</u></p>
        <p class="text-center" style="font-size: 1.2em;">Nomor :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/ Ds.</p>
    </div>
    <div class="container-fluid">
        <div style="margin-left: 50px; margin-right: 50px">
            <p  style="font-size: 1.2em; text-align: justify; margin-top:30px">Yang bertandatangan di bawah ini Pemerintah Desa Sukaharja Kecamatan Telukjambe Timur Kabupaten Karawang menyatakan dengan sesungguhnya bahwa :</p>
            <div class="mt-4 row">
                <div class="col-3">
                    <p style="font-size: 1.2em;">Nama</p>
                    <p style="font-size: 1.2em;">Tempat/Tgl Lahir</p>
                    <p style="font-size: 1.2em;">Jenis Kelamin</p>
                    <p style="font-size: 1.2em;">Agama</p>
                    <p style="font-size: 1.2em;">Pekerjaan</p>
                    <p style="font-size: 1.2em;">Kewarganegaraan</p>
                    <p style="font-size: 1.2em;">No.KTP/Identitas lain</p>
                    <p style="font-size: 1.2em;">Alamat</p>
                </div>
                <div class="col-9">
                    <p style="font-size: 1.2em;">: {{ $data->nama }}</p>
                    <p style="font-size: 1.2em;">: {{ $data->ttl }}</p>
                    <p style="font-size: 1.2em;">: {{ $data->jk }}</p>
                    <p style="font-size: 1.2em;">: {{ $data->agama }}</p>
                    <p style="font-size: 1.2em;">: {{ $data->pekerjaan }}</p>
                    <p style="font-size: 1.2em;">: {{ $data->kewarganegaraan }}</p>
                    <p style="font-size: 1.2em;">: {{ $data->nik }}</p>
                    <p style="font-size: 1.2em;">: {{ $data->alamat }}</p>
                </div>
            </div>

            <div style="width: 80vw;">
                <p class="my-3" style="font-size: 1.2em; text-align: justify;text-justify: inter-word;">Adalah benar Orang Tua kandung dari:</p>
                <div class="row">
                    <div class="col-3">
                        <p style="font-size: 1.2em;">Nama</p>
                        <p style="font-size: 1.2em;">Tempat/Tgl Lahir</p>
                        <p style="font-size: 1.2em;">Jenis Kelamin</p>
                        <p style="font-size: 1.2em;">Pekerjaan</p>
                        <p style="font-size: 1.2em;">No.KTP/Identitas lain</p>
                        <p style="font-size: 1.2em;">Alamat</p>
                    </div>
                    <div class="col-9">
                        <p style="font-size: 1.2em;">: {{ $data->nama_anak }}</p>
                        <p style="font-size: 1.2em;">: {{ $data->ttl_anak }}</p>
                        <p style="font-size: 1.2em;">: {{ $data->jk_anak}}</p>
                        <p style="font-size: 1.2em;">: {{ $data->pekerjaan_anak }}</p>
                        <p style="font-size: 1.2em;">: {{ $data->nik_anak }}</p>
                        <p style="font-size: 1.2em;">: {{ $data->alamat_anak }}</p>
                    </div>
                </div>
            </div>
            <br>
            <div>
                <p style="font-size: 1.2em; text-align: justify; text-justify: inter-word;">Nama tersebut diatas adalah benar warga Desa Sukaharja Kecamatan Telukjambe Timur Kabupaten Karawang, menurut pengamatan kami benar yang bersangkutan mempunyai penghasilan orang tua rata-rata <b>{{ $data->penghasilan }},- ({{ $data->ejaan_penghasilan }})</b>  dan menanggung {{ $data->anggota }} ({{ $data->ejaan_anggota }}) orang anggota keluarga.</p>
                <p class="mt-3" style="font-size: 1.2em; text-align: justify; text-justify: inter-word;">Demikian Surat Keterangan ini kami buat sesuai dengan yang sebenarnya, untuk dipergunakan sebagaimana mestinya.</p>
            </div>
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