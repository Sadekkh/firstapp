@extends('layouts.main')
@section('styles')
    <style>
        @import url(https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic|Montserrat:400,700);


        ol,
        ul {
            list-style: none;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        caption,
        th,
        td {
            text-align: left;
            font-weight: normal;
            vertical-align: middle;
        }

        q,
        blockquote {
            quotes: none;
        }

        q:before,
        q:after,
        blockquote:before,
        blockquote:after {
            content: "";
            content: none;
        }

        a img {
            border: none;
        }

        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        main,
        menu,
        nav,
        section,
        summary {
            display: block;
        }

        * {
            box-sizing: border-box;
        }

        body {
            color: #333;
            -webkit-font-smoothing: antialiased;
            font-family: "Droid Serif", serif;
        }

        img {
            max-width: 100%;
        }

        .cf:before,
        .cf:after {
            content: " ";
            display: table;
        }

        .cf:after {
            clear: both;
        }

        .cf {
            *zoom: 1;
        }

        .wrap {
            width: 75%;
            max-width: 960px;
            margin: 0 auto;
            padding: 5% 0;
            margin-bottom: 5em;
        }

        .projTitle {
            font-family: "Montserrat", sans-serif;
            font-weight: bold;
            text-align: center;
            font-size: 2em;
            padding: 1em 0;
            border-bottom: 1px solid #dadada;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .projTitle span {
            font-family: "Droid Serif", serif;
            font-weight: normal;
            font-style: italic;
            text-transform: lowercase;
            color: #777;
        }

        .heading {
            padding: 1em 0;
            border-bottom: 1px solid #D0D0D0;
        }

        .heading h1 {
            font-family: "Droid Serif", serif;
            font-size: 2em;
            float: left;
        }

        .heading a.continue:link,
        .heading a.continue:visited {
            text-decoration: none;
            font-family: "Montserrat", sans-serif;
            letter-spacing: -.015em;
            font-size: .75em;
            padding: 1em;
            color: #fff;
            background: #82ca9c;
            font-weight: bold;
            border-radius: 50px;
            float: right;
            text-align: right;
            -webkit-transition: all 0.25s linear;
            -moz-transition: all 0.25s linear;
            -ms-transition: all 0.25s linear;
            -o-transition: all 0.25s linear;
            transition: all 0.25s linear;
        }

        .heading a.continue:after {
            content: "\276f";
            padding: .5em;
            position: relative;
            right: 0;
            -webkit-transition: all 0.15s linear;
            -moz-transition: all 0.15s linear;
            -ms-transition: all 0.15s linear;
            -o-transition: all 0.15s linear;
            transition: all 0.15s linear;
        }

        .heading a.continue:hover,
        .heading a.continue:focus,
        .heading a.continue:active {
            background: #f69679;
        }

        .heading a.continue:hover:after,
        .heading a.continue:focus:after,
        .heading a.continue:active:after {
            right: -10px;
        }

        .tableHead {
            display: table;
            width: 100%;
            font-family: "Montserrat", sans-serif;
            font-size: .75em;
        }

        .tableHead li {
            display: table-cell;
            padding: 1em 0;
            text-align: center;
        }

        .tableHead li.prodHeader {
            text-align: left;
        }

        .cart {
            padding: 1em 0;
        }

        .cart .items {
            display: block;
            width: 100%;
            vertical-align: middle;
            padding: 1.5em;
            border-bottom: 1px solid #fafafa;
        }

        .cart .items.even {
            background: #fafafa;
        }

        .cart .items .infoWrap {
            display: table;
            width: 100%;
        }

        .cart .items .cartSection {
            display: table-cell;
            vertical-align: middle;
        }

        .cart .items .cartSection .itemNumber {
            font-size: .75em;
            color: #777;
            margin-bottom: .5em;
        }

        .cart .items .cartSection h3 {
            font-size: 1em;
            font-family: "Montserrat", sans-serif;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: .025em;
        }

        .cart .items .cartSection p {
            display: inline-block;
            font-size: .85em;
            color: #777777;
            font-family: "Montserrat", sans-serif;
        }

        .cart .items .cartSection p .quantity {
            font-weight: bold;
            color: #333;
        }

        .cart .items .cartSection p.stockStatus {
            color: #82CA9C;
            font-weight: bold;
            padding: .5em 0 0 1em;
            text-transform: uppercase;
        }

        .cart .items .cartSection p.stockStatus.out {
            color: #F69679;
        }

        .cart .items .cartSection .itemImg {
            width: 4em;
            float: left;
        }

        .cart .items .cartSection.qtyWrap,
        .cart .items .cartSection.prodTotal {
            text-align: center;
        }

        .cart .items .cartSection.qtyWrap p,
        .cart .items .cartSection.prodTotal p {
            font-weight: bold;
            font-size: 1.25em;
        }

        .cart .items .cartSection input.qty {
            width: 2em;
            text-align: center;
            font-size: 1em;
            padding: .25em;
            margin: 1em .5em 0 0;
        }

        .cart .items .cartSection .itemImg {
            width: 8em;
            display: inline;
            padding-right: 1em;
        }

        .special {
            display: block;
            font-family: "Montserrat", sans-serif;
        }

        .special .specialContent {
            padding: 1em 1em 0;
            display: block;
            margin-top: .5em;
            border-top: 1px solid #dadada;
        }

        .special .specialContent:before {
            content: "\21b3";
            font-size: 1.5em;
            margin-right: 1em;
            color: #6f6f6f;
            font-family: helvetica, arial, sans-serif;
        }

        a.remove {
            text-decoration: none;
            font-family: "Montserrat", sans-serif;
            color: #ffffff;
            font-weight: bold;
            background: #e0e0e0;
            padding: .5em;
            font-size: .75em;
            display: inline-block;
            border-radius: 100%;
            line-height: .85;
            -webkit-transition: all 0.25s linear;
            -moz-transition: all 0.25s linear;
            -ms-transition: all 0.25s linear;
            -o-transition: all 0.25s linear;
            transition: all 0.25s linear;
        }

        a.remove:hover {
            background: #f30;
        }

        .promoCode {
            border: 2px solid #efefef;
            float: left;
            width: 35%;
            padding: 2%;
        }

        .promoCode label {
            display: block;
            width: 100%;
            font-style: italic;
            font-size: 1.15em;
            margin-bottom: .5em;
            letter-spacing: -.025em;
        }

        .promoCode input {
            width: 85%;
            font-size: 1em;
            padding: .5em;
            float: left;
            border: 1px solid #dadada;
        }

        .promoCode input:active,
        .promoCode input:focus {
            outline: 0;
        }

        .promoCode a.btn {
            float: left;
            width: 15%;
            padding: .75em 0;
            border-radius: 0 1em 1em 0;
            text-align: center;
            border: 1px solid #82ca9c;
        }

        .promoCode a.btn:hover {
            border: 1px solid #f69679;
            background: #f69679;
        }

        .btn:link,
        .btn:visited {
            text-decoration: none;
            font-family: "Montserrat", sans-serif;
            letter-spacing: -.015em;
            font-size: 1em;
            padding: 1em 3em;
            color: #fff;
            background: #82ca9c;
            font-weight: bold;
            border-radius: 50px;
            float: right;
            text-align: right;
            -webkit-transition: all 0.25s linear;
            -moz-transition: all 0.25s linear;
            -ms-transition: all 0.25s linear;
            -o-transition: all 0.25s linear;
            transition: all 0.25s linear;
        }

        .btn:after {
            content: "\276f";
            padding: .5em;
            position: relative;
            right: 0;
            -webkit-transition: all 0.15s linear;
            -moz-transition: all 0.15s linear;
            -ms-transition: all 0.15s linear;
            -o-transition: all 0.15s linear;
            transition: all 0.15s linear;
        }

        .btn:hover,
        .btn:focus,
        .btn:active {
            background: #f69679;
        }

        .btn:hover:after,
        .btn:focus:after,
        .btn:active:after {
            right: -10px;
        }

        .promoCode .btn {
            font-size: .85em;
            paddding: .5em 2em;
        }

        /* TOTAL AND CHECKOUT  */
        .subtotal {
            float: right;
            width: 35%;
        }

        .subtotal .totalRow {
            padding: .5em;
            text-align: right;
        }

        .subtotal .totalRow.final {
            font-size: 1.25em;
            font-weight: bold;
        }

        .subtotal .totalRow span {
            display: inline-block;
            padding: 0 0 0 1em;
            text-align: right;
        }

        .subtotal .totalRow .label {
            font-family: "Montserrat", sans-serif;
            font-size: .85em;
            text-transform: uppercase;
            color: #777;
        }

        .subtotal .totalRow .value {
            letter-spacing: -.025em;
            width: 35%;
        }

        @media only screen and (max-width: 39.375em) {
            .wrap {
                width: 98%;
                padding: 2% 0;
            }

            .projTitle {
                font-size: 1.5em;
                padding: 10% 5%;
            }

            .heading {
                padding: 1em;
                font-size: 90%;
            }

            .cart .items .cartSection {
                width: 90%;
                display: block;
                float: left;
            }

            .cart .items .cartSection.qtyWrap {
                width: 10%;
                text-align: center;
                padding: .5em 0;
                float: right;
            }

            .cart .items .cartSection.qtyWrap:before {
                content: "QTY";
                display: block;
                font-family: "Montserrat", sans-serif;
                padding: .25em;
                font-size: .75em;
            }

            .cart .items .cartSection.prodTotal,
            .cart .items .cartSection.removeWrap {
                display: none;
            }

            .cart .items .cartSection .itemImg {
                width: 25%;
            }

            .promoCode,
            .subtotal {
                width: 100%;
            }

            a.btn.continue {
                width: 100%;
                text-align: center;
            }
        }
    </style>
@endsection


@section('content')
    <div class="wrap cf">
        <div class="heading cf">
            <h1>{{ __('My_Cart') }}</h1>
        </div>
        <div class="cart">
            <!--    <ul class="tableHead">
                                                                          <li class="prodHeader">Product</li>
                                                                          <li>Quantity</li>
                                                                          <li>Total</li>
                                                                           <li>Remove</li>
                                                                        </ul>-->
            @php
                $totalSum = 0;
            @endphp
            <ul class="cartWrap">
                @foreach ($cart as $c)
                    <li class="items odd">

                        <div class="infoWrap">
                            <div class="cartSection">
                                <img src="{{ asset('storage/products/' . $c->product->image[0]->name) }}" alt=""
                                    class="itemImg" />
                                <p class="itemNumber">{{ $c->created_at }}</p>
                                <h3>{{ $c->product->name }}</h3>

                                <p> <input type="text" class="qty" placeholder="{{ $c->quantity }}" /> x
                                    {{ $c->product->price }}</p>
                                <p class="stockStatus"> In Stock</p>
                                @if ($c->colors != null)
                                    <p class="stockStatus">{{ $c->colors }}</p>
                                @endif
                                @if ($c->sizes != null)
                                    <p class="stockStatus">{{ $c->sizes }}</p>
                                @endif
                                @if ($c->capacity != null)
                                    <p class="stockStatus">{{ $c->capacity }}</p>
                                @endif
                                @if ($c->model != null)
                                    <p class="stockStatus">{{ $c->model }}</p>
                                @endif
                                @if ($c->tall != null)
                                    <p class="stockStatus">{{ $c->tall }}</p>
                                @endif

                            </div>

                            @php
                                $productPrice = $c->product->price;
                                $quantity = $c->quantity;
                                $itemTotal = $productPrice * $quantity;
                                $totalSum += $itemTotal;
                            @endphp
                            <div class="prodTotal cartSection">
                                <p>{{ $itemTotal }}</p>
                            </div>
                            <div class="cartSection removeWrap">
                                <form action="{{ route('cart.destroy', $c->id) }}" method="POST">
                                    @csrf
                                    <button class="delete" type="submit"><i class="fa fa-close"></i></button>
                                </form>

                            </div>
                        </div>
                    </li>
                @endforeach



                <!--<li class="items even">Item 2</li>-->

            </ul>
        </div>


        <div class="subtotal cf">
            <ul>

                <li class="totalRow final"><span class="label">{{ __('Total') }}</span><span
                        class="value">{{ $totalSum }}</span></li>
                <li class="totalRow"><a href="{{ route('checkout') }}" class="btn continue">Checkout</a></li>
            </ul>
        </div>
    </div>


@section('scripts')
    <script>
        $('a.remove').click(function() {
            event.preventDefault();
            $(this).parent().parent().parent().hide(400);

        })

        // Just for testing, show all items
        $('a.btn.continue').click(function() {
            $('li.items').show(400);
        })
    </script>
@endsection
@endsection
