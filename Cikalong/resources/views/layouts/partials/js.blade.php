@section('js')
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/frontend/') }}/lib/wow/wow.min.js"></script>
    <script src="{{ asset('assets/frontend/') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('assets/frontend/') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('assets/frontend/') }}/lib/counterup/counterup.min.js"></script>
    <script src="{{ asset('assets/frontend/') }}/lib/lightbox/js/lightbox.min.js"></script>
    <script src="{{ asset('assets/frontend/') }}/lib/owlcarousel/owl.carousel.min.js"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('assets/frontend/') }}/js/main.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        @if (Session::has('berhasil'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.success("{{ session('berhasil') }}");
        @endif
    
        @if (Session::has('warning'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    
        @if (Session::has('errors'))
            toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
                @foreach ($errors->all() as $errors)
                    toastr.error("{{ $errors }}");
                @endforeach
        @endif
    </script>
@endsection