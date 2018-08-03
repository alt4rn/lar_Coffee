<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--
    Document Title
    =============================================
    -->
    <title>Coffee Grande</title>
    <!--
    Favicons
    =============================================
    -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('template/assets/images/favicons/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('template/assets/images/favicons/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('template/assets/images/favicons/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('template/assets/images/favicons/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('template/assets/images/favicons/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('template/assets/images/favicons/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('template/assets/images/favicons/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('template/assets/images/favicons/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('template/assets/images/favicons/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('template/assets/images/favicons/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('template/assets/images/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('template/assets/images/favicons/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('template/assets/images/favicons/favicon-16x16.png')}}">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('template/assets/images/favicons/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
    <!--
    Stylesheets
    =============================================

    -->
    <!-- Default stylesheets-->
    <link href="{{ asset('template/assets/lib/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800')}}" rel="stylesheet">
    <link href="{{ asset('template/assets/lib/animate.css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('template/assets/lib/components-font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('template/assets/lib/et-line-font/et-line-font.css')}}" rel="stylesheet">
    <link href="{{ asset('template/assets/lib/flexslider/flexslider.css')}}" rel="stylesheet">
    <link href="{{ asset('template/assets/lib/owl.carousel/dist/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('template/assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{ asset('template/assets/lib/magnific-popup/dist/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{ asset('template/assets/lib/simple-text-rotator/simpletextrotator.css')}}" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link href="{{ asset('template/assets/css/style.css')}}" rel="stylesheet">
    <link id="color-scheme" href="{{ asset('template/assets/css/colors/default.css')}}" rel="stylesheet">
</head>
<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
<main>
    <div class="page-loader">
        <div class="loader">Loading...</div>
    </div>
    <nav class="navbar navbar-custom navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="index.html">Coffee Grande</a>
            </div>
            <div class="collapse navbar-collapse" id="custom-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li><a href="{{ route('about') }}">Seputar Kami</a>
                    </li>
                    <li><a href="{{ route('promo') }}">Promo</a>
                    </li>
                    <li><a href="{{ route('product') }}">Produk</a>
                    </li>
                    <li><a href="{{ route('cart') }}">Troli ({{ Cart::count() }})</a>
                    </li>
                    @if(Auth::guest())
                        <li><a href="{{ route('user.login') }}">Masuk / Daftar</a>
                        </li>
                    @elseif(Auth::check())
                        @if(Auth::user()->isAdmin() == '0')
                        <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('profile', ['id' => Auth::user()->id]) }}"><i class="icon-profile-male"></i> Profil</a></li>
                                <li><a href="{{ route('user.order', ['id' => Auth::user()->id]) }}"><i class="icon-basket"></i> Pesanan</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="icon-key"></i>
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        @elseif(Auth::user()->isAdmin() == '1')
                        <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Admin</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('profile', ['id' => Auth::user()->id]) }}"><i class="fa fa-bolt"></i> Profil</a></li>
                                <li><a href="{{ route('user.order', ['id' => Auth::user()->id]) }}"><i class="fa fa-link fa-sm"></i> Pesanan</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        @endif
                    @endif
                </ul>
            </div>

        @if (Session::has('flash_message'))
        <div class="container">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('flash_message') }}
            </div>
        </div>
        @elseif (Session::has('error'))
        <div class="container">
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('flash_message') }}
            </div>
        </div>
        @endif
        
        </div>
    </nav>

    @yield('content')

    <div class="module-small bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="widget">
                        <h5 class="widget-title font-alt">Kontak Kami</h5>
                        <p>Alamat: Jalan Raya Mulyosari No.290, Kalisari, Mulyorejo, Kota SBY, Jawa Timur 60113.</p>
                        <p>Phone: 0851-0347-6277</p>
                        <p>Surel:<a href="#">coffee_grande@gmail.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="divider-d">
    <footer class="footer bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p class="copyright font-alt">&copy; 2017&nbsp;<a href="index.html">Coffee Grande</a>, All Rights Reserved</p>
                </div>
                <div class="col-sm-6">
                    <div class="footer-social-links"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a><a href="#"><i class="fa fa-skype"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    </div>
    <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
</main>
<!--
JavaScripts
=============================================
-->
<script src="{{ asset('template/assets/lib/jquery/dist/jquery.js') }}"></script>
<script src="{{ asset('template/assets/lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('template/assets/lib/wow/dist/wow.js') }}"></script>
<script src="{{ asset('template/assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js') }}"></script>
<script src="{{ asset('template/assets/lib/isotope/dist/isotope.pkgd.js') }}"></script>
<script src="{{ asset('template/assets/lib/imagesloaded/imagesloaded.pkgd.js') }}"></script>
<script src="{{ asset('template/assets/lib/flexslider/jquery.flexslider.js') }}"></script>
<script src="{{ asset('template/assets/lib/owl.carousel/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('template/assets/lib/smoothscroll.js') }}"></script>
<script src="{{ asset('template/assets/lib/magnific-popup/dist/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('template/assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js') }}"></script>
<script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUajqsbqtLm_0U-rslv0Ya4DXDe2Naxwk"></script>
<script src="{{ asset('template/assets/js/plugins.js') }}"></script>
<script src="{{ asset('template/assets/js/main.js') }}"></script>
</body>
</html>