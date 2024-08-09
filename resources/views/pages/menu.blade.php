@extends('layout.app')

@section('title', 'Menu')

@section('content')
<div class="main-content" data-aos="fade-down" data-aos-duration="1500">
    <div class="title">
        <h2>Menu</h2>
    </div>
</div>

<div class="promo text-center my-5 py-5">
    <h5 class="hot">Hot Promo</h5>
    <h2 class="special">Special offer on Sunday</h2>
    <div class="container mt-5 pt-5">
        @php
            $chunks = array_chunk($menus, 4); 
        @endphp
       @foreach ($chunks as $chunk)
       <div class="row" data-aos="fade-up" data-aos-duration="1500">
           @foreach ($chunk as $menu)
               <div class="col-md-3">
                <a href="{{route('menu', ['category' => $menu['attributes']['slug']])}}"><img src="{{ env('SERVER_URL') }}storage/{{ $menu['attributes']['background_image'] }}" width="100%" alt=""></a>
                   <h2>{{ $menu['attributes']['name'] }}</h2>
               </div>
           @endforeach
       </div>
     @endforeach
    </div>    
</div>
<div class="menu-items my-5 pt-5" data-aos="fade-down-right" data-aos-duration="1500">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="dish-menu">
                 <h2>Appertizer</h2>
                 <p><strong>Salad <span>....................................................</span> $50</strong></p>
                 <p class="dim-para">Sed ut perspiciatis unde omnis iste natus ero</p>
                 <!-- Add more dish menu items here -->
                </div>
               
            </div>
            <div class="col-md-4">
                <div class="dish-img d-grid">
                    <img src="assets/theme/images/dish-menu1.webp" class="dish-one" width="350px" alt="">
                    <img src="assets/theme/images/dish-menu2.webp" class="mt-4 dish-two" width="350px" alt="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="right-side-dish d-grid">
                    <img src="assets/theme/images/dish-menu3.webp" class="dish-three" width="100%" alt="">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="menu-more my-5 pt-5" data-aos="fade-up-right" data-aos-duration="1500">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="dish-more-img d-grid">
                    <img src="assets/theme/images/more-dish1.webp" class="dish-one" width="350px" alt="">
                    <img src="assets/theme/images/menu-more3.webp" class="mt-4 dish-two" width="350px" alt="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="right-more-dish d-grid">
                    <img src="assets/theme/images/menu-more2.webp" class="dish-three" width="500px" alt="">
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="dish-more">
                 <h2>Main Course</h2>
                 <p><strong>Sirloin Steak <span>....................................................</span> $50</strong></p>
                 <p class="dim-para">Sed ut perspiciatis unde omnis iste natus ero</p>
                 <!-- Add more main course items here -->
                </div>
               
            </div>
        </div>
    </div>
</div>

<div class="menu-items my-5 pt-5" data-aos="fade-down-right" data-aos-duration="1500">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="dish-menu">
                 <h2>Dessert</h2>
                 <p><strong>Pancake<span>....................................................</span> $50</strong></p>
                 <p class="dim-para">Sed ut perspiciatis unde omnis iste natus ero</p>
                 <!-- Add more dessert items here -->
                </div>
               
            </div>
            <div class="col-md-4">
                <div class="dish-img d-grid">
                    <img src="assets/theme/images/dish-menu1.webp" class="dish-one" width="350px" alt="">
                    <img src="assets/theme/images/dish-menu2.webp" class="mt-4 dish-two" width="350px" alt="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="right-side-dish d-grid">
                    <img src="assets/theme/images/dish-menu3.webp" class="dish-three" width="100%" alt="">
                    
                </div>
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
