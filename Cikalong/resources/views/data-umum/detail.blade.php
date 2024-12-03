@extends('layouts.app')
@include('layouts.partials.css')
@include('layouts.partials.js')
@include('layouts.partials.header')

@section('content')
    <!-- About Start -->
    <div class="container-fluid about py-5">
        <div class="container py-5">
            <div class="container py-5">
                <h1>{{ $judul->kategoriJudul->name }}</h1>
                @foreach ($dataUmum as $item)
                @endforeach
                @foreach ($sheetData as $index => $data)
                    <h3>{{ $index + 1 }}. {{ $item->subKategoriJudul->name }} </h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                @foreach ($data[0] as $header)
                                    <th>{{ $header }}</th> <!-- Menampilkan header -->
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (array_slice($data, 1) as $row)
                                <!-- Menampilkan baris data -->
                                <tr>
                                    @foreach ($row as $cell)
                                        <td>{{ $cell }}</td> <!-- Menampilkan setiap sel -->
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endforeach
            </div>
            {{-- @php
                $urut = 1;
            @endphp
            @foreach ($dataUmum as $item)
                <div class="row g-5 align-items-center">
                    <div class="col-xl-12 wow fadeInLeft" data-wow-delay="0.2s">
                        <div>
                            <hr>
                            <h3>{{ $urut++ }}. {{ $item->subKategoriJudul->name }}</h3>
                            <div class="card bg-primary p-3">
                                @if (!empty($sheetData))
                                    <b>Menampilkan file Excel:</b>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                @foreach ($sheetData[0] as $header)
                                                    <th>{{ $header }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (array_slice($sheetData, 1) as $row)
                                                <tr>
                                                    @foreach ($row as $cell)
                                                        <td>{{ $cell }}</td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p class="text-white">File Excel tidak tersedia.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach --}}
            <br>
            <a href="{{ url('data-umum') }}" class="btn btn-danger btn-block"> Kembali</a>
        </div>
    </div>
    <!-- About End -->
@endsection
