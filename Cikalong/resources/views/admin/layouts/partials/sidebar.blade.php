<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route(Auth::user()->role . '.dashboard') }}" class="logo">
                <img src="{{ url($setting->logo) }}" alt="navbar brand" class="navbar-brand" width="40" />
                <span class="text-white">
                    {{ $setting->nama_website }}
                </span>
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
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item @if (Request::segment(2) == 'dashboard') active @endif">
                    <a href="{{ route(Auth::user()->role . '.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item @if (Request::segment(2) == 'sumberdaya') active @endif">
                    <a href="{{ route(Auth::user()->role . '.sumberdaya') }}">
                        <i class="fas fa-file"></i>
                        <p>Sumber Daya</p>
                    </a>
                </li>

                <li class="nav-item @if (Request::segment(2) == 'produk') active @endif">
                    <a href="{{ route(Auth::user()->role . '.produk') }}">
                        <i class="fas fa-file"></i>
                        <p>Produk</p>
                    </a>
                </li>

                <li class="nav-item @if (Request::segment(2) == 'galeri') active @endif">
                    <a href="{{ route(Auth::user()->role . '.galeri') }}">
                        <i class="fas fa-images"></i>
                        <p>Galeri</p>
                    </a>
                </li>

                <li class="nav-item @if (Request::segment(2) == 'pemerintahan') active @endif">
                    <a href="{{ route(Auth::user()->role . '.pemerintahan') }}">
                        <i class="fas fa-file"></i>
                        <p>Pemerintahan</p>
                    </a>
                </li>

                <li class="nav-item @if (Request::segment(2) == 'berita') active @endif">
                    <a href="{{ route(Auth::user()->role . '.berita') }}">
                        <i class="fas fa-file"></i>
                        <p>Berita</p>
                    </a>
                </li>

                {{-- <li class="nav-item @if (Request::segment(2) == 'layanan') active @endif">
                    <a href="{{ route(Auth::user()->role.'.layanan') }}">
                <i class="fas fa-file"></i>
                <p>Layanan</p>
                </a>
                </li> --}}
                <li class="nav-item @if (Request::segment(2) == 'tentang') active @endif">
                    <a href="{{ route(Auth::user()->role . '.tentang') }}">
                        <i class="fas fa-file"></i>
                        <p>Profil</p>
                    </a>
                </li>

                <li class="nav-item @if (Request::segment(2) == 'fasilitas_desa') active @endif">
                    <a href="{{ route(Auth::user()->role . '.fasilitas_desa') }}">
                        <i class="fas fa-file"></i>
                        <p>Fasilitas Desa</p>
                    </a>
                </li>

                <li class="nav-item @if (Request::segment(2) == 'kontak') active @endif">
                    <a href="{{ route(Auth::user()->role . '.kontak') }}">
                        <i class="fas fa-file"></i>
                        <p>Kontak</p>
                    </a>
                </li>

                {{-- Data Umum  --}}
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Manajemen Data Umum</h4>
                </li>

                <li class="nav-item @if (Request::segment(2) == 'kategori-judul') active @endif">
                    <a href="{{ url('admin/kategori-judul') }}">
                        <i class="fas fa-database"></i>
                        <p>Kategori Judul</p>
                    </a>
                </li>

                <li class="nav-item @if (Request::segment(2) == 'sub-kategori-judul') active @endif">
                    <a href="{{ url('admin/sub-kategori-judul') }}">
                        <i class="fas fa-folder"></i>
                        <p>Sub Kategori Judul</p>
                    </a>
                </li>

                <li class="nav-item @if (Request::segment(2) == 'data-umum') active @endif">
                    <a href="{{ url('admin/data-umum') }}">
                        <i class="fas fa-book"></i>
                        <p>Data Umum</p>
                    </a>
                </li>

                {{-- Data Umum  --}}

                @if (Auth::user()->role == 'admin')
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Manajemen</h4>
                    </li>
                    <li class="nav-item @if (Request::segment(2) == 'slider') active @endif">
                        <a href="{{ route(Auth::user()->role . '.slider') }}">
                            <i class="fas fa-images"></i>
                            <p>Slider</p>
                        </a>
                    </li>
                    <li class="nav-item @if (Request::segment(2) == 'setting') active @endif">
                        <a href="{{ route(Auth::user()->role . '.setting') }}">
                            <i class="fas fa-cog"></i>
                            <p>Pengaturan Website</p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('logout', Auth::user()->role) }}">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Keluar</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
