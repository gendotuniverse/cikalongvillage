@extends('admin.layouts.app')
@include('admin.layouts.partials.css')
@include('admin.layouts.partials.js')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Slider</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['method' => 'post', 'route' => ['admin.slider.store'], 'enctype' => 'multipart/form-data']) !!}

                        <div class="form-group">
                            <label for="">Gambar</label>
                            <input type="file" name="gambar" class="form-control" placeholder="Logo" autocomplete="off">
                            <i class="text-danger">{{ $errors->first('gambar') }}</i>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('admin.slider') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection