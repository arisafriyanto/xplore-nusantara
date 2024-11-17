@extends('layouts.checkout')

@section('title', 'Checkout')

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
                                <li class="breadcrumb-item">
                                    Detail
                                </li>
                                <li class="breadcrumb-item active">
                                    Pembayaran
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card card-details">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <h1>Siapa yang akan pergi?</h1>
                            <p>Perjalanan Ke {{ $item->travel_package->title }}, {{ $item->travel_package->location }}</p>

                            <div class="attendee">
                                <table class="table table-responsive-sm text-center">
                                    <thead>
                                        <tr>
                                            <td>Foto</td>
                                            <td>Username</td>
                                            <td>Alamat Email</td>
                                            <td>No Handphone</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($item->details as $detail)
                                            <tr class="align-middle">
                                                <td>
                                                    <img src="https://ui-avatars.com/api/?name={{ $detail->username }}"
                                                        height="60" class="rounded-circle">
                                                </td>
                                                <td>{{ $detail->username }}</td>
                                                <td>{{ $detail->user->email }}</td>
                                                <td>{{ $detail->user->no_hp }}</td>
                                                <td>
                                                    <a href="{{ route('checkout.remove', $detail->id) }}">
                                                        <img src="{{ url('frontend/images/ic_remove.png') }}">
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Tidak ada pengunjung</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="member mt-3">
                                <h2>Tambah Anggota</h2>
                                <form class="d-flex" method="post" action="{{ route('checkout.create', $item->id) }}">
                                    @csrf
                                    <div class="col-md-3">
                                        <div class="mb-2 me-sm-2">
                                            <input type="text" name="username" id="username" class="form-control"
                                                placeholder="Username" />
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="mb-2 ms-sm-2">
                                            <button type="submit" class="btn btn-add-now mb-2 px-4">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <h3 class="mt-2 mb-0">Catatan</h3>
                                <p class="disclaimer mb-0">
                                    Anda hanya dapat mengundang anggota yang telah terdaftar di Xplore.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Informasi Pembayaran</h2>
                            <table class="trip-informations">
                                <tr>
                                    <th width="50%">Anggota</th>
                                    <td width="50%" class="text-end">
                                        {{ $item->details->count() }} orang
                                    </td>
                                </tr>

                                <tr>
                                    <th width="50%">Harga</th>
                                    <td width="50%" class="text-end">
                                        {{ formatCurrency($item->travel_package->price) }} / orang
                                    </td>
                                </tr>

                                <tr>
                                    <th width="50%">Pajak</th>
                                    <td width="50%" class="text-end">
                                        {{ formatCurrency($item->pajak) }}
                                    </td>
                                </tr>

                                <tr>
                                    <th width="50%">Sub Total</th>
                                    <td width="50%" class="text-end">
                                        {{ formatCurrency($item->transaction_total) }}
                                    </td>
                                </tr>

                                <tr>
                                    <th width="50%">Total</th>
                                    <td width="50%" class="text-end">
                                        <span class="text-blue">{{ formatCurrency($item->transaction_total) }}</span>

                                    </td>
                                </tr>
                            </table>
                            <hr>


                            <h2>Instruksi Pembayaran</h2>
                            <p class="payment-instructions">
                                Anda akan diarahkan ke halaman lain untuk membayar menggunakan GO-PAY
                            </p>

                            <img src="{{ asset('frontend/images/gopay.png') }}" alt="Logo Gopay" class="w-50">

                            <div class="join-container">
                                <a href="{{ route('checkout.success', $item->id) }}"
                                    class="btn d-block btn-join-now mt-2 py-2">Proses Pembayaran</a>
                            </div>

                            <div class="text-center mt-3">
                                <a href="{{ route('details', $item->travel_package->slug) }}" class="text-muted">Batalkan
                                    Pemesanan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

{{-- @push('prepend-style')
    <link rel="stylesheet" href="{{ asset('frontend/libraries/gijgo/css/gijgo.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ asset('frontend/libraries/gijgo/js/gijgo.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                uiLibrary: 'bootstrap5',
                icons: {
                    rightIcon: `<img src="{{ asset('frontend/images/ic_doe.png') }}" />`
                }
            })
        });
    </script>
@endpush --}}
