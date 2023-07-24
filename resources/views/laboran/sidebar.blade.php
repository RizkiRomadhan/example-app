<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link @if (request()->routeIs('jadwal-lab.index')) active @endif" href="{{route ('jadwal-lab.index') }}">
          <span data-feather="home" class="align-text-bottom"></span>
          Jadwal Lab
        </a>
      </li>
      <li class="nav-item"><a class="nav-link @if (request()->routeIs('konfirmasi-lab.index')) active @endif" href="{{route ('konfirmasi-lab.index') }}">
        <span data-feather="shopping-cart" class="align-text-bottom"></span>
        Konfirmasi Lab
      </a>
    </li>
        <li class="nav-item"><a class="nav-link @if (request()->routeIs('absensi-lab.index')) active @endif" href="{{route ('absensi-lab.index') }}">
          <span data-feather="shopping-cart" class="align-text-bottom"></span>
          Absensi Lab
        </a>
      </li>
      </ul>
    </div>
  </nav>
  