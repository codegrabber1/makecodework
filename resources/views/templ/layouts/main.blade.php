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
{{--<div id="preloader">--}}
    {{--<div class="loader">--}}
        {{--<img src="assets/image/logo/loader.gif" alt="preloader">--}}
    {{--</div>--}}
{{--</div>--}}
<!-- ===============  preloader Area End ====================-->
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