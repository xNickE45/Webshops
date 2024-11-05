<!-- resources/views/admin/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $console->name }}</h1>
    <div class="card">
        <img src="{{ asset('storage/' . $console->image_url) }}" alt="{{ $console->name }}">
        <div class="card-body">
            <h5 class="card-title">{{ $console->name }}</h5>
            <p class="card-text">Price: ${{ $console->price }}</p>
            <p class="card-text">Available: {{ $console->amount }}</p>
        </div>
    </div>
    <a href="{{ route('admin.index') }}" class="btn btn-primary mt-3">Back to Dashboard</a>
</div>
@endsection

<style>
    .card {
        margin-bottom: 20px;
    }
    .card img {
        width: 300px; /* Adjust the width as needed */
    }
    .card-title {
        font-size: 20px;
        font-weight: bold;
    }
    .card-text {
        font-size: 16px;
    }
</style>
