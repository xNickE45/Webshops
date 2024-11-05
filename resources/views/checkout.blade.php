@extends('layouts.app')

@section('content')
    <h1>Checkout</h1>
    <ul>
        @foreach($cartItems as $item)
            <li>{{ $item->name }} - ${{ $item->price }}</li>
        @endforeach
    </ul>
    <p>Total: ${{ $total }}</p>
    <form action="{{ route('order.place') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Place Order</button>
    </form>
@endsection
