@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Transaksi {{ $item->user->name }}</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{ $item->id }}</td>
                    </tr>

                    <tr>
                        <th>Paket Travel</th>
                        <td>{{ $item->travel_package->title }}</td>
                    </tr>

                    <tr>
                        <th>Pembeli</th>
                        <td>{{ $item->user->name }}</td>
                    </tr>

                    <tr>
                        <th>Pajak</th>
                        <td>{{ formatCurrency($item->pajak) }}</td>
                    </tr>

                    <tr>
                        <th>Total Transaksi</th>
                        <td>{{ formatCurrency($item->transaction_total) }}</td>
                    </tr>

                    <tr>
                        <th>Status Transaksi</th>
                        <td>{{ $item->transaction_status }}</td>
                    </tr>

                    <tr>
                        <th>Pembelian</th>
                        <td>
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>No Handphone</th>
                                </tr>
                                @foreach ($item->details as $detail)
                                    <tr>
                                        <td>{{ $detail->id }}</td>
                                        <td>{{ $detail->username }}</td>
                                        <td>{{ $item->user->email }}</td>
                                        <td>{{ $item->user->no_hp }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
