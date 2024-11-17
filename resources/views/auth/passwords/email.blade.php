@extends('layouts.auth')

@section('content')
    <main>
        <div class="login-container">
            <div class="container">
                <div class="row page-login d-flex align-items-center">
                    <div class="section-left col-12 col-md-6">
                        <h1 class="mb-4">We explore the new <br /> life much better</h1>
                        <img src="{{ asset('frontend/images/send-email.svg') }}" alt="Send Email Image"
                            class="w-75 d-none d-sm-flex">
                    </div>

                    <div class="section-righ t col-12 col-md-4">
                        <div class="card shadow border-0">
                            <div class="card-body px-4 pb-4">
                                <div class="pb-2">
                                    <h3 class="fw-bold pb-3" style="color: #ff9e53;">Reset Password</h3>

                                    <p class="text-secondary">
                                        Masukkan email yang terkait dengan akun Anda dan kami akan mengirimkan
                                        pengaturan ulang password.
                                    </p>
                                </div>

                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('password.email') }}">
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

                                    <button type="submit" class="btn btn-login w-100">Kirim</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
