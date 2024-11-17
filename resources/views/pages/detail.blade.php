@extends('layouts.app')

@section('title', 'Detail Travel')

@section('content')
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Paket Travel
                                </li>
                                <li class="breadcrumb-item active">
                                    Detail
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card card-details">
                            <h1>{{ $item->title }}</h1>
                            <p>{{ $item->location }}</p>

                            @if ($item->galleries->count())
                                <div class="gallery">
                                    <div class="xzoom-container">
                                        <img src="{{ Storage::url($item->galleries->first()->image) }}" class="xzoom"
                                            id="xzoom-default"
                                            xoriginal="{{ Storage::url($item->galleries->first()->image) }}">
                                    </div>

                                    <div class="xzoom-thumbs">
                                        @foreach ($item->galleries as $gallery)
                                            <a href="{{ Storage::url($gallery->image) }}">
                                                <img src="{{ Storage::url($gallery->image) }}" class="xzoom-gallery"
                                                    width="128" height="88"
                                                    xpreview="{{ Storage::url($gallery->image) }}">
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <h2>Tentang Wisata</h2>
                            <p>
                                {!! nl2br($item->about) !!}
                            </p>

                            <div class="row features">
                                <div class="col-md-4">
                                    <div class="description">
                                        <img src="{{ asset('frontend/images/ic_event.png') }}" alt=""
                                            class="features-image">
                                        <div class="description">
                                            <h3>Acara Unggulan</h3>
                                            <p>{{ $item->featured_event }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 border-start">
                                    <div class="description">
                                        <img src="{{ asset('frontend/images/ic_bahasa.png') }}" alt=""
                                            class="features-image">
                                        <div class="description">
                                            <h3>Bahasa</h3>
                                            <p>{{ $item->language }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 border-start">
                                    <div class="description">
                                        <img src="{{ asset('frontend/images/ic_foods.png') }}" alt=""
                                            class="features-image">
                                        <div class="description">
                                            <h3>Makanan</h3>
                                            <p>{{ $item->foods }}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Anggota</h2>
                            <div class="member my-2">
                                <img src="{{ asset('frontend/images/avatar-1.png') }}" class="member-image me-1">

                                <img src="{{ asset('frontend/images/avatar-2.png') }}" class="member-image me-1">

                                <img src="{{ asset('frontend/images/avatar-3.png') }}" class="member-image me-1">

                                <img src="{{ asset('frontend/images/avatar-5.png') }}" class="member-image me-1">
                            </div>
                            <hr>
                            <h2>Informasi Perjalanan</h2>
                            <table class="trip-informations">
                                <tr>
                                    <th width="50%">Tanggal Keberangkatan</th>
                                    <td width="50%" class="text-end">
                                        {{ \Carbon\Carbon::create($item->departure_date)->format('n F, Y') }}
                                    </td>
                                </tr>

                                <tr>
                                    <th width="50%">Durasi</th>
                                    <td width="50%" class="text-end">
                                        {{ $item->duration }} Hari
                                    </td>
                                </tr>

                                <tr>
                                    <th width="50%">Jenis</th>
                                    <td width="50%" class="text-end">
                                        {{ $item->type }}
                                    </td>
                                </tr>

                                <tr>
                                    <th width="50%">Harga</th>
                                    <td width="50%" class="text-end">
                                        {{ formatCurrency($item->price) }} / orang
                                    </td>
                                </tr>
                            </table>

                            <div class="join-container">
                                @auth
                                    <form action="{{ route('checkout.process', $item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn d-block btn-join-now mt-5 py-2 w-100">
                                            Gabung Sekarang
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="btn d-block btn-join-now mt-5 py-2">
                                        Login atau Daftar untuk Bergabung
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ asset('frontend/libraries/xzoom/xzoom.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ asset('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".xzoom, .xzoom-gallery").xzoom({
                zoomWidth: 300,
                zoomHeight: 300,
                title: false,
                tint: '#333',
                xoffset: 15
            });
        });
    </script>
@endpush
