@extends(env('THEME').'.layouts.main')
@section('content')
    <div class="grid gap-4 grid-cols-2">
    @foreach($allPosts as $post)
        <div class="border-2 m-2 p-3">
            <h1><a href="{{ route('tutorials.category.post', $post->id) }}">{{ $post->p_title }}</a></h1>
            <img class="w-1/2" src="{{ asset(env('THEME')).'/images/themes/'.$post->p_image }}" alt="{{ $post->p_title }}">

            <p>{!! $post->p_excerpt !!}</p>
        </div>
    @endforeach
    </div>
@endsection