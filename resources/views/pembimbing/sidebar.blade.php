<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('acc-judul-proposal.index')) active @endif" href="{{ route('acc-judul-proposal.index') }}">
          <span data-feather="home" class="align-text-bottom"></span>
          Acc Judul Proposal
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('bimbingan-proposal.index')) active @endif" href="{{ route('bimbingan-proposal.index') }}">
          <span data-feather="home" class="align-text-bottom"></span>
          Bimbingan Proposal
        </a>
      </li>
    </ul>
  </div>
</nav>
