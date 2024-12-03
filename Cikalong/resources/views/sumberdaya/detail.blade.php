@extends('layouts.app')
@include('layouts.partials.css')
@include('layouts.partials.js')
@include('layouts.partials.header')

@section('content')
<!-- Abvout Start -->
<div class="container-fluid about py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-xl-7 wow fadeInLeft" data-wow-delay="0.2s">
                <div>
                    <h1 class="display-5 mb-4">{{ $sumberdaya->judul }}</h1>
                    <div class="mb-4">
                        {!! $sumberdaya->deskripsi !!}
                    </div>
                    
                </div>
            </div>
            <div class="col-xl-5 wow fadeInRight" data-wow-delay="0.2s">
                <div class="bg-primary rounded position-relative overflow-hidden">
                    <img src="{{ url($sumberdaya->gambar) }}" class="img-fluid rounded w-100" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

@endsection