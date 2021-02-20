<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/transition.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/dropdown.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/form.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/input.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/icon.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.10.0/css/lightgallery.min.css">
    <link rel="stylesheet" href="{{asset(env('THEME')).'/css/main.css'}}">

    <title>{{ config('app.name', 'Makecodework') }}</title>

</head>
<body class="bg-background_sidebar font-main text-sm">
<div class="wrapper mx-auto">
    <div class="flex mb-4 mx-12">
        <div class="w-full mt-4">
        @yield('content')
       </div>
        @yield('sidebar')
    </div>
</div>
<footer class="w-full flex flex-row bg-background_footer p-3 ">
    <div class="container mx-auto flex flex-row justify-center m-1">
        <a class="text-gray-600" href="">{{ config('app.name', 'Makecodework') }}</a>&nbsp 	&copy;  <?=date('Y')?>
    </div>

</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/transition.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/dropdown.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/form.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.10.0/js/lightgallery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lg-thumbnail/1.2.1/lg-thumbnail.min.js?ver=1.2.1"></script>

<script src="{{ asset(env("THEME")).'/js/scripts.js' }}"></script>
<script src="{{ asset(env("THEME")).'/js/comment-reply.js' }}"></script>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/uk_UA/sdk.js#xfbml=1&version=v8.0&appId=498188843586746&autoLogAppEvents=1" nonce="KoUidzyQ"></script>
</body>
</html>
