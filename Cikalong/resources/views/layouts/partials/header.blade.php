@section('header')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb"
        style="
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url({{ url($setting->bg_header) }});
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
    ">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ $title }}</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active text-primary">{{ $title }}</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->
@endsection
