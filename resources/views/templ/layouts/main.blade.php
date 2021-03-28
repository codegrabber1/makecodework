<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    
    <link rel="shortcut icon" type="image/png" href="assets/image/logo/favicon.ico">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset(env('THEME')).'/css/owl.carousel.min.css'}}" />
    <link rel="stylesheet" type="text/css" href="{{asset(env('THEME')).'/css/fontawesome.min.css'}}" />
    <link rel="stylesheet" type="text/css" href="{{asset(env('THEME')).'/css/slicknav.min.css'}}" />
    <link rel="stylesheet" type="text/css" href="{{asset(env('THEME')).'/css/custom.css'}}" />
    <link rel="stylesheet" type="text/css" href="{{asset(env('THEME')).'/css/style.css'}}" />
    <link rel="stylesheet" type="text/css" href="{{asset(env('THEME')).'/css/responsive.css'}}" />

    <title>{{ config('app.name', 'Makecodework') }}</title>
</head>

<body>
<!-- ===============  preloader Area Start ====================-->
<div id="preloader">
    <div class="loader">
        <img src="{{asset(env('THEME')).'/images/logo/loader.gif'}}" alt="preloader">
    </div>
</div>
<!-- ===============  preloader Area End ====================-->
<!-- =============== 1.1 Menu Area Start====================-->
<header class="header-menu" id="header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="logo">
                    <a href="{{ route('index') }}"><img src="{{asset(env('THEME')).'/image/logo/logo.png'}}" alt="logo"></a>
                </div>
            </div>
            <div class="col-lg-9 d-none d-lg-block">
                <div class="main-menu">
                    <nav class="nav-menu">
                        <ul id="navigation">
                            <li class="active"><a href="#home">Home</a></li>
                            <li><a href="#about">About Me</a></li>
                            <li><a href="#work">Tutorials</a></li>
                            <li><a href="#portfolio">portfolo</a></li>
                            <li><a href="#blog">News</a></li>
                            <li><a href="#contact">contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-12 d-block d-lg-none">
                <div class="mobile_menu"></div>
            </div>
        </div>
    </div>
</header>
@yield('content')
<footer>
    <p><a target="_blank" href="#">{{ config('app.name', 'Makecodework') }}</a></p>
</footer>
<!-- =============== 1.9 Footer Area Start ====================-->
<script src="{{asset(env('THEME')).'/js/jquery-3.3.1.min.js'}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script src="{{asset(env('THEME')).'/js/jquery.easing.1.3.js'}}"></script>
<script src="{{asset(env('THEME')).'/js/fontawesome.min.js'}}"></script>
<script src="{{asset(env('THEME')).'/js/owl.carousel.min.js'}}"></script>
<script src="{{asset(env('THEME')).'/js/slicknav.min.js'}}"></script>
<script src="{{asset(env('THEME')).'/js/imagesloaded.pkgd.min.js'}}"></script>
<script src="{{asset(env('THEME')).'/js/isotope.pkgd.min.js'}}"></script>
<script src="{{asset(env('THEME')).'/js/wow.min.js'}}"></script>
<script src="{{asset(env('THEME')).'/js/main.js'}}"></script>

</body>
</html>