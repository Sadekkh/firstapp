@extends('layouts.main')

@section('content')
    <div id="hot-deal" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3>02</h3>
                                    <span>Days</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>10</h3>
                                    <span>Hours</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>34</h3>
                                    <span>Mins</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>60</h3>
                                    <span>Secs</span>
                                </div>
                            </li>
                        </ul>
                        <h2 class="text-uppercase">hot deal this week</h2>
                        <p>New Collection Up to 50% OFF</p>
                        <a class="primary-btn cta-btn" href="#">Shop now</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>

    @foreach ($offers as $o)
        <div class="section">

            <!-- container -->
            <div class="container">
                <!-- row -->

                <div class="row">

                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">{{ $o->name_en }}</h3>
                            {{-- <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">

                                <li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
                                <li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
                                <li><a data-toggle="tab" href="#tab1">Cameras</a></li>
                                <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                            </ul>
                        </div> --}}
                        </div>
                    </div>
                    <!-- /section title -->

                    <!-- Products tab & slick -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <!-- tab -->
                                <div id="tab1" class="tab-pane active">
                                    <div class="products-slick">
                                        <!-- product -->
                                        @foreach ($o->Product as $p)
                                            <div class="product">
                                                <a href="{{ route('addproductcart', $p->id) }}">
                                                    <div class="product-img">
                                                        <img src="{{ Vite::asset('public/storage/products/' . $p->image[0]->name) }}"
                                                            alt="">
                                                        <div class="product-label">
                                                            @if ($p->discount != 0)
                                                                <span class="sale">{{ $p->discount }}%</span>
                                                            @endif
                                                            @if ($p->badge != null)
                                                                <span class="new">{{ $p->badge }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="product-body">
                                                        <p class="product-category">{{ $p->category->name_en }}</p>
                                                        <h3 class="product-name"><a href="#">{{ $p->name_en }}</a>
                                                        </h3>
                                                        @if ($p->discount != 0)
                                                            <h4 class="product-price">{{ $p->price_disc }}KWD

                                                                <del class="product-old-price">{{ $p->price }}KWD</del>

                                                            </h4>
                                                        @else
                                                            <h4 class="product-price">{{ $p->price }}KWD

                                                                </del>

                                                            </h4>
                                                        @endif
                                                        <div class="product-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                        <div class="product-btns">
                                                            <button class="add-to-wishlist"
                                                                data-product-id="{{ $p->id }}"><i
                                                                    class="fa fa-heart-o"></i><span
                                                                    class="tooltipp">{{ __('add_to_wishlist') }}</span></button>

                                                        </div>
                                                        <div class="add-to-cart">

                                                            <a href="{{ route('addproductcart', $p->id) }}"><button
                                                                    class="add-to-cart-btn"
                                                                    data-product-id="{{ $p->id }}"><i
                                                                        class="fa fa-shopping-cart"></i>
                                                                    {{ __('add_to_cart') }}</button>
                                                            </a>


                                                        </div>
                                                    </div>
                                                </a>

                                            </div>
                                        @endforeach

                                    </div>

                                </div>
                                <!-- /tab -->
                            </div>
                        </div>
                    </div>
                    <!-- Products tab & slick -->
                </div>

                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
    @endforeach
    <!-- /SECTION -->


    </div>
    <!-- /container -->
    </div>


    <!-- /row -->
    </div>
    <!-- /container -->
    </div>
    <!-- /SECTION -->

    <script>
        $(document).ready(function() {

            $('#add_cart').on('click', function() {
                const productId = $(this).data('product-id');

                $.ajax({
                    type: 'post',
                    url: '/add-to-cart',
                    data: {
                        product_id: productId
                    },
                    success: function(response) {

                        alert('Product added to cart successfully.');
                    },
                    error: function(xhr, status, error) {

                        alert('Error adding product to cart.');
                    }
                });
            });

            // ... your other code ...
        });
        $(document).ready(function() {

            $('.add-to-wishlist').on('click', function() {
                const productId = $(this).data('product-id');

                $.ajax({
                    type: 'post',
                    url: '/add-to-wishlist',
                    data: {
                        product_id: productId
                    },
                    success: function(response) {

                        alert('Product added to wishlist successfully.');
                    },
                    error: function(xhr, status, error) {

                        alert('Error adding product to wishlist.');
                    }
                });
            });

            // ... your other code ...
        });
    </script>
@endsection
