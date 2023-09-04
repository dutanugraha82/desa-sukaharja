@extends('UserPages.master')
@section('content')
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

<div class="container my-4">
  <div id="tentang-desa">
    <div class="row mb-3">
        <div class="col-md-4 d-flex" data-aos="flip-left" data-aos-delay="30"
        data-aos-duration="1500">
          {{-- style="background-attachment: fixed; object-fit: cover" --}}
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('img/lurah.jpeg') }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/lurah.jpeg') }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/lurah.jpeg') }}" class="d-block w-100" alt="...">
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
        <div class="col-md-8 mt-3" data-aos="flip-right" data-aos-delay="30"
        data-aos-duration="1500">
            <div class="mb-4">
                <h5 class="text-center"><b>VISI DAN MISI DESA SUKAHARJA</b></h5>
            </div>
            <div class="mb-2">
                <h5  class="mt-3">VISI : </h5>
                  <ul>
                    <li>Masyarakat Desa Sukaharja yang AGAMIS, MAJU, SEHAT dan SEJAHTERA</li>
                  </ul>
                <h5 class="mt-3">MISI :</h5>
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
    <hr>
    <div class="mt-4">
      <h4 class="my-5 text-center" id="berita-desa">ARTIKEL DESA</h4>
      <div class="container">
        <div class="row mb-3">
          @foreach ($berita as $item)
          <div class="col-md-4">
            <div class="card shadow-lg mx-auto" style="width: 18rem;">
              <img src="{{ asset('storage'.'/'.$item->gambar) }}" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-title text-dark">{{ Str::upper($item->judul) }}</p>
                <a href="/berita/{{ $item->slug }}" class="btn btn-primary  d-block">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <a href="#">
          <p class="text-center text-white text-md-end">Lihat Selengkapnya</p>
        </a>
      </div>
       
    </div>
</div>
@endsection