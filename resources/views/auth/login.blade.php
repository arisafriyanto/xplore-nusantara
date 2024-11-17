@extends('layouts.auth')

@section('content')
    <main>
        <div class="login-container">
            <div class="container">
                <div class="row page-login d-flex align-items-center">
                    <div class="section-left col-12 col-md-6">
                        <h1 class="mb-4">We explore the new <br /> life much better</h1>
                        <img src="{{ asset('frontend/images/u_explore.svg') }}" alt="Login Image"
                            class="w-75 d-none d-sm-flex">
                    </div>

                    <div class="section-right col-12 col-md-4">
                        <div class="card shadow border-0">
                            <div class="card-body px-4 pb-4">
                                <div class="text-center">
                                    <img src="{{ asset('frontend/images/logo-xplore.png') }}" alt="Logo"
                                        class="mb-4 mt-3" style="width: 145px">
                                </div>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" autocomplete="email"
                                            placeholder="user@gmail.com" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" autocomplete="current-password" placeholder="********">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-between mb-3">

                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">Ingat saya</label>
                                        </div>

                                        @if (Route::has('password.request'))
                                            <div class="text-center">
                                                <a href="{{ route('password.request') }}" class="text-secondary">Lupa
                                                    password?</a>
                                            </div>
                                        @endif

                                    </div>

                                    <button type="submit" class="btn btn-login w-100">Masuk</button>

                                    <p class="text-center mt-4 text-secondary">
                                        Belum punya akun? <a href="{{ route('register') }}"
                                            class="text-secondary">Daftar</a>
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
