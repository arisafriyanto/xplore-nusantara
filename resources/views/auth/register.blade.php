@extends('layouts.auth')

@section('content')
    <main>
        <div class="login-container">
            <div class="container">
                <div class="row page-login d-flex align-items-center">
                    <div class="section-left col-12 col-md-6">
                        <h1 class="mb-4">We explore the new <br /> life much better</h1>
                        <img src="{{ asset('frontend/images/u_camp.svg') }}" alt="Login Image" class="w-75 d-none d-sm-flex">
                    </div>

                    <div class="section-right col-12 col-md-4">
                        <div class="card shadow border-0">
                            <div class="card-body px-4 pb-4">
                                <div class="text-center">
                                    <img src="{{ asset('frontend/images/logo-xplore.png') }}" alt="Logo"
                                        class="mb-4 mt-3" style="width: 145px">
                                </div>

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" autocomplete="name"
                                            placeholder="Masukkan nama Anda" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                                            name="username" value="{{ old('username') }}" autocomplete="username"
                                            placeholder="Masukkan username Anda">

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" autocomplete="email"
                                            placeholder="Masukkan email Anda">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label">No Handphone</label>
                                        <input type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                            name="no_hp" value="{{ old('no_hp') }}" autocomplete="no_hp"
                                            placeholder="No Handphone Anda">

                                        @error('no_hp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" autocomplete="current-password" placeholder="Password Anda">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                                        <input type="password"
                                            class="form-control @error('password-confirm') is-invalid @enderror"
                                            name="password_confirmation" autocomplete="new-password"
                                            placeholder="Konfirmasi Password Anda">

                                        @error('password-confirm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-login w-100">Daftar</button>

                                    <p class="text-center mt-4 text-secondary">
                                        Sudah punya akun? <a href="{{ route('login') }}" class="text-secondary">Masuk</a>
                                    </p>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
