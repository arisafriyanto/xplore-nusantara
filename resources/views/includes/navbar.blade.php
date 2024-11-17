    <!-- Navbar -->

    <div class="container px-0 px-md-2">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('frontend/images/logo-xplore.png') }}" alt="Logo Xplore">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navb"
                    aria-controls="navb" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navb">
                    <ul class="navbar-nav ms-auto me-3">
                        <li class="nav-item mx-md-2">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item mx-md-2">
                            <a class="nav-link" href="#popular">Paket Travel</a>
                        </li>
                        <li class="nav-item mx-md-2">
                            <a class="nav-link" href="#networks">Mitra</a>
                        </li>
                        <li class="nav-item mx-md-2">
                            <a class="nav-link" href="#testimonialsHeading">Testimonial</a>
                        </li>
                        <li class="nav-item mx-md-2">
                            <a class="nav-link" href="#">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    style="color: #ff9e53;" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.0004 9V6C16.0004 3.79086 14.2095 2 12.0004 2C9.79123 2 8.00037 3.79086 8.00037 6V9M3.59237 10.352L2.99237 16.752C2.82178 18.5717 2.73648 19.4815 3.03842 20.1843C3.30367 20.8016 3.76849 21.3121 4.35839 21.6338C5.0299 22 5.94374 22 7.77142 22H16.2293C18.057 22 18.9708 22 19.6423 21.6338C20.2322 21.3121 20.6971 20.8016 20.9623 20.1843C21.2643 19.4815 21.179 18.5717 21.0084 16.752L20.4084 10.352C20.2643 8.81535 20.1923 8.04704 19.8467 7.46616C19.5424 6.95458 19.0927 6.54511 18.555 6.28984C17.9444 6 17.1727 6 15.6293 6L8.37142 6C6.82806 6 6.05638 6 5.44579 6.28984C4.90803 6.54511 4.45838 6.95458 4.15403 7.46616C3.80846 8.04704 3.73643 8.81534 3.59237 10.352Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </li>
                    </ul>

                    @guest
                        <!-- Mobile button -->
                        <form class="form-inline d-sm-block d-md-none">
                            <button type="button" class="btn btn-login my-2 my-sm-0"
                                onclick="event.preventDefault(); location.href='{{ route('login') }}';">Masuk</button>
                        </form>

                        <!-- Desktop button -->
                        <form class="form-inline my-2 my-lg-0 d-none d-md-block"
                            onclick="event.preventDefault(); location.href='{{ route('login') }}';">
                            <button type="button" class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">Masuk</button>
                        </form>
                    @else
                        <!-- Mobile button -->
                        <form action="{{ route('logout') }}" method="post" class="form-inline d-sm-block d-md-none">
                            @csrf
                            <button type="submit" class="btn btn-login my-2 my-sm-0">Keluar</button>
                        </form>

                        <!-- Desktop button -->
                        <form action="{{ route('logout') }}" method="post"
                            class="form-inline my-2 my-lg-0 d-none d-md-block">
                            @csrf
                            <button type="submit" class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">Keluar</button>
                        </form>
                    @endguest
                </div>
            </div>
        </nav>
    </div>
