@extends('client.layouts.master')
@section('content')
    <!-- Main Container -->
    <section class="main-container col1-layout">
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-main">
                        <div class="product-view">
                            <div class="product-essential">
                                <form action="#" method="post" id="product">
                                    <div class="product-img-box col-lg-5 col-sm-5 col-xs-12">
                                        <div class="new-label new-top-left"></div>
                                        <div class="product-image">
                                            <div class="product-full"> <img class="img-responsive" id="product-zoom" src="{{ asset('storage/images/products/img01.jpg') }}" data-zoom-image="{{ asset('storage/images/products/img01.jpg') }}" alt="product-image"/> </div>
                                        </div>
                                        <!-- end: more-images -->
                                    </div>
                                    <div class="product-shop col-lg-7 col-sm-7 col-xs-12">
                                        <div class="product-next-prev"> <a class="product-next" href="#"><span></span></a> <a class="product-prev" href="#"><span></span></a> </div>
                                        <div class="product-name">
                                            <h1>Lorem ipsum dolor sit amet</h1>
                                        </div>
                                        <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                            <p class="rating-links"> <a href="#">4 Review(s)</a> <span class="separator">|</span> <a href="#"><i class="fa fa-pencil"></i> write a review</a> </p>
                                        </div>
                                        <div class="price-block">
                                            <div class="price-box">
                                                <p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-48" class="price"> $599.99 </span> </p>
                                                <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $499.99 </span> </p>
                                            </div>
                                        </div>
                                        <div class="info-orther">
                                            <p>Item Code: #12345678</p>
                                            <p>Availability: <span class="in-stock">In stock</span></p>
                                            <p>Condition: New</p>
                                        </div>
                                        <div class="short-description">
                                            <h2>Quick Overview</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. </p>
                                        </div>
                                        <div class="form-option">
                                            <p class="form-option-title">Available Options:</p>
                                            <div class="attributes">
                                                <div class="attribute-label">Color:</div>
                                                <div class="attribute-list">
                                                    <ul class="list-color">
                                                        <li style="background:#DD4132;"><a href="#">Fiesta</a></li>
                                                        <li style="background:#4F84C4;"><a href="#">Marina</a></li>
                                                        <li style="background:#EE82EE;" class="active"><a href="#">Violet</a></li>
                                                        <li style="background:#92B558;"><a href="#">Green</a></li>
                                                        <li style="background:#191970;"><a href="#">MidnightBlue</a></li>
                                                        <li style="background:#ff0000;"><a href="#">red</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="add-to-box">
                                                <div class="add-to-cart">
                                                    <div class="pull-left">
                                                        <div class="custom pull-left">
                                                            <label>Qty :</label>
                                                            <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="fa fa-minus">&nbsp;</i></button>
                                                            <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                                            <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="fa fa-plus">&nbsp;</i></button>
                                                        </div>
                                                    </div>
                                                    <button onClick="productAddToCartForm.submit(this)" class="button btn-cart" title="Add to Cart" type="button">Add to Cart</button>
                                                </div>
                                                <div class="email-addto-box">
                                                    <ul class="add-to-links">
                                                        <li><a class="link-wishlist" href="wishlist.html"><span>Add to Wishlist</span></a></li>
                                                        <li><span class="separator">|</span> <a class="link-compare" href="compare.html"><span>Add to Compare</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-share">
                                            <div class="sendtofriend-print"> <a href="javascript:print();"><i class="fa fa-print"></i> Print</a> <a href="#"><i class="fa fa-envelope-o fa-fw"></i> Send to a friend</a> </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main Container End -->
@endsection