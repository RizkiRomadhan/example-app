<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('pengajuan-judul.index')) active @endif"
                    href="{{ route('pengajuan-judul.index') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Pengajuan Judul
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('dosen-pembimbing.index')) active @endif"
                    href="{{ route('dosen-pembimbing.index') }}">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Dosen Pembimbing
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('list-bimbingan.index')) active @endif"
                    href="{{ route('list-bimbingan.index') }}">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Bimbingan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('revisi.index')) active @endif" href="{{ route('revisi.index') }}">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Revisi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('peminjaman-lab.index')) active @endif"
                    href="{{ route('peminjaman-lab.index') }}">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Peminjaman Lab
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('jadwal-seminar-mhs.index')) active @endif"
                    href="{{ route('jadwal-seminar-mhs.index') }}">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Jadwal Seminar
                </a>
            </li>
        </ul>
    </div>
</nav>
