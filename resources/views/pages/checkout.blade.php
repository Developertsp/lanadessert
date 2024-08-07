@extends('layout.app')
@section('title')

<style>
    .nav-top-svg {
        display: none;
    }

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
    /* Styling for the Stripe payment form container */
#stripe-form {
    background-color: #f9f9f9;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Styling for the card element */
#card-element {
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 10px;
}

/* Styling for card errors */
#card-errors {
    color: #dc3545; /* Bootstrap danger color */
    margin-top: 10px;
}

/* Styling for the submit button */
#submit-payment {
    background-color: #ff0000; /* Bootstrap primary color */
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

/* Button hover state */
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
                    <form action="{{ route('checkout.process') }}" method="post">
                        @csrf
                        <ol>
                            <li>
                                <h4>Contact information</h4>
                                <div class="row">
                                    <div class="col-md-4 p-0">
                                        <input type="text" placeholder="Name" name="name" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="email" placeholder="Email" name="email" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Phone" name="phone" class="form-control">
                                    </div>
                                </div>
                            </li>
                            @if ($orderType == 'delivery')
                                <li>
                                    <h4>Delivery Address</h4>
                                    <p>Enter the address where you want your order delivered.</p>
                                    <div class="row">
                                        <div class="col-md-12 p-0">
                                            <input type="text" placeholder="Address" name="address" class="form-control">
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
                                <button id="submit-payment" class="btn btn-primary w-100">Pay Now</button>
                            </div>
                        </div>
                        <div class="add-note">
                            <label for="note">Add a note to your order</label>
                            <textarea cols="30" rows="3" name="note" class="form-control"></textarea>
                        </div>
                        <hr>
                        <div class="return mt-4">
                            <a href="{{ route('cart.view') }}">return to cart</a>
                            <button class="btn">Place order</button>
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
                    <h4>Total <span>£ {{ $cartSubTotal }}</span></h4>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stripe.js -->
<script src="https://js.stripe.com/v3/"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stripeForm = document.getElementById('stripe-form');
        const cashOption = document.getElementById('cash');
        const onlineOption = document.getElementById('online');
        
        // Function to handle payment option change
        function handlePaymentOptionChange() {
            if (onlineOption.checked) {
                stripeForm.style.display = 'block';
            } else {
                stripeForm.style.display = 'none';
            }
        }

        // Initialize Stripe
        const stripe = Stripe('YOUR_STRIPE_PUBLIC_KEY'); // Replace with your public key
        const elements = stripe.elements();
        
        // Create an instance of the card Element
        const card = elements.create('card');
        card.mount('#card-element');
        
        // Handle real-time validation errors from the card Element
        card.addEventListener('change', function(event) {
            const displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission
        document.getElementById('submit-payment').addEventListener('click', function(event) {
            event.preventDefault();
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error
                    const displayError = document.getElementById('card-errors');
                    displayError.textContent = result.error.message;
                } else {
                    // Send the token to your server
                    const form = document.querySelector('form');
                    const hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', result.token.id);
                    form.appendChild(hiddenInput);
                    form.submit();
                }
            });
        });

        // Add event listeners to handle changes
        cashOption.addEventListener('change', handlePaymentOptionChange);
        onlineOption.addEventListener('change', handlePaymentOptionChange);
        
        // Initial check
        handlePaymentOptionChange();
    });
</script>
@endsection
