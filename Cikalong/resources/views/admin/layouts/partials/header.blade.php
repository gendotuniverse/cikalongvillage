<div class="main-header">
    <div class="main-header-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                    height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
        <div class="container-fluid">

            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">

                <li class="nav-item topbar-user dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                        aria-expanded="false">
                        <div class="avatar-sm">
                            @if(Auth::user()->foto <> '')
                                <img src="{{ url(Auth::user()->foto) }}" alt="..." class="avatar-img rounded-circle" />
                            @else
                                <img src="{{ url('images/avatar-1.png') }}" alt="..." class="avatar-img rounded-circle" />
                            @endif
                        </div>
                        <span class="profile-username">
                            <span class="fw-bold">{{ Auth::user()->name }}</span>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg">
                                        @if(Auth::user()->foto <> '')
                                            <img src="{{ url(Auth::user()->foto) }}" alt="image profile" class="avatar-img rounded" />
                                        @else
                                            <img src="{{ url('images/avatar-1.png') }}" alt="image profile" class="avatar-img rounded" />
                                        @endif
                                    </div>
                                    <div class="u-text">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <p class="text-muted">{{ Auth::user()->email }}</p>
                                        <a href="{{ route(Auth::user()->role.'.profile') }}" class="btn btn-xs btn-secondary btn-sm">Lihat Profil</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                @if(Auth::user()->role == 'admin')
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route(Auth::user()->role.'.setting') }}">Pengaturan Website</a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout', Auth::user()->role) }}">Keluar</a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>