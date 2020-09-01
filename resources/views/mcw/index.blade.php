@extends(env('THEME').'.layouts.main')
{{--@section('sidebar')--}}
    {{--@include(env('THEME').'.sidebar')--}}
{{--@endsection--}}
@section('content')
    <section >
        <h2 class="p-3 bg-white mb-6 uppercase shadow font-bold">
            Search all tutorials </h2>
        <div class="grid grid-cols-3 row-gap-6 gap-6 ">
        @foreach($themes as $theme)
            <div class="shadow bg-white">
                <a href="{{ route('tutorials', $theme->id) }}" title="{{ $theme->theme_name }}">
                    <img class="object-contain h-40 mx-auto outline-none" src="{{ asset(env('THEME')).'/images/themes/'. $theme->theme_image }}" alt="{{ $theme->theme_name }}">
                </a>

                <div class="name m-5 font-semibold capitalize">{{ $theme->theme_name }}</div>
            </div>
        @endforeach
        </div>  
    </section>
     <section class="my-6 ">
        <h2 class="p-3 bg-white mb-6 uppercase shadow font-bold">
            Latest news from blog <span class="float-right capitalize text-green-400">
                <a href="{{ route('blog') }}">All news</a></span></h2>
        <div class="grid grid-cols-4 row-gap-3 gap-6">
            @foreach($lastPosts as $item)
                <div class="bg-white shadow">
                    <a href="{{ route('blog.category.post', $item->id) }}">
                        <img src="{{ asset(env('THEME')).'/images/blog/'.$item->bc_image }}" alt="{{ $item->bc_title }}">
                        <p class="py-2 px-4 font-semibold">{!! $item->bc_title !!}</p>
                    </a>
                    <div class="px-4 mb-1">{!! $item->bc_excerpt !!}</div>
                </div>
            @endforeach
        </div>
    </section>
@stop