@extends('admin.layouts.app')
@include('admin.layouts.partials.css')
@include('admin.layouts.partials.js')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Berita</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['method' => 'post', 'route' => ['admin.berita.store'], 'enctype' => 'multipart/form-data']) !!}

                        <div class="form-group">
                            <label for="">Judul</label>
                            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" placeholder="Judul" autocomplete="off">
                            <i class="text-danger">{{ $errors->first('judul') }}</i>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="editor" rows="5" placeholder="Deskripsi" autocomplete="off">{!! old('deskripsi') !!}</textarea>
                            <i class="text-danger">{{ $errors->first('deskripsi') }}</i>
                        </div>
                        <div class="form-group">
                            <label for="">Gambar</label>
                            <input type="file" name="gambar" class="form-control" placeholder="Logo" autocomplete="off">
                            <i class="text-danger">{{ $errors->first('gambar') }}</i>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('admin.berita') }}" class="btn btn-primary">Kembali</a>
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