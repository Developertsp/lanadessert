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
                <input type="hidden" id="productId" />
                <input type="hidden" id="productDetail" data-product-detail="" />
                <div class="options"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="addToCartButton" data-product-detail="">Add to cart</button>
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
                                    <button type="button" id="openModal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cartModal" data-product-detail="{{ json_encode($product) }}" data-product-title="{{ $product['title'] }}">
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

@section('script')

<script>
    $(document).ready(function() {

        $('#cartModal').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            var productTitle = button.data('product-title');
            var productDetail = button.data('product-detail');

            var modal = $(this);
            modal.find('.modal-title').text(productTitle);
            modal.find('#productId').val(productDetail.id);
            modal.find('#productDetail').data('product-detail', productDetail);

            var optionsHtml = '';
            if (productDetail.options && productDetail.options.length > 0) {
                productDetail.options.forEach(function(optionGroup) {
                    optionsHtml += '<div class="option-group">';
                    optionsHtml += '<h6>' + optionGroup.option.name + '</h6>';
                    if (optionGroup.option.option_values && optionGroup.option.option_values.length > 0) {
                        optionGroup.option.option_values.forEach(function(optionValue) {
                            optionsHtml += '<div class="form-check d-flex justify-content-between align-items-center">';
                            optionsHtml += '<div>';
                            optionsHtml += '<input class="form-check-input" type="radio" name="option_' + optionGroup.option.id + '" id="option_' + optionValue.id + '" value="' + optionValue.id + '" data-option-name="' + optionValue.name +'">';
                            optionsHtml += '<label class="form-check-label" for="option_' + optionValue.id + '">' + optionValue.name + '</label>';
                            optionsHtml += '</div>';
                            if (optionValue.price) {
                                optionsHtml += '<span>$' + optionValue.price + '</span>';
                            }
                            optionsHtml += '</div>';
                        });
                    }
                    optionsHtml += '</div>';
                });
            } else {
                optionsHtml = '<p>No options available for this product.</p>';
            }
            modal.find('.options').html(optionsHtml);
        });

        $('#addToCartButton').on('click', function() {
            var productId = $('#productId').val();
            var productDetail = $('#productDetail').data('product-detail');
            var selectedOptions = {};
            var selectedOptionNames = [];

            $('.option-group').each(function() {
                var optionGroupId = $(this).find('input[type=radio]').attr('name').split('_')[1];
                var selectedOption = $(this).find('input[type=radio]:checked').val();
                var selectedOptionName = $(this).find('input[type=radio]:checked').data('option-name');
                if (selectedOption) {
                    selectedOptions[optionGroupId] = selectedOption;
                    selectedOptionNames.push(selectedOptionName);
                }
            });

            var cartData = {
                product_id: productId,
                options: selectedOptions,
                optionNames: selectedOptionNames,
                product_detail: productDetail
            };

            $.ajax({
                url: '{{ route("cart.add")}}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "data": cartData
                },
                success: function(response) {
                    console.log(response);
                    alert('Product added to cart successfully!');
                    $('#cartModal').modal('hide');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('There was an error adding the product to the cart.');
                }
            });
        });
    });
</script>
@endsection
