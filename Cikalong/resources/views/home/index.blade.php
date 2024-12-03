@extends('layouts.app')
@include('layouts.partials.css')
@include('layouts.partials.js')
@include('layouts.partials.carousel')

@section('content')
    <!-- Abvout Start -->
    <div class="container-fluid service pb-5" style="padding-top: 9rem;">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Profil</h4>
                <h1 class="display-5 mb-4">Profil</h1>
            </div>
            <div class="row g-4">

                @foreach ($profil as $key => $value)
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="{{ url($value->gambar) }}" class="img-fluid rounded-top w-100" alt="Image">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="#" class="h4 d-inline-block mb-4">{{ $value->judul }}</a>
                                <div class="mb-4">
                                    {!! substr($value->deskripsi, 0, 250) . '...' !!}
                                </div>
                                <a class="btn btn-primary rounded-pill py-2 px-4"
                                    href="{{ route('pelayanan.detail', $value->id) }}">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- About End -->
    {{-- data umum  --}}

    <div class="container-fluid service pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Data Umum</h4>
                <h1 class="display-5 mb-4">Data Umum</h1>
            </div>
            <div class="row g-4">

                @foreach ($kategoriJudul as $item)
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img style="width: 100%;height: 300px;"
                                    src="https://cdn2.iconfinder.com/data/icons/metro-ui-icon-set/512/Excel_15.png"
                                    class="img-fluid rounded-top w-100" alt="Image">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="#" class="h4 d-inline-block mb-4">{{ $item->name }}</a>
                                <br>
                                <a class="btn btn-primary rounded-pill py-2 px-4"
                                    href="{{ url('data-umum/detail', $item->id) }}">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    {{-- data umum  --}}
    <!-- Services Start -->
    <div class="container-fluid service pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Pelayanan</h4>
                <h1 class="display-5 mb-4">Pelayanan Masyarakat</h1>
            </div>
            <div class="row g-4">

                @foreach ($layanan as $key => $value)
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="{{ url($value->gambar) }}" class="img-fluid rounded-top w-100" alt="Image">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="#" class="h4 d-inline-block mb-4">{{ $value->judul }}</a>
                                <div class="mb-4">
                                    {!! substr($value->deskripsi, 0, 250) . '...' !!}
                                </div>
                                <a class="btn btn-primary rounded-pill py-2 px-4"
                                    href="{{ route('pelayanan.detail', $value->id) }}">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- Blog Start -->
    <div class="container-fluid blog pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Berita & Kegiatan</h4>
                <h1 class="display-5 mb-4">Berita dan Kegiatan</h1>
            </div>
            <div class="owl-carousel blog-carousel wow fadeInUp" data-wow-delay="0.2s">

                @foreach ($berita as $key => $value)
                    <div class="blog-item p-4">
                        <div class="blog-img mb-4">
                            <img src="{{ url($value->gambar) }}" class="img-fluid w-100 rounded" alt="">
                        </div>
                        <a href="{{ route('berita.detail', $value->id) }}"
                            class="h4 d-inline-block mb-3">{{ $value->judul }}</a>
                        <div class="mb-4">
                            {!! substr($value->deskripsi, 0, 150) . '...' !!}
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <h5>{{ $setting->nama_website }}</h5>
                                <p class="mb-0">{{ AllHelper::tanggal($value->created_at) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Blog End -->


    <!-- Team Start -->
    <div class="container-fluid team pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Pemerintahan</h4>
                <h1 class="display-5 mb-4">Pemerintahan Desa</h1>
            </div>
            <div class="row g-4">

                @foreach ($pemerintahan as $key => $value)
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{ url($value->gambar) }}" class="img-fluid" alt="">
                            </div>
                            <div class="team-title">
                                <h4 class="mb-0">{{ $value->nama }}</h4>
                                <p class="mb-0">{{ $value->jabatan }}</p>
                            </div>
                            {{-- <div class="team-icon">
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-sm-square rounded-circle me-0" href=""><i
                                    class="fab fa-instagram"></i></a>
                        </div> --}}
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Blog Start -->
    <div class="container-fluid blog pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Galeri</h4>
                <h1 class="display-5 mb-4">Galeri</h1>
            </div>
            <div class="owl-carousel blog-carousel wow fadeInUp" data-wow-delay="0.2s">

                @foreach ($galeri as $key => $value)
                    <div class="blog-item p-4">
                        <div class="blog-img mb-4">
                            <img src="{{ url($value->gambar) }}" class="img-fluid w-100 rounded" alt="">
                            <div class="blog-title">
                                <a href="#" class="btn">{{ $value->judul }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Blog End -->

    <!-- Blog Start -->
    <div class="container-fluid blog pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Produk Unggulan</h4>
                <h1 class="display-5 mb-4">Produk Unggulan Desa</h1>
            </div>
            <div class="owl-carousel blog-carousel wow fadeInUp" data-wow-delay="0.2s">

                @foreach ($produk as $key => $value)
                    <div class="blog-item p-4">
                        <div class="blog-img mb-4">
                            <img src="{{ url($value->gambar) }}" class="img-fluid w-100 rounded" alt="">
                        </div>
                        <a href="{{ route('produk.detail', $value->id) }}"
                            class="h4 d-inline-block mb-3">{{ $value->judul }}</a>
                        <div class="mb-4">
                            {!! substr($value->deskripsi, 0, 150) . '...' !!}
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <h5>{{ $setting->nama_website }}</h5>
                                <p class="mb-0">{{ AllHelper::tanggal($value->created_at) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Blog End -->

    <!-- Services Start -->
    <div class="container-fluid service pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Sumber Daya Alam</h4>
                <h1 class="display-5 mb-4">Sumber Daya Alam</h1>
            </div>
            <div class="row g-4">

                @foreach ($sumberdaya as $key => $value)
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="{{ url($value->gambar) }}" class="img-fluid rounded-top w-100" alt="Image">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="#" class="h4 d-inline-block mb-4">{{ $value->judul }}</a>
                                <div class="mb-4">
                                    {!! substr($value->deskripsi, 0, 150) . '...' !!}
                                </div>
                                <a class="btn btn-primary rounded-pill py-2 px-4"
                                    href="{{ route('sumberdaya.detail', $value->id) }}">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Services End -->
@endsection
