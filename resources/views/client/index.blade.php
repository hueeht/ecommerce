@extends('client.layouts.master')
@section('content')
    <!-- Slideshow  -->
    <div class="main-slider" id="home">
        <div class="jtv-slideshow">
            <div id="jtv-slideshow">
                <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container' >
                    <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
                        <ul>
                            <li data-transition='slideup' data-slotamount='7' data-masterspeed='1000' data-thumb=''><img src="{{ asset('storage/images/slider/slide-img1.jpg') }}" data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                                <div class="caption-inner left">
                                    <div class='tp-caption LargeTitle sft  tp-resizeme header-slider' data-x='50'  data-y='200'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1'>@lang('shop.slide2')</div>
                                    <div class='tp-caption ExtraLargeTitle sft  tp-resizeme header-slider' data-x='50'  data-y='250'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1'>@lang('shop.cat1')</div>
                                    <div class='tp-caption' data-x='72'  data-y='320'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1'>@lang('shop.slide1')</div>
                                </div>
                            </li>
                            <li data-transition='slideup' data-slotamount='7' data-masterspeed='1000' data-thumb=''><img src="{{ asset('storage/images/slider/slide-img2.jpg') }}" data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                                <div class="caption-inner">
                                    <div class='tp-caption LargeTitle sft  tp-resizeme header-slider' data-x='360'  data-y='170'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1'>@lang('shop.slide1')</div>
                                    <div class='tp-caption ExtraLargeTitle sft  tp-resizeme header-slider' data-x='290'  data-y='240'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1'>@lang('shop.cat3')</div>
                                    <div class='tp-caption' data-x='415'  data-y='315'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1'>@lang('shop.slide2')</div>
                                </div>
                            </li>
                            <li data-transition='slideup' data-slotamount='7' data-masterspeed='1000' data-thumb=''><img src="{{ asset('storage/images/slider/slide-img3.jpg') }}" data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                                <div class="caption-inner right">
                                    <div class='tp-caption LargeTitle sft  tp-resizeme header-slider' data-x='450'  data-y='170'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1'>@lang('shop.slide2')</div>
                                    <div class='tp-caption ExtraLargeTitle sft  tp-resizeme header-slider' data-x='450'  data-y='210'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1'>@lang('shop.cat2')</div>
                                    <div class='tp-caption' data-x='475'  data-y='340'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1'>@lang('shop.slide1')</div>
                                </div>
                            </li>
                        </ul>
                        <div class="tp-bannertimer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-12 col-sm-12">
                    <!-- Product Tabs-->
                    <div class="category-product">
                        <div class="navbar nav-menu">
                            <div class="navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a data-toggle="tab" href="#tab-1">@lang('product.new')</a></li>
                                    <li class="tab-action"><a data-toggle="tab" href="#tab-hidden">@lang('product.hot')</a></li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->

                        </div>
                        <div class="tab-container">
                            <!-- tab new products -->
                            <div class="tab-panel active" id="tab-1">
                                <div class="category-products">
                                    <ul class="products-grid">
                                        @foreach($news as $product)
                                            <li class="item col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                                <div class="item-inner">
                                                        <div class="item-img">
                                                            <div class="item-img-info">
                                                                <a class="product-image" href="#"><img class="img-responsive" src="{{ asset('storage/images/products/img01.jpg') }}"></a>
                                                                <div class="new-label new-top-left">new</div>
                                                                <div class="action">
                                                                    <a href="" title="Quick view" ><i class="fa fa-search"></i></a>
                                                                    <a href="#" title="Add to cart" ><i class="fa fa-shopping-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="info-inner">
                                                            <div class="item-title"><a title="Product Title Here" href="">{{ $product->name }}</a> </div>
                                                                <div class="item-content">
                                                                    <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                                                    <div class="item-price">
                                                                    <div class="price-box"> <span class="regular-price"> <span class="price">{{ number_format($product->price) }}</span> </span> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- tab hot products -->
                            <div class="tab-panel active" id="tab-hidden">
                                    <div class="category-products">
                                        <ul class="products-grid">
                                            @foreach($hots as $product)
                                                <li class="item col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                                    <div class="item-inner">
                                                            <div class="item-img">
                                                                <div class="item-img-info">
                                                                    <a class="product-image" href="#"><img class="img-responsive" src="{{ asset('storage/images/products/img01.jpg') }}"> </a>
                                                                    <div class="action">
                                                                        <a href="#" title="Quick view" ><i class="fa fa-search"></i></a>
                                                                        <a href="#" title="Add to cart" ><i class="fa fa-shopping-cart"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                <div class="item-title"><a title="Product Title Here" href="">{{ $product->name }}</a> </div>
                                                                    <div class="item-content">
                                                                        <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                                                        <div class="item-price">
                                                                        <div class="price-box"> <span class="regular-price"> <span class="price">{{ number_format($product->price) }}</span> </span> </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar col-sm-3 col-xs-12">
                    @include('client.layouts.sidebar')
                </div>
            </div>

            
        </div>
    </div>
    <!-- jtv bottom banner section -->
@endsection
