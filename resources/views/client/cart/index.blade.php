@extends('client.layouts.master')
@section('content')
    <div class="main container">
        <div class="shopping-cart-inner">
            <div class="page-content">
                @if($carts)
                    <div class="heading-counter warning">@lang('cartp.contain')<span id="cart-contain"> {{ $carts_qty }}</span> @lang('product.tit')</div>
                    <div class="order-detail-content">
                        <table class="table table-bordered jtv-cart-summary">
                            <thead>
                            <tr>
                                <th class="cart_product">Product</th>
                                <th>@lang('product.name')</th>
                                <th>@lang('cartp.price')</th>
                                <th>@lang('cartp.qty')</th>
                                <th>@lang('cartp.total')</th>
                                <th class="action"><i class="fa fa-trash-o"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($carts as $cart)
                                    <tr id="product-cart">
                                        <td class="cart_product"><a href="#"><img class="img-responsive" src="{{ asset('storage/images/products/'.$cart['product_image']) }}"></a></td>
                                        <td class="cart_description"><p class="product-name"><a href="#">{{ $cart['product_name'] }}</a></p>
                                        <td class="price"><span>{{ number_format($cart['product_price']) }}</span></td>
                                        <td class="qty">
                                            <div class="custom pull-left">
                                                <input data-id="{{ $cart['product_id'] }}" data-price="{{ $cart['product_price'] }}" min="1" type="number" id="quantity" name="quantity" class="form-control input-number text-center input-quantity" value="{{ $cart['product_num'] }}">
                                            </div>
                                        </td>
                                        <td class="total-price" id="num-price-{{ $cart['product_id'] }}"><span>{{ number_format($cart['num_price']) }}</span></td>
                                        <td class="action delete-cart" id="delete-item-{{ $cart['product_id'] }}" data-id="{{ $cart['product_id'] }}"><a href="#"></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3"><strong>Total</strong></td>
                                    <td colspan="2" id="total-price"><strong>{{ number_format($total_price) }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="cart_navigation">
                            <button class="button continue-shopping" title="Continue shopping" type="button"><span>Continue shopping</span></button>
                            <a href="{{ route('home.carts.checkout') }}"><button class="button pull-right" type="button">Proceed to Checkout</button></a>
                        </div>
                    </div>
                @else
                    <div class="heading-counter warning">Your shopping cart is empty</div>
                    <div class="cart_navigation">
                        <button class="button continue-shopping" title="Continue shopping" type="button">Continue shopping</button>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.input-quantity').change(function (e) {
                e.preventDefault();
                let quantity = $(this).val();
                quantity = quantity ? quantity : 0;
                quantity = quantity < 0 ? 0 : quantity;
                $(this).val(quantity);
                let price = $(this).attr('data-price');
                let id = $(this).attr('data-id');
                console.log(quantity * price);
                let str = '#num-price-' + id;
                $(this).parents('#product-cart').find(str).text(quantity * price);

                $.ajax({
                    url: '/carts/update',
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        product_num: quantity,
                        product_id: id,
                    },
                    success: function(data) {
                        $('#total-price').text(data.total_price);
                    }
                });
            });

            $('.delete-cart').click(function(e) {
                e.preventDefault();
                let id = $(this).attr('data-id');
                var $tr = $(this).closest('tr');
                $.ajax({
                    url: '/carts/delete',
                    method: "POST",
                    data: {
                        product_id: id,
                        _token: "{{csrf_token()}}"
                    },
                    success: function(data) {
                        $('.cart-quantity').text(data.quantity);
                        $tr.find('td').fadeOut(500,function(){
                            $tr.remove();
                        });
                        $('#total-price').text(data.total_price);
                        if (!data.quantity) {
                            $('.table').remove();
                            $('.heading-counter').text('Your shopping cart is empty');
                            $('.btn-proceed-checkout').remove();
                        }
                        $('#cart-contain').text(' ' +data.quantity);
                        alert("Successfully!! Product is deleted from your cart!");
                    }
                });
            });

        });
    </script>
@endpush