@extends('layouts.app')
@include('layouts.partials.css')
@include('layouts.partials.js')
@include('layouts.partials.header')

@section('content')
    <!-- Abvout Start -->
    <div class="container-fluid service py-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">{{ $title }}</h4>
                <h1 class="display-5 mb-4">{{ $title }} - Per Kategori Judul</h1>
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
    <!-- About End -->
@endsection
