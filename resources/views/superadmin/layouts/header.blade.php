<header class="app-header">
    <div class="main-header-container container-fluid">
        <div class="header-content-left">
            <div class="header-element">
                <div class="horizontal-logo">
                    <a href="{{ route('home') }}" class="header-logo">
                        <img src="{{ asset('backend/images/panel-sidebar-logo.png') }}" alt="logo" class="desktop-logo" />
                        <img src="{{ asset('backend/images/panel-sidebar-logo.png') }}" alt="logo" class="toggle-logo" />
                        <img src="{{ asset('backend/images/panel-sidebar-logo.png') }}" alt="logo" class="desktop-dark" />
                        <img src="{{ asset('backend/images/panel-sidebar-logo.png') }}" alt="logo" class="toggle-dark" />
                        <img src="{{ asset('backend/images/panel-sidebar-logo.png') }}" alt="logo" class="desktop-white" />
                        <img src="{{ asset('backend/images/panel-sidebar-logo.png') }}" alt="logo" class="toggle-white" />
                    </a>
                </div>
            </div>

            <!-- <div class="header-element">
                <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle" data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
            </div> -->
        </div>

        <div class="header-content-right">
            <div class="header-element">
                <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="me-sm-2 me-0">
                            <img src="{{ asset('backend/images/9.jpg') }}" alt="img" width="32" height="32" class="rounded-circle" />
                        </div>
                        <div class="d-sm-block d-none">
                            <p class="fw-semibold mb-0 lh-1">{{ $user->name }}</p>
                        </div>
                    </div>
                </a>
                <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end" aria-labelledby="mainHeaderProfile">
                    <li>
                        <a class="dropdown-item d-flex" href="{{ route('superadmin.profile') }}">
                            <i class="ti ti-user-circle fs-18 me-2 op-7"></i>Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ti ti-logout fs-18 me-2 op-7"></i>Log Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>