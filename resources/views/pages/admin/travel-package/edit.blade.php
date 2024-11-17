@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Paket Travel {{ $item->title }}</h1>
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
                <form action="{{ route('travel-package.update', $item->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title"
                            value="{{ $item->title ?? old('title') }}">
                    </div>

                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" id="location" class="form-control" placeholder="Location"
                            value="{{ $item->location ?? old('location') }}">
                    </div>

                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea name="about" id="about" cols="30" rows="10" class="d-block w-100 form-control">{{ $item->about ?? old('about') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="featured_event">Featured Event</label>
                        <input type="text" name="featured_event" id="featured_event" class="form-control"
                            placeholder="Featured Event" value="{{ $item->featured_event ?? old('featured_event') }}">
                    </div>

                    <div class="form-group">
                        <label for="language">Language</label>
                        <input type="text" name="language" id="language" class="form-control" placeholder="Language"
                            value="{{ $item->language ?? old('language') }}">
                    </div>

                    <div class="form-group">
                        <label for="foods">Foods</label>
                        <input type="text" name="foods" id="foods" class="form-control" placeholder="Foods"
                            value="{{ $item->foods ?? old('foods') }}">
                    </div>

                    <div class="form-group">
                        <label for="departure_date">Departure Date</label>
                        <input type="date" name="departure_date" id="departure_date" class="form-control"
                            placeholder="Departure Date" value="{{ $item->departure_date ?? old('departure_date') }}">
                    </div>

                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <input type="text" name="duration" id="duration" class="form-control" placeholder="Duration"
                            value="{{ $item->duration ?? old('duration') }}">
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" name="type" id="type" class="form-control" placeholder="Type"
                            value="{{ $item->type ?? old('type') }}">
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control" placeholder="Price"
                            value="{{ $item->price ?? old('price') }}">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-50">Edit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
