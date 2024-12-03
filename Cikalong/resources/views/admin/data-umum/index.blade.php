@extends('admin.layouts.app')
@include('admin.layouts.partials.css')
@include('admin.layouts.partials.js')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">{{ $title }}</h3>
        </div>

        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{ url('admin/data-umum/create') }}" class="btn btn-primary btn-round"><i class="fas fa-plus"></i>
                Tambah</a>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('danger'))
                <div class="alert alert-danger">{{ session('danger') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    {!! implode('', $errors->all('<li>:message</li>')) !!}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori Judul</th>
                                        <th>Sub Kategori Judul</th>
                                        <th>File</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $urutan = 1;
                                    @endphp
                                    @foreach ($result as $item)
                                        <tr>
                                            <td>{{ $urutan++ }}</td>
                                            <td>{{ $item->kategoriJudul->name }}</td>
                                            <td>{{ $item->subKategoriJudul->name }}</td>
                                            <td>
                                                <a href="{{ asset('storage/' . $item->file_excel) }}" target="_blank"
                                                    rel="noopener noreferrer" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                    Lihat File
                                                </a>
                                            </td>
                                            <td>
                                                <a href="/admin/data-umum/{{ $item->id }}/edit"
                                                    class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('dataumum.destroy', $item->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-danger border-0"
                                                        onclick="return confirm('Are you sure?'); return false;"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
