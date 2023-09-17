 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">{{ Str::upper(auth()->user()->username) }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/{{ auth()->user()->role }}/berita">
            <i class="fas fa-newspaper"></i>
            <span>Berita</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/admin/umkm">
            <i class="fas fa-shopping-bag"></i>
            <span>UMKM</span></a>
    </li>

    <hr class="sidebar-divider">
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/admin/kk">
            <i class="fas fa-folder"></i>
            <span>Kartu Keluarga</span></a>
    </li>
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="/admin/profiles">
            <i class="fas fa-users"></i>
            <span>Warga</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#surat"
            aria-expanded="true" aria-controls="surat">
            <i class="fas fa-envelope"></i>
            <span>Surat</span>
        </a>
        <div id="surat" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Jenis Surat:</h6>
                <a class="collapse-item" href="#">Domistik</a>
                <a class="collapse-item" href="/admin/ktm">KTM</a>
                <a class="collapse-item" href="/admin/sku-dalam">SKU-Dalam</a>
                <a class="collapse-item" href="#">SKU-Luar</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#perencanaan"
            aria-expanded="true" aria-controls="perencanaan">
            <i class="fas fa-building"></i>
            <span>Perencanaan</span>
        </a>
        <div id="perencanaan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/admin/rpjm">RPJM</a>
                <a class="collapse-item" href="/admin/rkp">RKP</a>
                <a class="collapse-item" href="/admin/perdes">PERDES</a>
                <a class="collapse-item" href="/admin/perkades">PERKADES</a>
                <a class="collapse-item" href="/admin/transparansi">TRANSPARANSI</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="/{{ auth()->user()->role }}/saran">
            <i class="fas fa-caret-square-down"></i>
            <span>Saran dan Masukan</span></a>
    </li>

    <hr class="sidebar-divider">


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->