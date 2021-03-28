@extends(env("THEME").'.layouts.main')
<div class="p-3 bg-white mb-6 uppercase shadow font-head font-semibold">
    <ul class="flex mx-10">
        <li class="mr-6"><a href="{{ route("index") }}">Find more tutorials: </a></li>
        @foreach($tutorialCategories as $item)
            <li class="mr-6"><a href="{{ route('tutorials.category', $item->id) }}">{{ $item->th_cat_name  }}</a></li>
        @endforeach
        
    </ul>
</div>
@section('sidebar')
    @include(env('THEME').'.inner-sidebar')
@endsection
@section('content')

    <div class="grid grid-cols-2 row-gap-1 gap-1 mr-6">
        @foreach($lastPosts as $post)
            <div class="border-2 mr-2 bg-white">
               <h2 class="font-head p-3 text-2xl"><a href="{{ route('blog.category.post', $post->id) }}">{!! $post->bc_title !!} </a></h2>
                <img src="{{ asset(env('THEME')).'/images/blog/'.$post->bc_image }}" alt="{{ $post->bc_title }}">
                <div class="bg-blue-200 p-3 flex flex-row justify-between">
                    <p>{!! $post->category->bc_name !!}</p>
                    <p>{{ \Carbon\Carbon::parse($post->created_at)->locale('uk')->isoFormat('D MMM Y')}}</p>
                </div>
                <div class="p-3">
                    {!! $post->bc_excerpt !!}
                </div>

            </div>
        @endforeach
    </div>
    @if($lastPosts->total() > $lastPosts->count())
        <div class="container ml-6 grid-cols-1">
            {{ $lastPosts->links() }}
        </div>
    @endif
@endsection