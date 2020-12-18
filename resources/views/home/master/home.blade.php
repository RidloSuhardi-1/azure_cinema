<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Azure Cinema | @yield('title')</title>
        <!-- Bootstrap -->
        <link href="{{ asset('plugins/azure_theme/bootstrap/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
        <!-- Animate.css -->
        <link href="{{ asset('plugins/azure_theme/animate.css/animate.css') }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome iconic font -->
        <link href="{{ asset('plugins/azure_theme/fontawesome/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css" />
        <!-- Magnific Popup -->
        <link href="{{ asset('plugins/azure_theme/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
        <!-- Slick carousel -->
        <link href="{{ asset('plugins/azure_theme/slick/slick.css') }}" rel="stylesheet" type="text/css" />
        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Oswald:300,400,500,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
        <!-- Theme styles -->
        <link href="{{ asset('plugins/azure_theme/css/dot-icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('plugins/azure_theme/css/theme.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body class="body">
        <header class="header header-horizontal header-view-pannel">
            <div class="container">
                <nav class="navbar">
                    <a class="navbar-brand" href="/dash">
                        <span class="logo-element">
                            <span class="logo-tape">
                                <img src="{{ asset('dist/img/svg/logo-part.png') }}" alt="svg-content svg-fill-theme">
                                <!-- <span class="svg-content svg-fill-theme" data-svg="{{ asset('dist/img/svg/logo-part.svg') }}"></span> -->
                            </span>
                            <span class="logo-text text-uppercase">
                                Azure Cinema</span>
                        </span>
                    </a>
                    <button class="navbar-toggler" type="button">
                        <span class="th-dots-active-close th-dots th-bars">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                    <div class="navbar-collapse">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/dash">Home</a>
                            </li>
                            <li class="nav-item nav-item-arrow-down nav-hover-show-sub">
                                <a class="nav-link" href="#">Products</a>
                                <div class="nav-arrow"><i class="fas fa-chevron-down"></i></div>
                                <ul class="collapse nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/movie_lists">Movies</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/gallery">Trailer Gallery</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/transaction_history">Transaction</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About us</a>
                            </li>
                        </ul>
                        <div class="navbar-extra">
                            <div class="btn-group">
                                <a class="btn-theme btn mr-1" href="/login_consumer"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;Login</a>
                                <a class="btn-theme btn" href="/register_consumer"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;Register</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

    <!-- The content goes here -->
    @section('content')
    @show
    <!-- End Content -->

        <a class="scroll-top disabled" href="#"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
        <footer class="section-text-white footer footer-links bg-darken">
            <div class="footer-body container">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <a class="footer-logo" href="./">
                            <span class="logo-element">
                                <span class="logo-tape">
                                    <img src="{{ asset('dist/img/svg/logo-part.png') }}" class="svg-content svg-fill-theme" alt="">
                                    <!-- <span class="svg-content svg-fill-theme" data-svg=""></span> -->
                                </span>
                                <span class="logo-text text-uppercase">
                                    <span>Azu</span>re Cinema</span>
                            </span>
                        </a>
                        <div class="footer-content">
                            <p class="footer-text">Malang 14045,
                                <br/>Indonesia</p>
                            <p class="footer-text">Call us:&nbsp;&nbsp;(555) 555-0312</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <h5 class="footer-title text-uppercase">Movies</h5>
                        <ul class="list-unstyled list-wide footer-content">
                            <li>
                                <a class="content-link" href="#">All Movies</a>
                            </li>
                            <li>
                                <a class="content-link" href="#">Upcoming movies</a>
                            </li>
                            <li>
                                <a class="content-link" href="#">Top 100 movies</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <h5 class="footer-title text-uppercase">Information</h5>
                        <ul class="list-unstyled list-wide footer-content">
                            <li>
                                <a class="content-link" href="#">Contact us</a>
                            </li>
                            <li>
                                <a class="content-link" href="#">Community</a>
                            </li>
                            <li>
                                <a class="content-link" href="#">Blog</a>
                            </li>
                            <li>
                                <a class="content-link" href="#">Azure Cinema Portal</a>
                            </li>
                            <li>
                                <a class="content-link" href="#">Help center</a>
                            </li>
                            <li>
                                <hr>
                            </li>
                            <li>
                                <a class="content-link text-warning" href="#">
                                    Azure Cinema Portal
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <h5 class="footer-title text-uppercase">Follow</h5>
                        <ul class="list-wide footer-content list-inline">
                            <li class="list-inline-item">
                                <a class="content-link" href="#"><i class="fab fa-slack-hash"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a class="content-link" href="#"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a class="content-link" href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a class="content-link" href="#"><i class="fab fa-dribbble"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a class="content-link" href="#"><i class="fab fa-google-plus-g"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a class="content-link" href="#"><i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                        <h5 class="footer-title text-uppercase">Subscribe</h5>
                        <div class="footer-content">
                            <p class="footer-text">Get latest movie news right away with our subscription</p>
                            <form class="footer-form" autocomplete="off">
                                <div class="input-group">
                                    <input class="form-control" name="email" type="email" placeholder="Your email" />
                                    <div class="input-group-append">
                                        <button class="btn btn-theme" type="submit"><i class="fas fa-angle-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copy">
                <div class="container">Azure Cinema | Copyright 2019 &copy; AmigosThemes. All rights reserved.</div>
            </div>
        </footer>
        <!-- jQuery library -->
        <script src="{{ asset('plugins/azure_theme/js/jquery-3.3.1.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('plugins/azure_theme/bootstrap/js/bootstrap.js') }}"></script>
        <!-- Paralax.js -->
        <script src="{{ asset('plugins/azure_theme/parallax.js/parallax.js') }}"></script>
        <!-- Waypoints -->
        <script src="{{ asset('plugins/azure_theme/waypoints/jquery.waypoints.min.js') }}"></script>
        <!-- Slick carousel -->
        <script src="{{ asset('plugins/azure_theme/slick/slick.min.js') }}"></script>
        <!-- Magnific Popup -->
        <script src="{{ asset('plugins/azure_theme/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
        <!-- Inits product scripts -->
        <script src="{{ asset('plugins/azure_theme/js/script.js') }}"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJ4Qy67ZAILavdLyYV2ZwlShd0VAqzRXA&callback=initMap"></script>
        <script async defer src="https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/js/rating.js"></script>
        <!-- Spesific script -->
        <script type="text/javascript">
            function increaseValue() {
                var itemPrice = parseInt(document.getElementById('item-price').innerHTML);
                var qty = parseInt(document.getElementById('item-qty').value);

                qty = isNaN(qty) ? 0 : qty;
                qty++;

                document.getElementById('item-qty').value = qty;

                price = p * qty;
                document.getElementById('item-price').innerHTML = price;
            }

            function decreaseValue() {
                var itemPrice = parseInt(document.getElementById('item-price').innerHTML);
                var qty = parseInt(document.getElementById('item-qty').value);

                qty = isNaN(qty) ? 0 : qty;
                qty < 1 ? qty = 1 : '';
                qty--;

                document.getElementById('item-qty').value = qty;
                price = p * qty;
                document.getElementById('item-price').innerHTML=price;
            }

            var p = parseInt(document.getElementById('item-price').innerHTML);
            var totalPrice = p;
            console.log(totalPrice);
            // document.getElementById('item-price').innerHTML = totalPrice;
        </script>
    </body>
</html>
