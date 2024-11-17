@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Galeri Travel</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="travel_package_id">Paket Travel</label>
                        <select name="travel_package_id" id="travel_package_id" class="form-control" required>
                            <option value="">Pilih Paket Travel</option>
                            @foreach ($travel_packages as $travel_package)
                                <option value="{{ $travel_package->id }}">{{ $travel_package->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" name="image" id="image" placeholder="Gambar" class="form-control">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-50">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
