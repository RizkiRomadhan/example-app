<header class="navbar navbar-dark sticky-top bg-success flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Proses Bimbingan Skripsi</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap"
            style="background: white; color: black; width: 6em; margin-right: 1em; display: grid;">
            <form action="{{ route('logout') }}" style="margin: auto;">
                @csrf
                <button type="submit" class="btn nav-link border-0"
                style="background: white; color: black;">
                <i class="bi bi-box-arrow-right"></i>
                    Logout</button>
            </form>
        </div>
    </div>
</header>
