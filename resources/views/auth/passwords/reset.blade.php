@extends('layouts.auth')

@section('content')
    <main>
        <div class="login-container">
            <div class="container">
                <div class="row page-login d-flex align-items-center">
                    <div class="section-left col-12 col-md-6">
                        <h1 class="mb-4">We explore the new <br /> life much better</h1>
                        <img src="{{ asset('frontend/images/u_password.svg') }}" alt="Reset Password Image"
                            class="w-50 d-none d-sm-flex">
                    </div>

                    <div class="section-righ t col-12 col-md-4">
                        <div class="card shadow border-0">
                            <div class="card-body px-4 pb-4">
                                <div class="pb-2">
                                    <h3 class="fw-bold pb-3" style="color: #ff9e53;">Reset Password</h3>

                                    <p class="text-secondary">
                                        Masukkan password baru di bawah ini untuk ubah password Anda.
                                    </p>
                                </div>

                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ $email ?? old('email') }}" autocomplete="email"
                                            placeholder="user@gmail.com" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password Baru</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" value="{{ old('password') }}" autocomplete="new-password"
                                            placeholder="********">

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
                                            name="password_confirmation" autocomplete="new-password" placeholder="********">

                                        @error('password-confirm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-login w-100">Reset Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
