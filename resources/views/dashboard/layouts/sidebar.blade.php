<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="background-color: black; ">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' :'' }}" aria-current="page" href="/dashboard" >
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/materis*') ? 'active'   :'' }}" href="/dashboard/materis" style=>
            <span data-feather="file-text"></span>
            Materi
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/latihans*') ? 'active' :'' }}" href="/dashboard/latihans" >
            <span data-feather="book"></span>
            Latihan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/pedomans*') ? 'active' :'' }}" href="/dashboard/pedomans"  >
            <span data-feather="book-open"></span>
            Pedoman
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/infokegiatans*') ? 'active' :'' }}" href="/dashboard/infokegiatans"  >
            <span data-feather="book-open"></span>
            Informasi Kegiatan
          </a>
        </li>
      </ul>

      <h6 class="sidebar-heading d-flex jusify-content-between align-items-center px-3 mt-4 mb-1
      text-muted">
        <span>Fitur Penambahan</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/kategoris*') ? 'active' :'' }}" href="/dashboard/kategoris" >
            <span data-feather="grid"></span>
            Jenis Kategori
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/jenislatihans*') ? 'active' :'' }}" href="/dashboard/jenislatihans" >
            <span data-feather="pocket"></span>
            Jenis Latihan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/tambahsiswas*') ? 'active' :'' }}" href="/dashboard/tambah_siswas" >
            <span data-feather="pocket"></span>
            Tambah User
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/tambahadmins*') ? 'active' :'' }}" href="/dashboard/tambah_admins"  >
            <span data-feather="pocket"></span>
            Tambah Admin sekolah
          </a>
        </li>
      </ul>

    </div>
  </nav>