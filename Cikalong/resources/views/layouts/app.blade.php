<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $setting->nama_website }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="icon" href="{{ url($setting->favicon) }}" type="image/x-icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    @yield('css')

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    @include('layouts.partials.topbar')

    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <h3 class="text-primary"><img src="{{ url($setting->logo) }}"
                        alt="">{{ $setting->nama_website }}</h3>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ route('home') }}"
                        class="nav-item nav-link @if (Request::segment(1) == '' || Request::segment(1) == 'home') active @endif">Beranda</a>
                    <a href="{{ route('tentang') }}"
                        class="nav-item nav-link @if (Request::segment(1) == 'tentang') active @endif">Profil</a>
                    <a href="{{ url('data-umum') }}"
                        class="nav-item nav-link @if (Request::segment(1) == 'data-umum') active @endif">Data Umum</a>
                    <a href="{{ route('pelayanan') }}"
                        class="nav-item nav-link @if (Request::segment(1) == 'pelayanan') active @endif">Pelayanan</a>
                    <a href="{{ route('fasilitas_desa') }}"
                        class="nav-item nav-link @if (Request::segment(1) == 'fasilitas_desa') active @endif">Fasilitas Desa</a>
                    <a href="{{ route('berita') }}"
                        class="nav-item nav-link @if (Request::segment(1) == 'berita') active @endif">Berita dan
                        Kegiatan</a>
                    <a href="{{ route('produk') }}"
                        class="nav-item nav-link @if (Request::segment(1) == 'produk') active @endif">Produk Unggulan</a>
                    <a href="{{ route('sumberdaya') }}"
                        class="nav-item nav-link @if (Request::segment(1) == 'sumberdaya') active @endif">Sumber Daya Alam</a>
                    <a href="{{ route('kontak') }}"
                        class="nav-item nav-link @if (Request::segment(1) == 'kontak') active @endif">Kontak Kami</a>
                </div>
            </div>
        </nav>

        @yield('carousel')
        @yield('header')
    </div>
    <!-- Navbar & Hero End -->


    @yield('content')

    @include('layouts.partials.footer')


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    @yield('js')

    @yield('script')
</body>

</html>
