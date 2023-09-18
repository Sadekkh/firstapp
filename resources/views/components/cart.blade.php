<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
    <i class="fa fa-shopping-cart"></i>
    <span>{{ __('cart') }}</span>
    <div class="qty">{{ $cart->count() }}</div>
</a>
<div class="cart-dropdown">
    <div class="cart-list">
        @php
            $totalSum = 0;
        @endphp
        @foreach ($cart as $c)
            @php
                $productPrice = $c->product->price;
                $quantity = $c->quantity;
                $itemTotal = $productPrice * $quantity;
                $totalSum += $itemTotal;
            @endphp
            <div class="product-widget">
                <div class="product-img">
                    <img src="{{ asset('storage/products/' . $c->product->image[0]->name) }}" alt="">
                </div>
                <div class="product-body">
                    <h3 class="product-name"><a href="#">{{ $c->product->name_en }}</a></h3>
                    <h4 class="product-price"><span class="qty">{{ $quantity }} X</span>{{ $productPrice }}</h4>
                </div>
                <form action="{{ route('cart.destroy', $c->id) }}" method="POST">
                    @csrf
                    <button class="delete" type="submit"><i class="fa fa-close"></i></button>
                </form>
            </div>
        @endforeach
    </div>
    <div class="cart-summary">
        <small>{{ $cart->count() }} Item(s) selected</small>
        <h5>{{ __('Total') }} {{ number_format($totalSum, 2) }}</h5>
    </div>
    <div class="cart-btns">
        <a href="{{ route('view.cart') }}">View Cart</a>
        <a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
