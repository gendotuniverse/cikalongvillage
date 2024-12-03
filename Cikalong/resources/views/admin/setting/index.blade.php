@extends('admin.layouts.app')
@include('admin.layouts.partials.css')
@include('admin.layouts.partials.js')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Pengaturan Website</h3>
        </div>

        @if ($setting == '')
            <div class="ms-md-auto py-2 py-md-0">
                <a href="{{ route('admin.setting.add') }}" class="btn btn-primary btn-round"><i class="fas fa-plus"></i> Tambah</a>
            </div>
        @endif

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Website</th>
                                    <th>Logo</th>
                                    <th>Favicon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <script>
        $(function() {
            $('#table-1').dataTable({
                processing: true,
                serverSide: true,
                'ordering': 'true',
                'language' : {
                    "lengthMenu": "_MENU_ data per halaman",
                    "info": "Menampilkan data _PAGE_ dari total _PAGES_",
                    "infoEmpty": "Tidak ada data",
                    "search": "Cari"
                },
                ajax: {
                    url: "{{ route('admin.setting.list') }}",
                    data: function(d) {}
                },
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama_website',
                        name: 'nama_website'
                    },
                    {
                        data: 'logo',
                        name: 'logo'
                    },
                    {
                        data: 'favicon',
                        name: 'favicon'
                    },                 
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endsection