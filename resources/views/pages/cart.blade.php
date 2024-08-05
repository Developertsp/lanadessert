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
                                    <h4 class="mb-0">{{ $cartItem['productTitle'] }}<span class="text-end" id="row-total-{{ $cartItem['rowId'] }}">£ {{ $cartItem['rowTotal']}}</span></h4>
                                    <p class="mt-0 mb-0">£ {{ $cartItem['productPrice'] }}</p>
                                    <P class="mt-0">{{ $cartItem['optionNames'] ? implode(', ', $cartItem['optionNames']) : '' }}</P>
                                    <div class="input-group">
                                        <div class="quantity-control">
                                            <button type="button" onclick="updateQuantity({{ $cartItem['rowId'] }}, -1)">-</button>
                                            <input type="number" id="quantity-{{ $cartItem['rowId'] }}" name="quantity" min="1" value="{{ $cartItem['quantity'] }}" readonly>
                                            <button type="button" onclick="updateQuantity({{ $cartItem['rowId'] }}, 1)">+</button>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" onclick="removeItemCart({{ $cartItem['rowId'] }})" id="remove-{{ $cartItem['rowId'] }}">Remove item</a>
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
                    <p>Sub Total <span id="cart-sub-total">£ {{ $cartSubTotal }}</span></p>
                    <hr>
                    <p>Shipping <span>Add an address for shipping option</span></p>
                    <hr>
                    <h4>Total <span id="total">£ {{ $cartSubTotal }}</span></h4>
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
        function updateQuantity(rowId, change) {
            const quantityInput = document.getElementById('quantity-' + rowId);
            let quantity = parseInt(quantityInput.value);
            quantity += change;
            if (quantity < 1) quantity = 1;
            quantityInput.value = quantity;

            $.ajax({
                url: '{{ route("cart.update") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    row_id: rowId,
                    quantity: quantity
                },
                success: function(response) {
                    if (response.success) {
                        $('#row-total-'+rowId).text('£ ' + response.rowTotal.toFixed(2));
                        $('#cart-sub-total').text('£ ' + response.cartSubTotal.toFixed(2));
                        $('#total').text('£ ' + response.cartSubTotal.toFixed(2));
                    }
                }
            });
        }

        function removeItemCart(rowId){
            if (confirm('Are you sure you want to remove this item from the cart?')) {
                $.ajax({
                    url: '{{ route("cart.delete") }}',
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                        row_id: rowId,
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.message === 'Success') {
                            window.location.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('An error occurred:', error);
                        alert('Failed to remove item. Please try again.');
                    }
                });
            }
        }
    </script>
@endsection