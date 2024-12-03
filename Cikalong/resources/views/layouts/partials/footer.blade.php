<!-- Footer Start -->
<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-5 border-start-0 border-end-0"
        style="border: 1px solid; border-color: rgb(255, 255, 255, 0.08);">
        <div class="row g-5">
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="footer-item">
                    <a href="index.html" class="p-0">
                        <h4 class="text-white"><img src="{{ url($setting->logo) }}" width="80"> {{ $setting->nama_website }}</h4>
                        <!-- <img src="img/logo.png" alt="Logo"> -->
                    </a>
                    {{-- <p class="mb-4">Dolor amet sit justo amet elitr clita ipsum elitr est.Lorem ipsum dolor sit
                        amet, consectetur adipiscing...</p>
                    <div class="d-flex">
                        <a href="#" class="bg-primary d-flex rounded align-items-center py-2 px-3 me-2">
                            <i class="fas fa-apple-alt text-white"></i>
                            <div class="ms-3">
                                <small class="text-white">Download on the</small>
                                <h6 class="text-white">App Store</h6>
                            </div>
                        </a>
                        <a href="#" class="bg-dark d-flex rounded align-items-center py-2 px-3 ms-2">
                            <i class="fas fa-play text-primary"></i>
                            <div class="ms-3">
                                <small class="text-white">Get it on</small>
                                <h6 class="text-white">Google Play</h6>
                            </div>
                        </a>
                    </div> --}}
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="footer-item">
                    <h4 class="text-white mb-4">Menu</h4>
                    <a href="{{ route('tentang') }}"><i class="fas fa-angle-right me-2"></i> Tentang</a>
                    <a href="{{ route('pelayanan') }}"><i class="fas fa-angle-right me-2"></i> Pelayanan</a>
                    <a href="{{ route('berita') }}"><i class="fas fa-angle-right me-2"></i> Berita dan Kegiatan</a>
                    <a href="{{ route('produk') }}"><i class="fas fa-angle-right me-2"></i> Produk Unggulan</a>
                    <a href="{{ route('sumberdaya') }}"><i class="fas fa-angle-right me-2"></i> Sumber Daya Alam</a>
                    <a href="{{ route('kontak') }}"><i class="fas fa-angle-right me-2"></i> Kontak Kami</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="footer-item">
                    <h4 class="text-white mb-4">Kontak</h4>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-map-marker-alt text-primary me-3"></i>
                        <p class="text-white mb-0">{{ $setting->alamat }}</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-envelope text-primary me-3"></i>
                        <p class="text-white mb-0">{{ $setting->email }}</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fa fa-phone-alt text-primary me-3"></i>
                        <p class="text-white mb-0">{{ $setting->no_telp }}</p>
                    </div>
                    {{-- <div class="d-flex">
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href="#"><i
                                class="fab fa-facebook-f text-white"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href="#"><i
                                class="fab fa-twitter text-white"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href="#"><i
                                class="fab fa-instagram text-white"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-0" href="#"><i
                                class="fab fa-linkedin-in text-white"></i></a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Copyright Start -->
<div class="container-fluid copyright py-4">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-md-6 text-center text-md-start mb-md-0">
                <span class="text-body"><a href="#" class="border-bottom text-white"><i
                            class="fas fa-copyright text-light me-2"></i>{{ $setting->nama_website }}</a>, All right
                    reserved.</span>
            </div>
            
        </div>
    </div>
</div>
<!-- Copyright End -->