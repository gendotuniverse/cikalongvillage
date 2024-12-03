@section('carousel')
    <!-- Carousel Start -->
    <div class="header-carousel owl-carousel">

        @foreach($slider as $key => $value)
            
            <div class="header-carousel-item">
                <img src="{{ url($value->gambar) }}" class="img-fluid w-100" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row gy-0 gx-5">
                            {{-- <div class="col-lg-0 col-xl-5"></div> --}}
                            <div class="col-12 animated fadeInUp">
                                <div class="text-center">
                                    <h4 class="text-primary text-uppercase fw-bold mb-4">Selamat Datang di</h4>
                                    <h1 class="display-4 text-uppercase text-white mb-4">{{ $setting->nama_website }}</h1>
                                   
                                    <div class="d-flex justify-content-center flex-shrink-0 mb-4">
                                        <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"> Tentang </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
        
    </div>
    <!-- Carousel End -->
@endsection