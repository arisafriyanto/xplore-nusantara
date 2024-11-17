@extends('layouts.auth')

@section('content')
    <div class="container">

        <div class="row justify-content-center pt-5 mt-5">
            <div class="col-sm-8 mb-3 mb-sm-0">
                <div class="card shadow border-0">
                    <a class="navbar-brand text-center pt-5" href="{{ route('home') }}">
                        <img src="{{ asset('frontend/images/logo-xplore.png') }}" alt="Logo Xplore">
                    </a>

                    <div class="card-body text-center px-5 pt-4 mt-1 pb-5">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                            </div>
                        @endif
                        <h5 class="card-title fs-3 pb-3">Mohon verifikasi email Anda</h5>
                        <div class="row justify-content-center card-text pb-3">
                            <span class="d-block">Anda hampir selesai! Kami telah mengirim email ke</span>
                            <span class="d-block fw-bold pb-4 fs-5">{{ auth()->user()->email }}</span>
                            <span class="d-block w-75 pb-4">
                                Cukup klik tautan dalam email tersebut untuk menyelesaikan pendaftaran Anda. Jika Anda tidak
                                melihatnya, Anda mungkin perlu memeriksa folder spam.
                            </span>
                            <span class="d-block pb-1">
                                Masih tidak dapat menemukan email?
                            </span>
                        </div>

                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary-orange">{{ __('Kirim Ulang Email') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
