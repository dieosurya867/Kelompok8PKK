<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Home Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- <div id="menu">
        <ul>
            <li <?php if ($page == "Home") echo "class='active'"; ?>> <a href="index.php">home</a></li>
            <li <?php if ($page == "About") echo "class='active'"; ?>><a href="about.php">about</a></li>
            <li <?php if ($page == "Gallery") echo "class='active'"; ?>><a href="gallery.php">gallery</a></li>
            <li <?php if ($page == "Contact") echo "class='active'"; ?>><a href="contact.php">contact</a></li>
        </ul>
    </div> -->
    <!-- <li class="nav-item " <?php if ($page == "home") echo "class=' active'"; ?>> <a class="nav-link" href="../admin/index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a></li>
    <li class="nav-item " <?php if ($page == "murid") echo "class=' active'"; ?>> <a class="nav-link" href="../admin/datasiswa.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Siswa</span></a></li>
    <li class="nav-item " <?php if ($page == "book") echo "class=' active'"; ?>> <a class="nav-link" href="../admin/databuku.php">
            <i class="fas fa-fw fa-tachometer-alt"></i> 
            <span>Buku</span></a></li> -->
    <!-- end of menu -->

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active"><a class="nav-link" href="../admin/index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fa-solid fa-graduation-cap"></i>
            <span>Siswa</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tampilan:</h6>
                <a class="collapse-item" href="../admin/datasiswa.php">Dashboard Siswa</a>
                <a class="collapse-item" href="../admin/add_siswa.php">Tambah Data Siswa</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa-solid fa-users"></i>
            <span>Petugas</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tampilan:</h6>
                <a class="collapse-item" href="../admin/datapetugas.php">Dashboard Petugas</a>
                <a class="collapse-item" href="../admin/add_petugas.php">Tambah Data Petugas</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa-solid fa-book"></i>
            <span>Buku</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tampilan:</h6>
                <a class="collapse-item" href="../admin/databuku.php">Dashboard Buku</a>
                <a class="collapse-item" href="../admin/add_buku.php">Tambah Data Buku</a>

            </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="../admin/datakelas.php">
            <i class="fa-solid fa-school"></i>
            <span>Kelas</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fa-solid fa-business-time"></i>
            <span>Transaksi</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu:</h6>
                <a class="collapse-item" href="../admin/pinjam.php">Pinjam Buku</a>
                <a class="collapse-item" href="../admin/historipeminjaman.php">Riwayat Peminjaman Buku</a>
                <a class="collapse-item" href="../admin/pengembalian.php">Pengembalian Buku</a>

            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->