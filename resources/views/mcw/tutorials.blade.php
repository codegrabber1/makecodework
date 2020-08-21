@extends(env('THEME').'.layouts.main')

@section('content')
    <ul class="flex flex-row">
        <li class="mr-6"><a href="{{ route("index") }}">Home</a></li>
        @foreach($tutorialCategories as $item)
            <li class="mr-6"><a href="{{ route('tutorials.category', $item->id) }}">{{ $item->th_cat_name  }}</a></li>
        @endforeach
    </ul>

    @if(!empty($allPosts))
    <div class="container">
        <div class="grid gap-4 grid-cols-2">
            @foreach($allPosts as $post)
                <div class="border-2 flex-grow-0">
                    <img class="w-1/2" src="{{ asset(env('THEME')).'/images/themes/'.$post->p_image }}" alt="">
                    <a href="{{ route('tutorials.category.post', $post->id) }}">{{ $post->p_title }}</a>
                    {!! $post->p_excerpt !!}
                </div>
            @endforeach
        </div>
    </div>
    @else
        <p>There is no article yet!</p>
    @endif
@endsection