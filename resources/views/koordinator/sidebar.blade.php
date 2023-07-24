<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link @if (request()->routeIs('penentuan-dosbing.index')) active @endif" href="{{route ('penentuan-dosbing.index') }}">
         <span data-feather="home" class="align-text-bottom"></span>
            Penentuan Dosen Pembimbing
          </a>
        </li>
        <li class="nav-item"><a class="nav-link @if (request()->routeIs('jadwal-seminar.index')) active @endif" href="{{route ('jadwal-seminar.index') }}">
          <span data-feather="shopping-cart" class="align-text-bottom"></span>
            Jadwal Seminar/Skripsi 
          </a>
        </li>
      </ul>
    </div>
  </nav>
  