@extends('admin.layouts.app')
@include('admin.layouts.partials.css')
@include('admin.layouts.partials.js')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Pemerintahan</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($pemerintahan, ['method' => 'post', 'route' => ['admin.pemerintahan.update', $pemerintahan->id], 'enctype' => 'multipart/form-data']) !!}
                        @method('put')
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $pemerintahan->nama }}" placeholder="Nama" autocomplete="off">
                            <i class="text-danger">{{ $errors->first('nama') }}</i>
                        </div>
                        <div class="form-group">
                            <label for="">Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" value="{{ $pemerintahan->jabatan }}" placeholder="Jabatan" autocomplete="off">
                            <i class="text-danger">{{ $errors->first('jabatan') }}</i>
                        </div>
                        <div class="form-group">
                            <label for="">Gambar</label><br>
                            <img src="{{ url($pemerintahan->gambar) }}" width="80"><br>
                            <input type="file" name="gambar" class="form-control" placeholder="Logo" autocomplete="off">
                            <i class="text-danger">{{ $errors->first('gambar') }}</i>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('admin.pemerintahan') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.0.0/"
        }
    }
</script>
<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Bold,
        Italic,
        Font,
        Paragraph
    } from 'ckeditor5';

    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
            toolbar: {
                items: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            }
        } )
        .then( /* ... */ )
        .catch( /* ... */ );
</script>

@endsection