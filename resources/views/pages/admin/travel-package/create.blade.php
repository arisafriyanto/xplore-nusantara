@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Paket Travel</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('travel-package.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" name="title" id="title" class="form-control"
                            placeholder="Masukkan judul" value="{{ old('title') }}">
                    </div>

                    <div class="form-group">
                        <label for="location">Lokasi</label>
                        <input type="text" name="location" id="location" class="form-control"
                            placeholder="Masukkan lokasi" value="{{ old('location') }}">
                    </div>

                    <div class="form-group">
                        <label for="about">Tentang</label>
                        <textarea name="about" id="about" cols="30" rows="10" class="d-block w-100 form-control">{{ old('about') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="featured_event">Acara Unggulan</label>
                        <input type="text" name="featured_event" id="featured_event" class="form-control"
                            placeholder="Masukkan acara unggulan" value="{{ old('featured_event') }}">
                    </div>

                    <div class="form-group">
                        <label for="language">Bahasa</label>
                        <input type="text" name="language" id="language" class="form-control"
                            placeholder="Masukkan bahasa" value="{{ old('language') }}">
                    </div>

                    <div class="form-group">
                        <label for="foods">Makanan</label>
                        <input type="text" name="foods" id="foods" class="form-control"
                            placeholder="Masukkan makanan" value="{{ old('foods') }}">
                    </div>

                    <div class="form-group">
                        <label for="departure_date">Keberangkatan</label>
                        <input type="text" name="departure_date" id="departure_date" class="form-control datepicker"
                            value="{{ old('departure_date') }}">
                    </div>

                    <div class="form-group">
                        <label for="duration">Durasi</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <input type="number" name="duration" id="duration" class="form-control"
                                placeholder="Masukkan durasi" value="{{ old('duration') }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Hari</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type">Tipe</label>
                        <input type="text" name="type" id="type" class="form-control" placeholder="Masukkan tipe"
                            value="{{ old('type') }}">
                    </div>

                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" name="price" id="price" class="form-control"
                            placeholder="Masukkan harga" value="{{ old('price') }}">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-50">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ asset('frontend/libraries/gijgo/css/gijgo.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ asset('frontend/libraries/gijgo/js/gijgo.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                uiLibrary: 'bootstrap4',
                icons: {
                    rightIcon: `<img src="{{ asset('frontend/images/ic_doe.png') }}" />`
                }
            })
        });
    </script>
@endpush
