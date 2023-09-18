@extends('layouts.main')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        @media (min-width: 1200px) {
            .container {
                width: 100%;
            }
        }

        .icon {
            cursor: pointer;
            position: relative;
            display: inline-block;
            width: 60px;
            height: 60px;
            margin-left: 12px;
            margin-right: 12px;
            border-radius: 30px;
            overflow: hidden;
        }

        .icon::before,
        .icon::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            transition: all 0.25s ease;
            border-radius: 30px;
        }

        .icon i {
            position: relative;
            color: #ffffff;
            font-size: 30px;
            margin-top: 25%;

            transition: all 0.25s ease;
        }



        .icon-enter::after {
            box-shadow: inset 0 0 0 1px #eb3232;
        }

        .icon-enter::before {
            border-radius: 0;
            margin-left: -100%;
            box-shadow: inset 0 0 0 60px #eb3232;


        }

        .icon-enter:hover::before {
            margin-left: 0;
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
    </style>
@endsection
@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ 'your_oder_was_successfully_remember_your_code' }}{{ session('message') }}
        </div>
    @endif
    <main class="cd-main-content">
        <div class="cd-tab-filter-wrapper">
            <div class="cd-tab-filter filtering">
                <ul class="cd-filters" id="sorts">
                    <li class="placeholder">
                        <a data-type="all" href="#0">All</a> <!-- selected option on mobile -->
                    </li>
                    <li class="filter"><input type="" data-type="all" hidden><a class="selected" href="#"
                            data-type="all">All</a></li>
                    <li class="filter"><a href="#" data-type="trending">{{ __('trending') }}</a>
                    </li>
                    <li class="filter"><a href="#" data-type="bestdiscount">{{ 'best_discount' }}</a>
                    </li>
                </ul> <!-- cd-filters -->
            </div> <!-- cd-tab-filter -->
        </div> <!-- cd-tab-filter-wrapper -->

        <section class="cd-gallery">
            <div class="row" id="product-list">
                <!-- product -->
                @include('components.data')
                @if ($products->hasMorePages())
                    <div class="load-more" id="load-more">
                        <button style="hidden" data-next-page="{{ $products->currentPage() + 1 }}"></button>
                    </div>
                @endif
            </div>
            <div class="cd-fail-message">No results found</div>
        </section> <!-- cd-gallery -->

        <div class="cd-filter">
            <form>
                <div class="cd-filter-block">
                    <h4>Search</h4>

                    <div class="cd-filter-content">
                        <input type="search" placeholder="Try color-1...">
                    </div> <!-- cd-filter-content -->
                </div> <!-- cd-filter-block -->

                <div class="cd-filter-block filtering">
                    <h4>{{ __('Categories') }}</h4>

                    <ul class="cd-filter-content cd-filters list">
                        @foreach ($categories as $category)
                            <li>
                                <input class="filter" type="checkbox" id="category_{{ $category->id }}"
                                    value="{{ $category->id }}" data-type="category">
                                <label class="checkbox-label" for="category_{{ $category->id }}">
                                    {{ $category->name_en }}</label>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <div class="cd-filter-block filtering">
                    <h4>{{ __('Price') }}</h4>


                    <div class="cd-filter-content">
                        <div class="cd-select cd-filters">
                            <div class="price-filter">
                                <div class="input-number price-min">
                                    <input id="price-min" type="number" name="min_price">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                                <span>-</span>
                                <div class="input-number price-max">
                                    <input id="price-max" type="number" name="max_price">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                        </div> <!-- cd-select -->
                    </div> <!-- cd-filter-content -->
                </div>
                <div class="cd-filter-block filtering">
                    <h4>{{ __('Brand') }}</h4>

                    <ul class="cd-filter-content cd-filters list">
                        @foreach ($brands as $brand)
                            <li>
                                <input class="filter" type="checkbox" id="brand_{{ $brand->id }}"
                                    value="{{ $brand->id }}" data-type="brand">
                                <label class="checkbox-label" for="brand_{{ $brand->id }}">
                                    {{ $brand->name_en }}</label>
                            </li>
                        @endforeach

                    </ul>
                </div>
                @foreach ($attribute as $a)
                    <div class="cd-filter-block filtering">
                        <h4>{{ $a->name_en }}</h4>

                        <ul class="cd-filter-content cd-filters list">
                            @foreach ($a->variation as $v)
                                <li class=" {{ $a->name_en }}">
                                    <input class="filter" type="checkbox" id="{{ $a->name_en }}_{{ $v->id }}"
                                        value="{{ $v->id }}" data-type="{{ $a->name_en }}">
                                    <label class="checkbox-label" for="{{ $a->name_en }}_{{ $v->id }}">
                                        {{ $v->name_en }}</label>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                @endforeach

            </form>

            <a href="#0" class="cd-close">X</a>
        </div> <!-- cd-filter -->

        <a href="#0" class="cd-filter-trigger">{{ __('Filters') }}</a>
    </main>

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-infinitescroll/4.0.1/infinite-scroll.pkgd.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Event listener for category and brand filter changes
            $('.filtering input[type="checkbox"] , #price-min, #price-max, #sorts a').on('change ', function() {
                applyFilters();
            });
            $('#sorts a').on('click', function(e) {
                e.preventDefault(); // Prevent the default link behavior

                // Remove the "selected" class from all links
                $('#sorts a').removeClass('selected');

                // Add the "selected" class to the clicked link
                $(this).addClass('selected');

                applyFilters();
            });

            function applyFilters() {
                const selectedCategories = [];
                const selectedBrands = [];
                const selectedcolors = [];
                const selectedmodel = [];


                $('.filtering input[type="checkbox"]:checked').each(function() {
                    const value = $(this).val();
                    const type = $(this).data('type');

                    if (type === 'category') {
                        selectedCategories.push(value);
                    } else if (type === 'brand') {
                        selectedBrands.push(value);

                    } else if (type === 'colors') {
                        selectedcolors.push(value);
                    } else if (type === 'model') {
                        selectedmodel.push(value);

                    }

                });
                const minPrice = $('#price-min').val();
                const maxPrice = $('#price-max').val();
                const sort = $('#sorts a.selected').data('type');
                console.log(sort);

                if ((selectedBrands.length == 0) && (selectedCategories.length == 0) && (selectedcolors.length ==
                        0) && (selectedmodel.length == 0) && (sort == 'all')) {
                    location.reload();
                } else {


                    // Make an AJAX request
                    $.ajax({
                        type: 'get',
                        url: '/filter', // Replace with your route URL
                        data: {
                            categories: selectedCategories,
                            min_price: minPrice,
                            max_price: maxPrice,
                            brands: selectedBrands,
                            colors: selectedcolors,
                            model: selectedmodel,
                            sorting: sort
                        },
                        success: function(products) {
                            // Update content area with filtered results
                            $('#product-list').html(products);
                            console.log(products);
                        }
                    });
                }
            }
        });
        $(document).ready(function() {
            $('#product-list').infiniteScroll({
                path: function() {
                    const nextPage = $('#load-more button').data('next-page');
                    return '/products?page=' + nextPage;
                },
                append: '#product-list',
                history: false,
                hideNav: '#load-more',
            });
        });
        $(document).ready(function() {
            $('#product-list').infiniteScroll({
                path: function() {
                    const nextPage = $('#load-more button').data('next-page');
                    return '/filter?page=' + nextPage;
                },
                append: '#product-list',
                history: false,
                hideNav: '#load-more',
            });
        });

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
@endsection
