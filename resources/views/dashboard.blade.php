@extends('layout.app')
@section('title', 'Lana Desert')

@section('content')
<div class="home-main">
    <div class="container">
        <div class="row py-5">
            <div class="col-md-6">
                <div class="welcome my-5" data-aos="fade-right">
                    <h4>Welcome To Lana Dessert</h4>
                    <h2>
                        Bite into Blissful Moments <br>Where Flavor Knows No Limits
                    </h2>
                    <p>We are a bakery that creatively combines desserts and fast food, emphasising unique flavours
                        and inventive culinary presentations for enjoyment</p>
                    <button class="btn px-5 py-3">view more</button>
                </div>
            </div>
            <div class="col-md-6 text-end">
                <div class="double-side my-4" data-aos="fade-down-left" data-aos-duration="1500">
                    <img src="{{ asset('assets/theme/images/home-lana.webp')}}" width="250" class="left-small" alt="">
                    <img src="{{ asset('assets/theme/images/home-lana-left.webp')}}" width="320" class="right-straw" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="have-look my-5 pt-5" data-aos="fade-down" data-aos-duration="1500">
    <div class="container">
        <div class="mount text-center mb-5">
            <h4>Have a Look!</h4>
            <h2>Our Mouthwatering Menu</h2>
            <a href="{{ route('categories.all') }}" class="btn btn-primary">View All</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row" data-aos="fade-down" data-aos-duration="1500">
                    @if ($response)
                        @foreach ($menus as $menu)
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="./images/waffles-2.png" width="70px" alt="">
                                        <h5 class="card-title">{{ $menu }}</h5>
                                        <p class="card-text">
                                            Lana Dessert's waffles are irresistibly delicious, featuring
                                            crispy edges, soft centres, and decadent toppings for a delightful treat
                                            everyone will love.
                                        </p>
                                        {{-- <a href="{{route('menu', ['category' => $menu['slug']])}}" class="btn btn-primary">View</a> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="mount text-center mb-5">
                            <h2 class="text-danger">-----Api Error-----</h2>
                            <p>Configure APi Token</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
<div class="founder-about" data-aos="fade-right" data-aos-duration="1000">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="founder-img">
                    <img src="assets/theme/images/home-lana-left.webp" class="custom-margin-img" width="100%" alt="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="founder-img">
                    <img src="assets/theme/images/home-lana-msg.webp" width="100%" alt="">
                </div>
            </div>
            <div class="col-md-5">
                <div class="founder-msg home-msg">
                    <h2>About Us</h2>
                    <h4>Our Story!</h4>
                    <p>Welcome to Lana Dessert in Nottingham! We make delicious desserts and fast food with a twist.
                        Whether you want to eat in or take out, we’re open every day from 5 PM to 2 AM. You can even
                        customise your order to suit your taste because we love making things just how you like
                        them. So, come on over and enjoy our yummy treats with a side of fun! </p>
                    <a href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="counter-about" data-aos="fade-down" data-aos-duration="1500">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <p class="counter">12</p>
                <h2>Restaurant</h2>
            </div>
            <div class="col-md-3">
                <p class="counter">8</p>
                <h2>Years Experience</h2>
            </div>
            <div class="col-md-3">
                <p class="counter">50</p>
                <h2>Menu Dishes</h2>
            </div>
            <div class="col-md-3">
                <p class="counter">200</p>
                <h2>Customers</h2>
            </div>
        </div>
    </div>
</div>
<div class="menu-items my-5 pt-5 bg-none" data-aos="fade-down" data-aos-duration="1500">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="dish-menu shadow">
                    <h2>Appertizer</h2>
                    <p><strong>Salad <span>....................................................</span> $50</strong>
                    </p>
                    <p class="dim-para">Sed ut perspiciatis unde omnis iste natus ero</p>
                    <p><strong>Salad <span>....................................................</span> $50</strong>
                    </p>
                    <p class="dim-para">Sed ut perspiciatis unde omnis iste natus ero</p>
                    <p><strong>Salad <span>....................................................</span> $50</strong>
                    </p>
                    <p class="dim-para">Sed ut perspiciatis unde omnis iste natus ero</p>
                    <p><strong>Salad <span>....................................................</span> $50</strong>
                    </p>
                    <p class="dim-para">Sed ut perspiciatis unde omnis iste natus ero</p>
                    <p><strong>Salad <span>....................................................</span> $50</strong>
                    </p>
                    <p class="dim-para">Sed ut perspiciatis unde omnis iste natus ero</p>
                </div>

            </div>
            <div class="col-md-8" data-aos="fade-left" data-aos-duration="1500">
                <div class=" d-grid">
                    <img src="/assets/theme/images/home-burger.webp" class="dish-one" width="100%" alt="">
                </div>
            </div>

        </div>
    </div>
</div>

<div class="any-time my-5 py-5 reserv">
    <div class="container">
        <div class="row py-5">
            <div class="col-md-6" data-aos="fade-left" data-aos-duration="1500">
                <div class="contact-any mt-5">
                    <h2>Reservation</h2>
                    <h4>Book your sweet spot at Lana!</h4>
                    <p>Fill out the form and book a table at Lana! Reserve today for a cosy stay and ensure a
                        delightful experience. Don't miss out on this chance for relaxation!</p>

                </div>
            </div>
            <div class="col-md-6" data-aos="fade-right" data-aos-duration="1500">
                <div class="contact-form text-center">
                    <h2>Book Table</h2>
                    <form class="mt-5">
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Name" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <input type="password" class="form-control" placeholder="Phone"
                                id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <input type="select" class="form-control" placeholder="Subject"
                                id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <input type="select" class="form-control" placeholder="Subject"
                                id="exampleInputPassword1">
                        </div>

                        <button type="submit" class="btn mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- testimonial  -->
<div class="testimonial py-5" data-aos="fade-down" data-aos-duration="1500">
    <div class="container text-center py-5">
        <h2 class="client-test">Testimonials</h2>
        <h2 class="customer">What Our Customers Say!</h2>

        <div id="carouselExampleIndicators" class="carousel slide mt-5 py-5" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                    class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active text-center">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate ea qui provident, ipsa
                        adipisci dignissimos?</p>
                    <h2>John Doe</h2>
                </div>
                <div class="carousel-item text-center">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate ea qui provident, ipsa
                        adipisci dignissimos?</p>
                    <h2>John Doe</h2>
                </div>
                <div class="carousel-item text-center">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate ea qui provident, ipsa
                        adipisci dignissimos?</p>
                    <h2>John Doe</h2>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
<div class="news-letter py-5" data-aos="fade-up" data-aos-duration="1500">
    <div class="container">
        <div class="row mt-5 py-5">
            <div class="col-md-4">
                <div class="news-title">
                    <h5>Newsletter</h5>
                    <h2>Subscribe Now !</h2>
                </div>
            </div>
            <div class="col-md-5">
                <input type="text" placeholder="Your Email" class="form-control">
            </div>
            <div class="col-md-3">
                <button class="btn px-5 py-2 text-center mt-2">Subscribe</button>
            </div>
        </div>
    </div>
</div>
@yield('script')
<script>
    // Function to update cart count
    function updateCartCount() {
        fetch('{{ route('cart.count') }}')
            .then(response => response.json())
            .then(data => {
                const cartCountElement = document.getElementById('cart-count');
                if (data.count > 0) {
                    cartCountElement.textContent = data.count;
                    cartCountElement.style.display = 'inline'; // Show badge if count > 0
                } else {
                    cartCountElement.textContent = ''; // Hide badge if count is 0
                    cartCountElement.style.display = 'none'; // Optionally, you can also hide the badge
                }
            })
            .catch(error => console.error('Error fetching cart count:', error));
    }

    // Update cart count on page load
    document.addEventListener('DOMContentLoaded', updateCartCount);
</script>

@endsection