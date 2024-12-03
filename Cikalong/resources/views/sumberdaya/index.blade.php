@extends('layouts.app')
@include('layouts.partials.css')
@include('layouts.partials.js')
@include('layouts.partials.header')

@section('content')
<!-- Services Start -->
<div class="container-fluid service py-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Sumber Daya Alam</h4>
            <h1 class="display-5 mb-4">Sumber Daya Alam</h1>
        </div>
        <div class="row g-4">

            @foreach($sumberdaya as $key => $value)
                
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
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="{{ route('sumberdaya.detail', $value->id) }}">Selengkapnya</a>
                    </div>
                </div>
            </div>

            @endforeach
            
        </div>
    </div>
</div>
<!-- Services End -->


@endsection