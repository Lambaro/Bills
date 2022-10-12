<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white"
     id="sidenavAccordion">
    <button class="btn btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>
    <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="/home">BILLS Creator</a>

    <form class="form-inline me-auto d-none d-lg-block me-3" action="">
        <div class="input-group input-group-joined input-group-solid">
            <input class="form-control pe-0" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-text">
                <i class="fa fa-search"></i>
            </div>
        </div>
    </form>
    <ul class="navbar-nav align-items-center ms-auto">
        <li class="nav-item dropdown no-caret ">
            <a class="btn btn-transparent-dark dropdown-toggle show me-5" aria-expanded="false" aria-haspopup="false"
               data-bs-toggle="dropdown" id="navbarDropdownUser" role="button" href="javascript:void(0);">
                <span>{{Auth::user()->name}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end border-1 shadow animated--fade-in-up"
                 aria-labelledby="navbarDropdownUser" data-bs-popper="none">
                <a href="{{ route('logout') }}" class="dropdown-item text-red"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out me-2"></i><span class="fw-bold">{{ __('Logout') }}</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
