@extends('UserPages.master')
@section('title')
    Dahsboard
@endsection
@section('content')
<div class="container">
  <h3 class="text-center fs-merriweathersans" data-aos="zoom-in-up" data-aos-delay="30"
  data-aos-duration="1500">Selamat Datang di Situs Resmi Desa Sukaharja Karawang</h3>
  <hr>
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('img/fotoDesa.jpeg') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('img/fotoDesa.jpeg') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('img/fotoDesa.jpeg') }}" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <hr>
</div>

<div class="container my-3">
  <div id="tentang-desa">
    <h4 class="mb-4">Tentang Desa : </h4>
    <div class="row mb-3">
        <div class="col-md-4 d-flex">
          {{-- style="background-attachment: fixed; object-fit: cover" --}}
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('img/lurah.jpg') }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/lurah.jpg') }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/lurah.jpg') }}" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="col-md-8 mt-3">
            <div class="mb-2">
                <h5><b>Desa Sukaharja</b></h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam quis, minus illum placeat unde porro voluptas magni necessitatibus facere animi explicabo culpa repellendus sint modi dignissimos fuga cumque nihil at!</p>
            </div>
            <div class="mb-2">
                <h5  class="mt-3">Visi : </h5>
                  <ul>
                    <li>Masyarakat Desa Sukaharja yang AGAMIS, MAJU, SEHAT dan SEJAHTERA</li>
                  </ul>
                <h5 class="mt-3">Misi :</h5>
                <ul>
                  <li>MEMBANGUN MASYARAKAT DESA SUKAHARJA YANG MEMULIAKAN AGAMA.</li>
                  <li>MEWUJUDKAN PEMERINTAHAAN YANG BAIK DAN BERSIH MELALUI SISTEM INFORMASI KEMASYARAKATAN YANG TRANSFARAN DAN HUMANIS.</li>
                  <li>MELAKSANAKAN TATA KELOLA PEMERINTAHAAN YANG PROFESIONAL, MELAYANI DAN PARTISIPATIF MELALUI KEPEMIMPINAN YANG TELADAN, MENGAYOMI, DAN MERAKYAT.</li>
                  <li>MENINGKATKAN KESEJAHTERAAN BAGI PEGAWAI DESA ATAU APARATUR PEMERINTAHAN YANG MENOPANG DAN TURUT MEMBANTU JALANNYA RODA PEMERINTAHAAN DESA.</li>
                  <li>MENINGKATKAN KESEJAHTERAAN WARGA MASYARAKAT DESA SUKAHARJA MELALUI PERTUMBUHAN DAN PEMERATAAN EKONOMI YANG BERDAYA SAING, BERBASIS KERAKYATAN DAN POTENSI LOKAL.</li>
                  <li>MENJADIKAN DESA SUKAHARJA SEBAGAI DESA PERCONTOHAN / DESA DIGITAL.</li> 
                </ul>
            </div>
        </div>
    </div>
  </div>
  <div class="mt-4">
    <h4 class="my-5 text-center" id="aktifitas-desa">Aktifitas Desa</h4>
      <div class="row mb-4">
        <div class="col-md-4">
          <div class="card mx-auto shadow-lg" style="width: 18rem;">
            <img src="{{ asset('img/OPT_001 (8).jpeg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Pelatihan Linmas</h5>
              <p class="card-text" style="text-align: justify;">Kegiatan Pembinaan & Pelatihan Linmas Desa Sukaharja bersama komunitas Karawang Tanggap Peduli beserta aparatur desa lainnya....</p>
              <a href="#" class="btn btn-primary  d-block">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-4 mt-md-0">
          <div class="card mx-auto shadow-lg" style="width: 18rem;">
            <img src="{{ asset('img/SKJ_001 (17).jpeg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Apel Mingguan Keliling Kecamatan</h5>
              <p class="card-text" style="text-align: justify;">Kegiatan Apel Minggon Keliling Kecamatan Telukjambe Timur di Desa Sukaharja. Kegiatan ini dilaksanakan secara rutin dan bergantian di setiap desa....</p>
              <a href="#" class="btn btn-primary  d-block">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-4 mt-md-0">
          <div class="card mx-auto shadow-lg" style="width: 18rem;">
            <img src="{{ asset('img/SKJ_001 (2).jpeg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">BIMTEK Posyandu</h5>
              <p class="card-text" style="text-align: justify;">Kegiatan Pelatihan Kader Posyandu Desa Sukaharja. Kegiatan ini dilaksanakan bagi kader posyandu yang ada di desa sukaharja dalam melayani....</p>
              <a href="#" class="btn btn-primary  d-block">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
      </div>
        <a class="mt-3" href="#">
          <p class="text-center text-md-end">Lihat Selengkapnya</p>
        </a>
  </div>
    <hr>
    <div class="mt-4">
      <h4 class="my-5 text-center" id="berita-desa">Berita Desa</h4>
      <div class="container">
        <div class="row mb-3">
          @foreach ($berita as $item)
          <div class="col-md-4">
            <div class="card shadow-lg" style="width: 18rem;">
              <img src="{{ asset('storage'.'/'.$item->gambar) }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{ $item->judul }}</h5>
                <a href="#" class="btn btn-primary  d-block">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <a href="#">
          <p class="text-center text-md-end">Lihat Selengkapnya</p>
        </a>
      </div>
       
    </div>
</div>
@endsection