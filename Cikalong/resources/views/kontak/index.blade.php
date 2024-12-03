@extends('layouts.app')
@include('layouts.partials.css')
@include('layouts.partials.js')
@include('layouts.partials.header')

@section('content')
<!-- Contact Start -->
<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-xl-6">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <div class="bg-light rounded p-5 mb-5">
                        <h4 class="text-primary mb-4">Informasi</h4>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="contact-add-item">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fas fa-map-marker-alt fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>Alamat</h4>
                                        <p class="mb-0">{{ $setting->alamat }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-add-item">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fas fa-envelope fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>Email</h4>
                                        <p class="mb-0">{{ $setting->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-add-item">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fa fa-phone-alt fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>Telepon</h4>
                                        <p class="mb-0">{{ $setting->no_telp }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light p-5 rounded h-100 wow fadeInUp" data-wow-delay="0.2s">
                        <h4 class="text-primary">Kirim Masukkan</h4>
                        {!! Form::open(['method' => 'post', 'route' => ['proseskontak']]) !!}
                            <div class="row g-4">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" name="nama" class="form-control border-0" id="name" placeholder="Nama">
                                        <label for="name">Nama</label>
                                    </div>
                                    <i class="text-danger">{{ $errors->first('nama') }}</i>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control border-0" id="email" placeholder="Email">
                                        <label for="email">Email</label>
                                    </div>
                                    <i class="text-danger">{{ $errors->first('email') }}</i>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" name="subjek" class="form-control border-0" id="subject" placeholder="Subjek">
                                        <label for="subject">Subjek</label>
                                    </div>
                                    <i class="text-danger">{{ $errors->first('subjek') }}</i>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0" name="pesan" placeholder="Pesan" id="message" style="height: 160px"></textarea>
                                        <label for="message">Pesan</label>
                                    </div>
                                    <i class="text-danger">{{ $errors->first('pesan') }}</i>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3">Kirim</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                <div class="rounded h-100">
                    <iframe class="rounded h-100 w-100" 
                    style="height: 400px;" src="{{ $setting->google_map }}" 
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection