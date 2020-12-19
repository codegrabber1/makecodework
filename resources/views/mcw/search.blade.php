@extends(env("THEME").'.layouts.main')
@section('content')
    <div class="bg-white p-3 mb-3 border-2 flex justify-between">
        <h2 class="font-head"><strong>You are looking for:&nbsp; </strong> {{ $s }}</h2>
        <a class="text-gray-600" href="{{ route('index')  }}">{{ config('app.name', 'Makecodework') }}</a>
    </div>
        @if($posts->count())
            <div class="grid grid-cols-3 row-gap-1 gap-1">
                @foreach($posts as $post)
                    <div class="border-2 bg-white">
                        <h2 class="font-head p-3 text-2xl"><a href="{{ route('blog.category.post', $post->id) }}">{!! $post->bc_title !!} </a></h2>
                        <img src="{{ asset(env('THEME')).'/images/blog/'.$post->bc_image }}" alt="{{ $post->bc_title }}">
                        <div class="bg-blue-200 p-3 flex flex-row">
                            <p><strong>Category: </strong> {!! $post->category->bc_name !!}</p>

                        </div>
                        <div class="p-3">
                            {!! $post->bc_excerpt !!}
                        </div>
                        <div class="p-3 flex flex-row justify-between">
                            <p class="text-gray-600 text-sm " ><strong>Author:</strong> {{ $post->user->name }}</p>
                            <p class="text-gray-600 text-sm"><strong><i class="far fa-comments"></i> </strong> {{ count($post->comments) }} </p>
                        </div>
                    </div>
                @endforeach
                @if($posts->total() > $posts->count())
                    <div class="container ml-6 grid-cols-1">
                        {{ $posts->appends(['s' => request()->s])->links() }}
                    </div>
                @endif
            </div>
        @elseif($cats->count())
            <div class="grid grid-cols-3 row-gap-1 gap-1">
            @foreach($cats as $post)
                <div class="border-2 bg-white">
                    <h2 class="font-head text-2xl"><a href="{{ route('tutorials.category.post', $post->id) }}">{{ $post->p_title }}</a></h2>
                    <img src="{{ asset(env('THEME')).'/images/themes/'.$post->p_image }}" alt="{{ $post->p_title }}">
                    <div class=" p-3 flex flex-row">
                        <p>Category: {!! $post->category->th_cat_name !!}</p>
                    </div>
                    <div class="p-3">
                        {!! $post->p_excerpt !!}
                    </div>
                    <div class="p-3 flex flex-row justify-between">
                        <p class="text-gray-600 text-sm " ><strong>Author:</strong> {{ $post->user->name }}</p>
                        <p class="text-gray-600 text-sm"><strong><i class="far fa-comments"></i> </strong> {{ count($post->comments) }} </p>
                    </div>
                </div>
            @endforeach
            @if($cats->total() > $cats->count())
                <div class="container ml-6 grid-cols-1">
                    {{ $cats->appends(['s' => request()->s])->links() }}
                </div>
            @endif
            </div>
        @else
            <div class="border-2 p-3 w-100 bg-white">
                <h3 class="text-4xl font-head">Nothing found</h3>
            </div>
        @endif
@endsection