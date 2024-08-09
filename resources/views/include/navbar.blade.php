<section class="nav-top">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="lana-logo">
                    <img src="{{ asset('assets/theme/images/lana-logo.png')}}" width="120px" alt="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex nav-left-svg">
                    <span class="nav-top-svg">
                        <svg class="e-font-icon-svg e-fab-facebook" viewBox="0 0 512 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z">
                            </path>
                        </svg>
                    </span>
                    <span class="nav-top-svg">
                        <svg class="e-font-icon-svg e-fab-instagram" viewBox="0 0 448 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                            </path>
                        </svg>
                    </span>
                    <span class="nav-top-svg">
                        <svg class="e-font-icon-svg e-fab-tiktok" viewBox="0 0 448 512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z">
                            </path>
                        </svg>
                    </span>
                    <span class="nav-top-svg">
                        <a href="{{ route('cart.view') }}">
                        <svg class="e-font-icon-svg e-fab-basket" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="M504 104H90.1l-7.6-33.7c-1.6-7.3-7.9-12.3-15.3-12.3H21.8c-8.4 0-15.7 5-17.3 12.3l-7.8 33.7H8c-4.4 0-8 3.6-8 8s3.6 8 8 8h24.5l16.4 73.3c6.7 30.3 34.7 51.7 65.1 51.7h288.6c30.4 0 58.4-21.4 65.1-51.7l16.4-73.3H504c4.4 0 8-3.6 8-8s-3.6-8-8-8zM424 224H88c-7.3 0-13.8-4.8-15.7-11.9L56.7 160H413.3l-15.5 51.1c-1.9 7.1-8.4 11.9-15.7 11.9zM248 352c-26.5 0-48 21.5-48 48s21.5 48 48 48 48-21.5 48-48-21.5-48-48-48zM152 400c-26.5 0-48 21.5-48 48s21.5 48 48 48 48-21.5 48-48-21.5-48-48-48z"></path>
                        </svg>
                        <span id="cart-count" class="badge bg-primary"></span> 
                    </span>   
                </div>
            </div>
        </div>
    </div>
</section>

<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="/">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/menus">Online Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/faq">FAQ </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.view') }}">Cart</a>
                </li>
            </ul>
        </div>
    </div>
</nav>