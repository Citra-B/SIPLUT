<ul class="navbar-nav bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #5028bf;">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-futbol"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIPLUT Futsal</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item <?= $data == 'dashboard' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('dashboard') ?>">
            <i class="fas fa-fw fa-archway"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Lapangan
    </div>
    
    <li class="nav-item <?= $data == 'tipe' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('tipe') ?>">
            <i class="fas fa-fw fa-columns"></i>
            <span>Data Tipe Lapangan</span>
        </a>
    </li>
    <li class="nav-item <?= $data == 'lapangan' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('lapangan') ?>">
            <i class="fas fa-fw fa-clone"></i>
            <span>Data Lapangan </span>
        </a>
    </li>
    
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Pemesan
    </div>

    <li class="nav-item <?= $data == 'pemesan' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('pemesan') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Data Pemesan</span>
        </a>
    </li>
    <li class="nav-item <?= $data == 'jenis_bayar' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('jenis_bayar') ?>">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Data Jenis Bayar</span>
        </a>
    </li>
    
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Pesanan
    </div>

    <li class="nav-item <?= $data == 'waktu' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('waktu') ?>">
            <i class="fas fa-fw fa-clock"></i>
            <span>Data Waktu Pinjam</span>
        </a>
    </li>
    <li class="nav-item <?= $data == 'pesanan' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('pesanan') ?>">
            <i class="fas fa-fw fa-receipt"></i>
            <span>Data Pesanan</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Pengaturan
    </div>

    <li class="nav-item <?= $data == 'akun' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('akun') ?>">
            <i class="fas fa-fw fa-cog"></i>
            <span>Manajemen Akun</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>