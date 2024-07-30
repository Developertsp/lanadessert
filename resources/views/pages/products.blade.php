@extends('layout.app')

@section('title', ucfirst($category) )

@section('content')
    <div class="main-content" data-aos="fade-down" data-aos-duration="1500">
        <div class="title">
            <h2>{{ ucfirst($category) }}</h2>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Product title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            hers display sides
            </div>
            <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            <button type="button" class="btn btn-success">Add to cart</button>
            </div>
        </div>
        </div>
    </div>

    <div class="promo text-center my-5 py-5">
        <h2 class="special">{{ ucfirst($category) }}</h2>
        <div class="container mt-5 pt-5">
            <div class="row" data-aos="fade-up" data-aos-duration="1500">
                @if ($response)
                    @foreach ($products as $product)
                        <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 18rem;">
                            <img src="#" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">{{ $product['title'] }}</h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price">${{$product['price']}}</span>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cartModal" data-product-title="{{ $product['title'] }}">
                                        Add
                                    </button>
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
@endsection

{{-- @section('script')

<script>
    $(document).ready(function() {
        $(document).on('click', '#openModal', function(){
            console.log(12);
        });
        $('#cartModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var productTitle = button.data('product-title'); // Extract info from data-* attributes
            console.log(productTitle)
            var modal = $(this);
            modal.find('.modal-title').text('Add ' + productTitle + ' to cart');
        });
    });
</script>
@endsection --}}
