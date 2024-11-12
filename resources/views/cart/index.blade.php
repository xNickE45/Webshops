<!-- resources/views/cart/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Cart</h1>
    <div class="row total-header-section">
        <div class="col-lg-6 col-sm-6 col-6">
        </div>
        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
            <p>Total: <span class="text-info">$ {{ $cartItems->sum(function($cartItem) { return $cartItem->amount * $cartItem->product->price; }) }}</span></p>
        </div>
    </div>
    @if($cartItems->isNotEmpty())
        @foreach($cartItems as $cartItem)
            <div class="row cart-detail">
                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                    <img src="{{ asset('storage/' . $cartItem->product->image_url) }}" />
                </div>
                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                    <p>{{ $cartItem->product->name }}</p>
                    <span class="price text-info"> ${{ $cartItem->product->price }} Each</span>
                    <div class="quantity">
                        <form action="{{ route('cart.decrement') }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="id" value="{{ $cartItem->console_id }}">
                            <button type="submit" class="btn btn-secondary btn-sm">-</button>
                        </form>
                        <span class="count"> {{ $cartItem->amount }} </span>
                        <form action="{{ route('cart.increment') }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="id" value="{{ $cartItem->console_id }}">
                            <button type="submit" class="btn btn-secondary btn-sm">+</button>
                        </form>
                    </div>
                    <p class="total-price">Total: ${{ $cartItem->amount * $cartItem->product->price }}</p>
                </div>
            </div>
        @endforeach
    @else
        <div class="row cart-detail">
            <div class="col-lg-12 col-sm-12 col-12 cart-detail-product">
                <p>No items in cart</p>
            </div>
        </div>
    @endif
    <div class="row total-footer-section">
        <div class="col-lg-12 col-sm-12 col-12 text-right">
            <div class="">
                <div class="card-body">
                    <h3>Total: <span class="text-info">$ {{ $cartItems->sum(function($cartItem) { return $cartItem->amount * $cartItem->product->price; }) }}</span></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
            <a href="{{ route('checkout') }}" class="btn btn-primary btn-block">Checkout</a>
        </div>
    </div>
</div>
@endsection

<style>
    .total-header-section {
        border-bottom: 1px solid #d2d2d2;
        padding-bottom: 10px;
    }
    .cart-detail {
        border-bottom: 1px solid #d2d2d2;
        padding: 10px 0;
    }
    .cart-detail-img img {
        width: 50%;
        height: auto;
    }
    .cart-detail-product h5 {
        margin: 0;
    }
    .cart-detail-product .price {
        color: #007bff;
    }
    .cart-detail-product .count {
        font-size: 16px;
        margin: 0 10px;
    }
    .quantity {
        display: flex;
        align-items: center;
    }
    .quantity button {
        margin: 0 5px;
    }
    .checkout {
        padding: 20px 0;
    }
    .checkout a {
        text-decoration: none;
    }

    .total-footer-section {
        margin-top: 20px;
        padding-top: 10px;
    }
    .card-body {
        margin-top: 10px;
        padding: 20px;
    }
    .total-price {
        font-size: 18px;
        font-weight: bold;
        position: absolute;
        right: 20px;
    }
</style>
