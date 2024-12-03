@extends('admin.layouts.app')
@include('admin.layouts.partials.css')
@include('admin.layouts.partials.js')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">{{ $title }}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('data-umum.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori_judul_id" id="kategori_judul_id" class="form-control select2">
                                <option value="">Pilih</option>
                                @foreach ($kategoriJudul as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="sub-kategori-container"></div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ url('admin/data-umum') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#kategori_judul_id').change(function() {
                const kategoriId = $(this).val();
                $('#sub-kategori-container').empty();

                if (kategoriId) {
                    $.ajax({
                        url: "{{ route('data-umum.get-sub-kategori') }}",
                        method: "GET",
                        data: {
                            kategori_judul_id: kategoriId
                        },
                        success: function(response) {
                            let html = '<div class="form-group"><label>Sub Kategori</label>';
                            response.forEach(function(subKategori, index) {
                                html += `
                                    <div class="form-group">
                                        <label>${subKategori.name}</label>
                                        <input type="hidden" name="sub_kategori_judul_id[]" value="${subKategori.id}">
                                        <input type="file" name="file_excel[]" class="form-control" required>
                                    </div>
                                `;
                            });
                            html += '</div>';
                            $('#sub-kategori-container').html(html);
                        },
                        error: function() {
                            alert('Gagal memuat sub kategori.');
                        }
                    });
                }
            });
        });
    </script>
@endsection
