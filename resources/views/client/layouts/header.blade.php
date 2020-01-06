<!-- Header -->
<header class="jtv-header-v2">
    <div class="header-lines-decoration"> <span class="bg-secondary-color"></span> <span class="bg-blue"></span> <span class="bg-blue-light"></span> <span class="bg-orange-light"></span> <span class="bg-red"></span> <span class="bg-green"></span> <span class="bg-secondary-color"></span> </div>
    <div class="header-container">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-4 col-xs-12">
                        <!-- Default Welcome Message -->
                        <div class="welcome-msg hidden-xs hidden-sm"> @lang('header.welcome')</div>
                        <div class="jtv-lang-cur-wrapper">
                            <div class="jtv-inner-box">
                                <div class="block jtv-language-block">
                                    <div class="lg-cur"><span><img src="{{ asset('storage/images/english.png') }}" alt="Vietnam"><span class="lg-fr">@lang('header.en')</span><i class="fa fa-angle-down"></i></span></div>
                                    <ul>
                                        <li><a href="#"> <img src="{{ asset('storage/images/english.png') }}" alt="flag"><span>@lang('header.en')</span></a></li>
                                        <li><a href="#"> <img src="{{ asset('storage/images/vietnam.png') }}" alt="flag"><span>@lang('header.vn')</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- top links -->

                    <div class="toplinks col-md-7 col-sm-8 col-xs-12 hidden-xs">
                        <ul class="links">
                            @if (Auth::check())
                                <div class="collapse navbar-collapse">
                                    <ul class="nav navbar-nav">
                                        <li>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-user"></i> <span class="hidden-xs">{{ Auth::user()->name }}</span>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <div>
                                                        <a class="dropdown-item" href={{ route('profile') }}><i class="fa fa-user-circle"></i> Profile</a>
                                                    </div>
                                                    <div>
                                                        <a class="dropdown-item" href={{ route('home.suggest') }}><i class="fa fa-lightbulb-o"></i> Suggest</a>
                                                    </div>
                                                    <div>
                                                        <a class="dropdown-item" id="logout" href={{ route('logout') }}><i class="fa fa-sign-out"></i>@lang('header.out')
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                                                @method('post')
                                                                @csrf
                                                            </form>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-notify">
                                            <span class="dropdown-toggle" data-toggle="dropdown">
                                                <a href="#notifications-panel"  >
                                                    <i data-count="0" class="glyphicon glyphicon-bell notification-icon"></i>
                                                </a>
                                            </span>
                                                <div class="dropdown-menu top-cart-content">
                                                    <div>
                                                        <div class="block-subtitle hidden-xs">Notifications (<span class="notif-count">0</span>)</div>
                                                            <ul id="cart-sidebar" class="mini-products-list notification-content">
                                                                @foreach (Auth::user()->notifications as $notification)
                                                                    @if($notification->read_at == NULL && array_key_exists("status", $notification->data))
                                                                        <li class="item odd"><a href="" class="product-image"><img src="{{ asset('storage/images/icon-order.png') }}" width="65"></a>
                                                                            <div class="product-details">
                                                                                <a href="#" title="Mark as read" class="remove-cart"><i class="pe-7s-close"></i></a>
                                                                                <strong class="notification-title"> Your order [{{ $notification->data['id'] }}] is {{ $notification->data['status'] }} </strong><br>
                                                                            </div>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                            <div class="block-subtitle hidden-xs"><a href="{{ route('mark') }}">Mark all as read</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <li >
                                    <a title="@lang('header.sin')" href={{ route('login') }}><span class="hidden-xs">@lang('header.sin')</span> <i class="fa fa-sign-in"></i></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 jtv-logo-block">
                        <a href="{{ route('home.index') }}"><img src="{{ asset('storage/images/logo.png') }}"></a>
                        <!-- Navbar -->
                        <div class="nav-inner">
                            <ul id="nav" class="hidden-xs hidden-sm">
                                @foreach ($categories as $cate1)
                                    <li class="level-a drop-menu"><a href="{{ route('home.categories.show', $cate1->id) }}"><span>{{ $cate1->name }}</span></a>
                                        @if ($cate1->sub->count())
                                            <ul class="level-b">
                                                @foreach ($cate1->sub as $cate2)
                                                    <li class="level-b"><a href="{{ route('home.categories.show', $cate2->id) }}"><span>{{ $cate2->name }}</span></a>
                                                        @if ($cate2->sub->count())
                                                            <ul class="level-c right-sub">
                                                                @foreach ($cate2->sub as $cate3)
                                                                    <li class="level-c"><a href="{{ route('home.categories.show', $cate3->id) }}"><span>{{ $cate3->name }}</span></a></li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                            <!-- top cart -->
                            <div class="top-cart">
                                <div class="top-cart-contain">
                                    <div class="mini-cart">
                                        <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"><a href="#">
                                                <div class="shoppingcart-inner"><span class="cart-title"><i class="fa fa-shopping-cart"></i></span><span class="cart_count cart-quantity">{{ $carts_qty }}</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div>
                                            <div class="top-cart-content">
                                                @if ($carts_qty > 0)
                                                    <div class="block-subtitle hidden-xs">@lang('cartp.added')</div>
                                                    <ul id="cart-sidebar" class="mini-products-list">
                                                        @foreach($carts as $cart)
                                                        <li class="item odd"> <a href="{{ route('home.carts.index') }}" class="product-image"><img src="{{ asset('storage/images/products/'.$cart['product_image']) }}" width="65"></a>
                                                            <div class="product-details">
                                                                <a href="#" title="Remove This Item" class="remove-cart"><i class="pe-7s-close"></i></a>
                                                                <p class="product-name"><a href="{{ route('home.carts.index') }}"> {{ $cart['product_name'] }} </a> </p>
                                                                <strong id="product-num"> {{ $cart['product_num'] }}</strong> x <span class="price">{{ number_format($cart['product_price']) }}</span>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                    <div class="top-subtotal">Subtotal: <span class="price total">{{ number_format($total_price) }}</span></div>
                                                    <div class="actions">
                                                        <a href="{{ route('home.carts.checkout') }}"><button class="btn-checkout" type="button"><span>@lang('checkout.view')</span></button></a>
                                                        <a href="{{ route('home.carts.index') }}"><button class="view-cart" type="button"><span>@lang('cartp.view')</span></button></a>
                                                    </div>
                                                @else
                                                    <p>
                                                        Cart is empty
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jtv-search-block">
                                <div class="search">
                                    <input class="search_box" type="checkbox" id="search_box">
                                    <label class="fa fa-search" for="search_box"></label>
                                    <div class="search_form">
                                        <form action="#">
                                            <input type="text">
                                            <input type="submit" value="@lang('shop.search')">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end nav -->
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
