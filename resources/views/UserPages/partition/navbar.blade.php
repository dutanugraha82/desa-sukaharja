<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
  <div class="container">
  <a class="navbar-brand d-flex gap-2" href="/">
    <img src="{{ asset('img/LAMBANG_KABUPATEN_KARAWANG.png') }}" alt="Logo" width="40" height="50" class="d-inline-block align-text-top">
    <p class="mt-2">Desa Sukaharja</p>
  </a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Tentang Desa
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/wilayah">Wilayah</a></li>
          <li><a class="dropdown-item" href="/statistik">Statistik</a></li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Pembangunan
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/perencanaan">Perencanaan</a></li>
          <li><a class="dropdown-item" href="/transparansi">Transparansi</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/lembaga">Lembaga</a>
        
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Produk Desa
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/umkm-masyarakat">UMKM Masyarakat Desa</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/layanan-desa">Layanan Desa</a>
      </li>
      @auth
      <li class="nav-item">
       <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
      </form>
      </li>
      @endauth
    </ul>
  </div>
</div>
</nav>
