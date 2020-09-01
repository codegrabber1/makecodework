<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset(env('THEME')).'/css/main.css'}}">

</head>
<body class="bg-background_sidebar font-main-font">
<div class="wrapper  ">

    <div class="container mx-auto flex  px-2 mb-4">

        @yield('sidebar')
        
        <div class=" w-full  mt-4 ">@yield('content')</div>
        
    </div>
    
    <footer class="w-full bg-blue-200 flex flex-row">
        <div class="container mx-auto flex flex-row justify-center">
            <a href="">makecodework</a>&nbsp copyright 	&copy;  <?=date('Y')?>
        </div>

    </footer>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset(env("THEME")).'/js/scripts.js' }}"></script>
<script src="{{ asset(env("THEME")).'/js/comment-reply.js' }}"></script>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/uk_UA/sdk.js#xfbml=1&version=v8.0&appId=498188843586746&autoLogAppEvents=1" nonce="KoUidzyQ"></script>
</body>
</html>
