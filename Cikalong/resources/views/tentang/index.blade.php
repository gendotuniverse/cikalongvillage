@extends('layouts.app')
@include('layouts.partials.css')
@include('layouts.partials.js')
@include('layouts.partials.header')

@section('content')
<!-- Abvout Start -->
<div class="container-fluid service py-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Profil</h4>
            <h1 class="display-5 mb-4">Profil</h1>
        </div>
        <div class="row g-4">

            @foreach($profil as $key => $value)

            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ url($value->gambar) }}" class="img-fluid rounded-top w-100" alt="Image">
                    </div>
                    <div class="rounded-bottom p-4">
                        <a href="#" class="h4 d-inline-block mb-4">{{ $value->judul }}</a>
                        <div class="mb-4">
                            {!! substr($value->deskripsi, 0, 250).'...' !!}
                        </div>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="{{ route('profil.detail', $value->id) }}">Selengkapnya</a>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</div>
<!-- About End -->

<!-- Team Start -->
<div class="container-fluid team pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Pemerintahan</h4>
            <h1 class="display-5 mb-4">Pemerintahan Desa</h1>
        </div>
        <div class="row g-4">

            @foreach($pemerintahan as $key => $value)

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

@endsection