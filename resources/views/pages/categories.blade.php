@extends('layout.app')

@section('title', 'Categories')

@section('content')
    <div class="main-content" data-aos="fade-down" data-aos-duration="1500">
        <div class="title">
            <h2>Categories</h2>
        </div>
    </div>

    <div class="promo text-center my-5 py-5">
        <h5 class="hot">Hot Promo</h5>
        <h2 class="special">Our Special Categories</h2>
        <div class="container mt-5 pt-5">
            <div class="row" data-aos="fade-up" data-aos-duration="1500">
                @if ($response)
                    @foreach ($categories as $category)
                        <div class="col-md-3">
                            <a href="{{route('menu', ['category' => $category['slug']])}}"><img src="{{ env('SERVER_URL') }}storage/{{ $category['background_image'] }}" width="100%" alt=""></a>
                            <h2>{{ $category['name'] }}</h2>
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


@endsection
