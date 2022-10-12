<div id="layoutSidenav_nav">
<nav class="sidenav shadow-right sidenav-light" id="menuTogglers">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
            <div class="sidenav-menu-heading">
                <span class="fw-bolder">MY Billing APP</span>
            </div>
            <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseBills" aria-expanded="true" aria-controls="collapseBills">
                <div class="nav-link-icon"><i class="fa fa-home text-yellow "></i></div>
                Bills
                <div class="sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseBills" data-bs-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                    <a class="nav-link" href="{{route('bills.index')}}">All my Bills</a>
                    <a class="nav-link" href="{{route('bills.create')}}">Create New Bill</a>
                    <a class="nav-link" href="">Bills something</a>
                </nav>
            </div>
            <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseMoneySpent" aria-expanded="true" aria-controls="collapseMoneySpent">
                <div class="nav-link-icon"><i class="fa fa-money-bill text-green"></i></div>
                All My payments
                <div class="sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseMoneySpent" data-bs-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                    <a class="nav-link" href="javascript:void(0);">This Month</a>
                    <a class="nav-link" href="javascript:void(0);">All year</a>
                </nav>
            </div>
        </div>
    </div>
    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">
                Logged in as:
            </div>
            <div class="sidenav-footer-title fw-bolder">
                {{Auth::user()->name}}
            </div>
        </div>
    </div>
</nav>
</div>
