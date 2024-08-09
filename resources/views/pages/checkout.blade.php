@extends('layout.app')
@section('title')
<style>
    /* Your existing CSS styles */
    #stripe-form {
        background-color: #f9f9f9;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        display: none; /* Hide by default */
    }

    #card-element {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 10px;
        height: 40px;
        box-sizing: border-box;
    }

    #card-errors {
        color: #dc3545;
        margin-top: 10px;
    }

    #submit-payment {
        background-color: #ff0000;
        border: none;
        color: #fff;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
        display: inline-block;
        text-align: center;
    }

    #submit-payment:hover {
        background-color: #0056b3;
    }
</style>
@endsection

@section('content')
<div class="cart-sec pt-3 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="shipping-contact">
                    <form id="checkout-form" action="{{ route('checkout.process') }}" method="post">
                        @csrf
                        <ol>
                            <li>
                                <h4>Contact information</h4>
                                <div class="row">
                                    <div class="col-md-4 p-0">
                                        <input type="text" placeholder="Name" name="name" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="email" placeholder="Email" name="email" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Phone" name="phone" class="form-control" required>
                                    </div>
                                </div>
                            </li>
                            @if ($orderType == 'delivery')
                                <li>
                                    <h4>Delivery Address</h4>
                                    <p>Enter the address where you want your order delivered.</p>
                                    <div class="row">
                                        <div class="col-md-12 p-0">
                                            <input type="text" placeholder="Address" name="address" class="form-control" required>
                                        </div>
                                    </div>
                                </li>
                            @endif
                            <li class="otp">
                                <h4>Payment options</h4>
                                <div class="option-select">
                                    <input type="radio" id="cash" name="payment_option" value="cash" checked required>
                                    <label for="cash"> CASH</label>
                                </div>
                                <div class="option-select">
                                    <input type="radio" id="online" name="payment_option" value="online" required>
                                    <label for="online"> ONLINE </label>
                                </div>
                            </li>
                        </ol>
                        <!-- Stripe Payment Form -->
                        <div id="stripe-form" class="container mt-4">
                            <h4 class="mb-4">Stripe Payment</h4>
                            <div class="form-group mb-3">
                                <label for="card-element" class="form-label">Credit Card Information</label>
                                <div id="card-element" class="form-control"></div>
                                <div id="card-errors" role="alert" class="text-danger mt-2"></div>
                            </div>
                            <div class="form-group">
                                <button id="submit-payment" type="button" class="btn btn-primary w-100">Pay Now</button>
                            </div>
                        </div>
                        <div class="add-note">
                            <label for="note">Add a note to your order</label>
                            <textarea cols="30" rows="3" name="note" class="form-control"></textarea>
                        </div>
                        <hr>
                        <div class="return mt-4">
                            <a href="{{ route('cart.view') }}">return to cart</a>
                            <button id="place-order" type="submit" class="btn">Place order</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cart-total">
                    <div class="accordion mb-4" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Order Summary
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    @foreach ($cartItems as $cartItem)
                                        <div class="d-flex">
                                            <div class="img-sec">
                                                <img src="/images/brownies.jpg" width="40px" alt="">
                                            </div>
                                            <div class="title-pro ms-3 w-100">
                                                <p class="mb-0">
                                                    {{ $cartItem['productTitle']}}
                                                    <span class="text-end">£ {{ $cartItem['rowTotal'] }}</span>
                                                </p>
                                                <p class="mt-0 mb-0">£ {{ $cartItem['productPrice'] }}</p>
                                                <P class="mt-0">{{ $cartItem['optionNames'] ? implode(', ', $cartItem['optionNames']) : '' }}</P>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4>Total <span> £ {{ $cartSubTotal }}</span></h4>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stripe = Stripe(''); // Replace with your public key
        const elements = stripe.elements();
        const card = elements.create('card');
        card.mount('#card-element');

        card.addEventListener('change', function(event) {
            const displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        document.getElementById('submit-payment').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default form submission

            const paymentOption = document.querySelector('input[name="payment_option"]:checked').value;

            if (paymentOption === 'online') {
                stripe.createPaymentMethod({
                    type: 'card',
                    card: card,
                    billing_details: {
                        name: document.querySelector('input[name="name"]').value,
                        email: document.querySelector('input[name="email"]').value,
                        phone: document.querySelector('input[name="phone"]').value
                    }
                }).then(function(result) {
                    if (result.error) {
                        const displayError = document.getElementById('card-errors');
                        displayError.textContent = result.error.message;
                    } else {
                        const form = document.getElementById('checkout-form');
                        let hiddenTokenInput = form.querySelector('input[name="payment_method_id"]');

                        if (hiddenTokenInput) {
                            hiddenTokenInput.setAttribute('value', result.paymentMethod.id);
                        } else {
                            hiddenTokenInput = document.createElement('input');
                            hiddenTokenInput.setAttribute('type', 'hidden');
                            hiddenTokenInput.setAttribute('name', 'payment_method_id');
                            hiddenTokenInput.setAttribute('value', result.paymentMethod.id);
                            form.appendChild(hiddenTokenInput);
                        }

                        // Submit the form
                        form.submit();
                    }
                }).catch(function(error) {
                    console.error('Error creating PaymentMethod:', error);
                });
            } else {
                // For cash payment or any other type
                const form = document.getElementById('checkout-form');
                form.submit(); // Simply submit the form without Stripe handling
            }
        });

        function handlePaymentOptionChange() {
            const stripeForm = document.getElementById('stripe-form');
            const cashOption = document.getElementById('cash');
            const onlineOption = document.getElementById('online');
            const placeOrderButton = document.getElementById('place-order');

            if (onlineOption.checked) {
                stripeForm.style.display = 'block';
                placeOrderButton.style.display = 'none'; // Hide place order button if online payment
            } else {
                stripeForm.style.display = 'none';
                placeOrderButton.style.display = 'inline-block'; // Show place order button
            }
        }

        document.getElementById('cash').addEventListener('change', handlePaymentOptionChange);
        document.getElementById('online').addEventListener('change', handlePaymentOptionChange);

        handlePaymentOptionChange();
    });
</script>
@endsection
