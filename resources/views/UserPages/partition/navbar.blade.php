<div class="container-fluid position-sticky z-index-sticky top-0"><div class="row"><div class="col-12">
  <nav class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-3">
    <div class="container-fluid px-0">
      <a class="navbar-brand font-weight-bolder ms-sm-3" href="/">
        <img class="p-2" src="{{ asset('img/LAMBANG_KABUPATEN_KARAWANG.png') }}" alt="Logo" width="50" height="60" class="d-inline-block align-text-top">
        Sukaharja Karawang
      </a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
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
          @guest
          <li class="nav-item">
            <a class="nav-link text-info" href="/login">Admin</a>
          </li>
          @endguest
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
  <!-- End Navbar -->
    </div>
  </div>
</div>
