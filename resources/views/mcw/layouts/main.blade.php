<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{asset(env('THEME')).'/css/main.min.css'}}">

</head>
<body>
<div class="wrapper w-full">
    <header class=" w-full py-6 bg-orange-400">
        <div class="container mx-auto flex flex-row justify-between">
            <div class="logo border border-green-600  mr-5">Logo</div>
            <nav class="flex flex-row">
                <ul class="flex flex-row">
                    <li class="mr-4"><a href="#">menu item</a></li>
                    <li class="mr-4"><a href="#">menu item</a></li>
                    <li class="mr-4"><a href="#">menu item</a></li>
                </ul>
            </nav>
            <div class="search">
                <input type="text" name="search" value="search">
            </div>
        </div>

    </header>
    <div class="container mx-auto border border-blue-600 mb-8 mt-8">
        @yield('content')
    </div>


    <footer class="w-full bg-blue-200 flex flex-row">
        <div class="container mx-auto flex flex-row justify-between">
            <h2>Footer</h2>  
            <ul class="mr-2 ml-2">
                <li><a href="#">menu item</a></li>
                <li><a href="#">menu item</a></li>
            </ul>
        </div>

    </footer>
</div>

</body>
</html>
