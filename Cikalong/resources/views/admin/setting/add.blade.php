@extends('admin.layouts.app')
@include('admin.layouts.partials.css')
@include('admin.layouts.partials.js')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Pengaturan Website</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['method' => 'post', 'route' => ['admin.setting.store'], 'enctype' => 'multipart/form-data']) !!}

                        <div class="form-group">
                            <label for="">Nama Website</label>
                            <input type="text" name="nama_website" class="form-control" value="{{ old('nama_website') }}" placeholder="Nama Website" autocomplete="off">
                            <i class="text-danger">{{ $errors->first('nama_website') }}</i>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email" autocomplete="off">
                            <i class="text-danger">{{ $errors->first('email') }}</i>
                        </div>
                        <div class="form-group">
                            <label for="">No Telepon</label>
                            <input type="number" name="no_telp" class="form-control" value="{{ old('no_telp') }}" placeholder="No Telepon" autocomplete="off">
                            <i class="text-danger">{{ $errors->first('no_telp') }}</i>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="5" placeholder="Alamat" autocomplete="off">{{ old('alamat') }}</textarea>
                            <i class="text-danger">{{ $errors->first('alamat') }}</i>
                        </div>
                        <div class="form-group">
                            <label for="">Logo</label>
                            <input type="file" name="logo" class="form-control" placeholder="Logo" autocomplete="off">
                            <i class="text-danger">{{ $errors->first('logo') }}</i>
                        </div>
                        <div class="form-group">
                            <label for="">Favicon</label>
                            <input type="file" name="favicon" class="form-control" placeholder="Favicon" autocomplete="off">
                            <i class="text-danger">{{ $errors->first('favicon') }}</i>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('admin.setting') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection