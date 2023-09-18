@foreach ($products as $p)
    <a href="{{ route('addproductcart', $p->id) }}">
        <div class="col-md-3 col-xs-6">
            <div class="product">
                <div class="product-img">
                    <img style="height: 25rem" src="{{ asset('storage/products/' . $p->image[0]->name) }}"
                        alt="" />
                    <div class="product-label">
                        @if ($p->discount != 0)
                            <span class="sale">{{ $p->discount }}</span>
                        @endif
                        @if ($p->badge != null)
                            <span class="new">{{ $p->badge }}</span>
                        @endif
                    </div>
                </div>
                <div class="product-body">
                    <p class="product-category">{{ $p->category->name_en }}</p>
                    <h3 class="product-name"><a href="#">{{ $p->name_en }}</a></h3>
                    <h4 class="product-price">
                        @if ($p->discount != 0)
                            <h4 class="product-price">{{ $p->price_disc }}KWD

                                <del class="product-old-price">{{ $p->price }}KWD</del>

                            </h4>
                        @else
                            <h4 class="product-price">{{ $p->price }}KWD

                                </del>

                            </h4>
                        @endif
                    </h4>
                    <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="product-btns">
                        <button class="add-to-wishlist" data-product-id="{{ $p->id }}"><i
                                class="fa fa-heart-o"></i><span class="tooltipp">add to
                                wishlist</span></button>

                    </div>
                    <div class="add-to-cart">

                        <a href="{{ route('addproductcart', $p->id) }}"><button class="add-to-cart-btn"
                                data-product-id="{{ $p->id }}"><i class="fa fa-shopping-cart"></i>
                                {{ __('add_to_cart') }}</button>
                        </a>


                    </div>
                </div>

            </div>
        </div>
    </a>
@endforeach
