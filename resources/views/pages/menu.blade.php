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
        @foreach ($menus as $menu)
        <div class="row" data-aos="fade-up" data-aos-duration="1500">
            <div class="col-md-3">
                <a href="order.html"><img src="{{ $menu['attributes']['background_image'] }}" width="100%" alt=""></a>
                <h2>{{ $menu['attributes']['name'] }}</h2>
            </div>
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
                 <p><strong>Salad <span>....................................................</span> $50</strong></p>
                 <p class="dim-para">Sed ut perspiciatis unde omnis iste natus ero</p>
                 <p><strong>Salad <span>....................................................</span> $50</strong></p>
                 <p class="dim-para">Sed ut perspiciatis unde omnis iste natus ero</p>
                 <p><strong>Salad <span>....................................................</span> $50</strong></p>
                 <p class="dim-para">Sed ut perspiciatis unde omnis iste natus ero</p>
                 <p><strong>Salad <span>....................................................</span> $50</strong></p>
                 <p class="dim-para">Sed ut perspiciatis unde omnis iste natus ero</p>
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
                    <img src=" assets/theme/images/menu-more3.webp" class="mt-4 dish-two" width="350px" alt="">
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
                 <p><strong>Korean soup <span>....................................................</span> $50</strong></p>
                 <p class="dim-para">Sed ut perspiciatis unde omnis iste natus ero</p>
                 <p><strong>Salmon pasta <span>....................................................</span> $50</strong></p>
                 <p class="dim-para">Sed ut perspiciatis unde omnis iste natus ero</p>
                 <p><strong>chicken curry <span>....................................................</span> $50</strong></p>
                 <p class="dim-para">Sed ut perspiciatis unde omnis iste natus ero</p>
                 <p><strong>Dimsum <span>....................................................</span> $50</strong></p>
                 <p class="dim-para">Sed ut perspiciatis unde omnis iste natus ero</p>
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
                 <p><strong>Ice Cream <span>....................................................</span> $50</strong></p>
                 <p class="dim-para">Sed ut perspiciatis unde omnis iste natus ero</p>
                 <p><strong>Sambosa <span>....................................................</span> $50</strong></p>
                 <p class="dim-para">Sed ut perspiciatis unde omnis iste natus ero</p>
                 <p><strong>American pie <span>....................................................</span> $50</strong></p>
                 <p class="dim-para">Sed ut perspiciatis unde omnis iste natus ero</p>
                 <p><strong>Banoffie <span>....................................................</span> $50</strong></p>
                 <p class="dim-para">Sed ut perspiciatis unde omnis iste natus ero</p>
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
@endsection