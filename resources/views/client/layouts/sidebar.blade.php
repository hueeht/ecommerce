
<aside class="col-left sidebar">
<div class="block block-list block-viewed">
    <div class="block-title"> Check your Orders </div>
    <div class="block-content">
    <ol id="recently-viewed-items">
        <li class="item">
            <i class="fa fa-shopping-cart"></i><a href="{{ route('home.carts.index') }}">@lang('cartp.view')</a>
        </li>
        <li class="item">
            <i class="fa fa-align-justify"></i><a href="{{ route('home.orders.list') }}">@lang('order.view')</a>
        </li>
    </ol>
    </div>
</div>
</aside>