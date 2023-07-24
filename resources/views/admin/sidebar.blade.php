<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link @if (request()->is('admin/data-jurusan*')) active @endif" href="{{ route ('data-jurusan.index') }}">
          <span data-feather="shopping-cart" class="align-text-bottom"></span>
          Data Jurusan
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link @if (request()->is('admin/data-prodi*')) active @endif" href="{{ route ('data-prodi.index') }}">
          <span data-feather="shopping-cart" class="align-text-bottom"></span>
          Data Prodi
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('data-dosen.index')) active @endif" href="{{ route ('data-dosen.index') }}">
          <span data-feather="home" class="align-text-bottom"></span>
          Data Dosen  
        </a>
      </li>
      <li class="nav-item">
          <a class="nav-link @if (request()->routeIs('data-mahasiswa.index')) active @endif" href="{{ route ('data-mahasiswa.index') }}">
            <span data-feather="shopping-cart" class="align-text-bottom"></span>
            Data Mahasiswa
          </a>
      </li>
    </ul>
  </div>
</nav>
  