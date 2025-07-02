<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="index.php?page=dashboard" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>Dashboard
        </p>
      </a>
    </li>
    <li class="nav-item menu-open">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
          Akademik
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="index.php?page=data-mahasiswa" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Data Mahasiswa</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=data-pembayaran" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Data Pembayaran</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=data-mk" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Data Mata Kuliah</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=data-dosen" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Data Dosen</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=data-pembayaran-gaji" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Data Pembayaran Gaji</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a href="logout.php" class="nav-link">
        <i class="nav-icon fas fa-power-off"></i>
        <p>Logout</p>
      </a>
    </li>

  </ul>
</nav>