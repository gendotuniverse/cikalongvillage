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
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('sub-kategori-judul.update', $result->id) }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>kategori</label>
                                <select name="kategori_judul_id" id="kategori_judul_id" class="form-control select2">
                                    <option value="">Pilih</option>
                                    @foreach ($kategoriJudul as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $result->kategori_judul_id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>name kategori</label>
                                <input type="text" name="name" class="form-control" placeholder="name kategori"
                                    value="{{ $result->name }}" required>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ url('admin/sub-kategori-judul') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
