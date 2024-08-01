@extends('layout.app')
@section('title')

<style>
    .nav-top-svg{
        display: none;
    }

    <style>
    .input-group {
            margin-bottom: 15px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
        }
        .quantity-control {
            display: flex;
            align-items: center;
        }
        .quantity-control button {
            width: 30px;
            height: 30px;
            font-size: 18px;
            border: 1px solid #ccc;
            background-color: #f0f0f0;
            cursor: pointer;
        }
        .quantity-control input {
            width: 42px;
            text-align: center;
            border: 1px solid #ccc;
            /* margin: 0 5px; */
            border-left: 0;
            border-right: 0;
            text-align: end;
            height: 30px;
        }
        .total {
            font-weight: bold;
        }
</style>
</style>
@section('content')
<div class="about-us-main" data-aos="fade-down" data-aos-duration="1500">
    <div class="container text-center d-flex justify-content-center align-items-center">
        <h2 class="about-title">Cart</h2>
    </div>
</div>

<div class="cart-sec pt-3 pb-5 ">
    <div class="container">
        @if ($cartItems)
            <div class="row">
                <div class="col-md-8">
                    <div class="product-total">
                        <h5>Product <span class="text-end">Total</span></h5>
                        <hr>
                        @foreach ($cartItems as $cartItem)
                            <div class="d-flex">
                                <div class="title-pro ms-3 w-100">
                                    <h4 class="mb-0">{{ $cartItem['product_title'] }}<span class="text-end">$ 7.29</span></h4>
                                    <p class="mt-0 mb-0">£ {{ $cartItem['product_price'] }}</p>
                                    <P class="mt-0">{{ $cartItem['optionNames'] ? implode(', ', $cartItem['optionNames']) : '' }}</P>
                                    <div class="input-group">
                                        <div class="quantity-control">
                                            <button type="button" onclick="updateQuantity(-1)">-</button>
                                            <input type="number" id="quantity" name="quantity" min="1" value="{{ $cartItem['quantity'] }}" readonly>
                                            <button type="button" onclick="updateQuantity(1)">+</button>
                                        </div>
                                    </div>
                                    <a href="">Remove item</a>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cart-total">
                    <p class="text-end">Cart Totals</p>
                    <hr>
                    <p>Sub Total <span>$7.29</span></p>
                    <hr>
                    <p>Shipping <span>Add an address for shipping option</span></p>
                    <hr>
                    <h4>Total <span>$7.29</span></h4>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <h2 class="text-center">Your cart is empty</h2>
            </div>
        @endif
    </div>
 </div>
@endsection

@section('script')
    <script>
        function updateQuantity(change) {
            const quantityInput = document.getElementById('quantity');
            let quantity = parseInt(quantityInput.value);
            quantity += change;
            if (quantity < 1) quantity = 1;
            quantityInput.value = quantity;
            updateTotal();
        }

        function updateTotal() {
            const quantity = document.getElementById('quantity').value;
            const price = document.getElementById('price').value;
            const total = (quantity * price).toFixed(2);
            document.getElementById('total').innerText = total;
        }    
    </script>
@endsection