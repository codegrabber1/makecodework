@extends(env('THEME').'.layouts.main')

@section('content')
    <div class="grid grid-cols-3">
        <div class="w-2/3 shadow">
            <img class="object-contain w-auto" src="{{asset(env('THEME')."/images/java.jpg")}}" alt="java">
            <div class="name">Java</div>
        </div>
        <div class="w-2/3 shadow">
            <img class="object-contain w-auto border border-blue-600" src="{{asset(env('THEME')."/images/php.png")}}" alt="php">
            <div class="name">php</div>
        </div>
        <div class="w-2/3 shadow">
            <img class="object-contain w-auto" src="" alt="html">
            <div class="name">html/css</div>
        </div>
        <div class="w-2/3 shadow">
            <img class="object-contain w-auto" src="" alt="javascript">
            <div class="name">javascript</div>
        </div>
        <div class="w-2/3 shadow">
            <img class="object-contain w-auto" src="" alt="ios">
            <div class="name">ios</div>
        </div>
        <div class="w-2/3 shadow">
            <img class="object-contain w-auto" src="" alt="android">
            <div class="name">Android</div>
        </div>
    </div>
    <section>
        
        here is a main content, which contains blocks with all categories and last posts from blog
    </section>
    
@stop