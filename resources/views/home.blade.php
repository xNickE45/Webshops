@extends('layouts.app')

@section('content')
<div class="container">
    @auth
        @if(Auth::user()->is_admin)
            <a href="{{ route('admin.index') }}" class="btn btn-primary mb-3">Admin Console</a>
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
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $console->id }}">
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </form>
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
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    .card img {
        width: 55%; /* Make images responsive */
        height: auto;

        /* Center images */
        display: block;
        margin-left: auto;
        margin-right: auto;
        
    }
    .card-title {
        font-size: 20px;
        font-weight: bold;
    }
    .card-text {
        font-size: 16px;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.2s, border-color 0.2s;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>
