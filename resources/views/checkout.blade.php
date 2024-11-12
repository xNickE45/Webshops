@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Checkout</h1>
    <div class="row">
        <div class="col-lg-12">
            <h3>Order Summary</h3>
            <div class="order-summary">
                @if($cartItems->isNotEmpty())
                    @foreach($cartItems as $cartItem)
                        <div class="row cart-detail">
                            <div class="col-lg-2 col-sm-2 col-2 cart-detail-img">
                                <img src="{{ asset('storage/' . $cartItem->product->image_url) }}" class="img-fluid" alt="{{ $cartItem->product->name }}">
                            </div>
                            <div class="col-lg-6 col-sm-6 col-6 cart-detail-product">
                                <h5>{{ $cartItem->product->name }}</h5>
                                <p class="price text-info"> ${{ $cartItem->product->price }} Each</p>
                                <p class="count"> Quantity: {{ $cartItem->amount }}</p>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-4 text-right">
                                <p class="total-price"> ${{ $cartItem->amount * $cartItem->product->price }}</p>
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
                        <h3>Total: <span class="text-info">$ {{ $cartItems->sum(function($cartItem) { return $cartItem->amount * $cartItem->product->price; }) }}</span></h3>
                    </div>
                </div>
            </div>
            <h3>Select Payment Method</h3>
            <div class="payment-methods">
                <div class="payment-method" onclick="alert('This is not part of the exercise.')">
                    <img src="https://www.cardgate.com/wp-content/themes/cardgate/download.php?file=iDEAL.png" alt="IDEAL" class="img-fluid">
                </div>
                <div class="payment-method" onclick="alert('This is not part of the exercise.')">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/Maestro_logo.png/1200px-Maestro_logo.png" alt="Maestro" class="img-fluid">
                </div>
                <div class="payment-method" onclick="alert('This is not part of the exercise.')">
                    <img src="https://pngimg.com/d/paypal_PNG7.png" alt="PayPal" class="img-fluid">
                </div>
                <div class="payment-method" onclick="alert('This is not part of the exercise.')">
                    <img src="https://static.vecteezy.com/system/resources/previews/020/975/576/non_2x/visa-logo-visa-icon-transparent-free-png.png" alt="Visa" class="img-fluid">
                </div>
                <div class="payment-method" onclick="alert('This is not part of the exercise.')">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/MasterCard_Logo.svg/1280px-MasterCard_Logo.svg.png" alt="MasterCard" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .order-summary {
        margin-bottom: 20px;
    }
    .cart-detail {
        border-bottom: 1px solid #d2d2d2;
        padding: 10px 0;
    }
    .cart-detail-img img {
        width: 100%;
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
    }
    .total-price {
        font-size: 18px;
        font-weight: bold;
    }
    .total-footer-section {
        margin-top: 20px;
        padding-top: 10px;
        border-top: 1px solid #d2d2d2;
    }
    .payment-methods {
        display: flex;
        justify-content: space-around;
        margin-top: 20px;
    }
    .payment-method {
        cursor: pointer;
        transition: transform 0.2s;
    }
    .payment-method:hover {
        transform: scale(1.1);
    }
    .payment-method img {
        width: 100px;
        height: auto;
    }
</style>
