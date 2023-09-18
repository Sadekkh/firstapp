<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>YFB Store</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('view/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('view/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('view/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('view/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('view/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('view/css/style.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet" />
    @yield('styles')
    <style>
        .category-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
            column-count: 4;
            /* Set the number of columns */
            column-gap: 20px;
            /* Adjust the gap between columns */
        }

        .category-item {
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .header-search {
                display: none;
            }

            .cart-dropdown {
                right: -110% !important
            }

            .wishlist {
                right: -235% !important
            }
        }
    </style>
</head>

<body>
    <!-- HEADER -->
    <header>
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="#" class="logo">

                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form>
                                <select class="input-select">
                                    <option value="">{{ __('all_category') }}</option>
                                    @foreach ($categories as $category)
                                        @if ($category->parent_id == null)
                                            <option value="{{ $category->id }}">{{ $category->name_en }}</option>
                                        @endif
                                    @endforeach

                                </select>
                                <input class="input" placeholder="Search here" />
                                <button class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->

                            <!-- /Wishlist -->

                            <!-- Cart -->
                            <div class="dropdown">
                                @include('components.wishlist')
                            </div>
                            <div class="dropdown">
                                @include('components.cart')
                            </div>
                            <!-- /Cart -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li class="active"><a href="/index">{{ __('Home') }}</a></li>
                    <li><a href="{{ route('product') }}">{{ __('Products') }}</a></li>
                    <li><a href="#">{{ __('ContactUs') }}</a></li>


                    <li class="nav-item menu-items">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <span class="menu-icon">
                                <i class="mdi mdi-security"></i>
                            </span>
                            <span class="menu-title">{{ __('categories') }}</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                @foreach ($categories as $category)
                                    <li class="nav-item"><a class="nav-link"
                                            href="">{{ $category->name_en }}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </li>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                @yield('content')
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>

    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-4 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">{{ __('About Us') }}</h3>
                            <p>{{ $settings[13]->value_en }}</p>
                            <ul class="footer-links">
                                <li>
                                    <a href="#"><i class="fa fa-map-marker"></i>{{ $settings[14]->value_en }}</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-phone"></i>{{ $settings[15]->value_en }}</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-envelope-o"></i>{{ $settings[16]->value_en }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4 col-xs-6">
                        <div class="footer">
                            <center>

                                <h3 class="footer-title ">{{ __('Categories') }}</h3>
                            </center>

                            <ul class="footer-links category-list" style="column-count: 2">
                                @foreach ($categories as $category)
                                    @if ($category->parent_id == null)
                                        <li class="category-item"><a href="#">{{ $category->name_en }}</a></li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-4 col-xs-6">
                        <div class="footer">
                            <center>

                                <h3 class="footer-title">{{ __('brand') }}</h3>
                            </center>
                            <ul class="footer-links category-list">
                                @foreach ($brand as $category)
                                    <li class="category-item"><a href="#">{{ $category->name_en }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>


                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->

        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="footer-payments">
                            <li>
                                <a href="#"><i class="fa fa-cc-visa"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-credit-card"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-cc-paypal"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-cc-mastercard"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-cc-discover"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-cc-amex"></i></a>
                            </li>
                        </ul>
                        <span class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved | This template is made with <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="https://colorlib.com"
                                target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js">
        < script src = "{{ asset('view/js/slick.min.js') }}" >
    </script>
    <script src="{{ asset('view/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('view/js/slick.min.js') }}"></script>
    <script src="{{ asset('view/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('view/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('view/js/main.js') }}"></script>


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @yield('scripts')
</body>

</html>
