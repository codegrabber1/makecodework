@extends(env('THEME').'.layouts.main')

@section('content')
    <div class="grid grid-cols-3 row-gap-6 col-gap-4">
        @foreach($themes as $theme)
        <div class=" shadow">
            <a href="{{ route('tutorials', $theme->id) }}" title="{{ $theme->theme_name }}">
                <img class="object-contain " src="{{ asset(env('THEME')).'/images/themes/'. $theme->theme_image }}" alt="{{ $theme->theme_name }}">
            </a>
            <div class="name">{{ $theme->theme_name }}</div>
        </div>
        @endforeach
    </div>
    
    <section>
        <h2 class="p-6 bg-blue-400 my-8">Latest news from blog</h2>
        <ul>
            @foreach($lastPosts as $item)
                <li>{!! $item->bc_title !!}</li>
            @endforeach
        </ul>
    </section>
    
@stop