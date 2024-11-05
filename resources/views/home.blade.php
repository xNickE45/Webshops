@extends('layouts.app')

@section('content')
<div class="container">
    @auth
        @if(Auth::user()->is_admin)
            <a href="{{ route('admin.index') }}">Admin Console</a>
        @endif
    @endauth
    <div class="row">
        @foreach($consoles as $console)
            <div class="col-md-4">
                <div class="card">
                    @if($console->image_url)
                    <img src="{{ asset('storage/' . $console->image_url) }}" alt="{{ $console->name }}">
                    @else
                        <img src="path/to/default/image.jpg" class="card-img-top" alt="Default Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $console->name }}</h5>
                        <p class="card-text">Price: ${{ $console->price }}</p>
                        <p class="card-text">Available: {{ $console->amount }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

<style>
    .card {
        margin-bottom: 20px;
    }
    .card img {
        width: 300px; /* Default width for images */
    }
    .card-title {
        font-size: 20px;
        font-weight: bold;
    }
    .card-text {
        font-size: 16px;
    }
</style>
