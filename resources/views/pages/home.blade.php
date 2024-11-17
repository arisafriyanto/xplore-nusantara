@extends('layouts.app')

@section('content')
    <!-- Header -->

    <header class="text-center">
        <h1>
            Dunia Indah Menantimu
            <br />
            <span style="font-size: 45px">Dengan Satu Klik</span>
        </h1>
        <p class="mt-3">
            Anda akan melihat
            <br />
            Momen indah yang belum pernah Anda lihat
        </p>

        <a href="#popular" class="btn btn-get-started px-4 mt-4">Mulai</a>
    </header>

    <!-- Main -->

    <main>
        <div class="container">
            <section class="section-stats row justify-content-center text-center" id="stats">
                <div class="col-3 col-md-2 stats-detail ps-2">
                    <h2>200</h2>
                    <p>Anggota</p>
                </div>

                <div class="col-3 col-md-2 stats-detail">
                    <h2>24</h2>
                    <p>Wisata</p>
                </div>

                <div class="col-3 col-md-2 stats-detail">
                    <h2>30</h2>
                    <p>Hotel</p>
                </div>

                <div class="col-3 col-md-2 stats-detail">
                    <h2>12</h2>
                    <p>Mitra</p>
                </div>
            </section>
        </div>

        <section class="section-popular" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-popular-heading">
                        <h2>Wisata Popular</h2>
                        <p>
                            Sesuatu yang tidak pernah Anda coba
                            <br />
                            sebelumnya di dunia ini
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-popular-content" id="popularContent">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    @foreach ($items as $item)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card-travel text-center d-flex flex-column"
                                style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');">
                                <div class="travel-country">{{ $item->location }}</div>
                                <div class="travel-location">{{ $item->title }}</div>
                                <div class="travel-button mt-auto">
                                    <a href="{{ route('details', $item->slug) }}" class="btn btn-travel-details px-4">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section-networks" id="networks">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Mitra Kami</h2>
                        <p>
                            Perusahaan mempercayai kami
                            <br />
                            lebih dari sekadar perjalanan
                        </p>
                    </div>
                    <div class="col-md-8 text-center">
                        <img src="{{ asset('frontend/images/partner.png') }}" class="img-patner" />
                    </div>
                </div>
            </div>
        </section>

        <section class="section-testimonials-heading" id="testimonialsHeading">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>Kata Mereka Tentang Kita</h2>
                        <p>
                            Saat-saat memberi mereka
                            <br />
                            pengalaman terbaik
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-testimonials-content" id="testimonialContent">
            <div class="container">
                <div class="section-popular-travel">
                    <div class="row justify-content-center">
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="card card-testimonial text-center">
                                <div class="testimonial-content">
                                    <img src="{{ asset('frontend/images/avatar-1.png') }}" alt="User 1"
                                        class="mb-4 rounded-circle">
                                    <h3 class="mb-4">Angga Risky</h3>
                                    <p class="testimonials">
                                        ” Sungguh luar biasa dan saya tidak bisa berhenti mengucapkan wohooo untuk setiap
                                        momennya, Dankeeeeee ”
                                    </p>
                                </div>
                                <hr />
                                <p class="trip-to mt-2">
                                    Trip to Ubud
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="card card-testimonial text-center">
                                <div class="testimonial-content">
                                    <img src="{{ asset('frontend/images/avatar-2.png') }}" alt="User 1"
                                        class="mb-4 rounded-circle">
                                    <h3 class="mb-4">Monica</h3>
                                    <p class="testimonials">
                                        ” Perjalanannya luar biasa dan saya melihat sesuatu yang indah di pulau itu yang
                                        membuat saya ingin belajar lebih banyak ”
                                    </p>
                                </div>
                                <hr />
                                <p class="trip-to mt-2">
                                    Trip to Nusa Penida
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="card card-testimonial text-center">
                                <div class="testimonial-content">
                                    <img src="{{ asset('frontend/images/avatar-3.png') }}" alt="User 1"
                                        class="mb-4 rounded-circle">
                                    <h3 class="mb-4">Sherly</h3>
                                    <p class="testimonials">
                                        ” Saya suka saat ombak berguncang lebih keras - saya juga takut ”
                                    </p>
                                </div>
                                <hr />
                                <p class="trip-to mt-2">
                                    Trip to Karimun Jawa
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 text-center">
                        <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">Bantuan</a>

                        <a href="{{ route('register') }}" class="btn btn-get-started px-4 mt-4 mx-1">Mulai</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
