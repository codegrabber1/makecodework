@extends(env("THEME").'.layouts.main')
@section('sidebar')
    @include(env('THEME').'.inner-sidebar')
@endsection
@section('content')
    <div class="grid grid-cols-2 row-gap-1 gap-1 mr-6">
        @foreach($lastPosts as $post)
            <div class="border-2 mr-2 p-3 bg-white">
               <h2 class="font-head"><a href="{{ route('blog.category.post', $post->id) }}">{!! $post->bc_title !!} </a></h2>
                <img src="{{ asset(env('THEME')).'/images/blog/'.$post->bc_image }}" alt="{{ $post->bc_title }}">
                <div class="bg-blue-200 p-3 flex flex-row">
                    <p>{!! $post->category->bc_name !!}</p>
                    <p>{{ \Carbon\Carbon::parse($post->created_at)->locale('uk')->isoFormat('d MMMM Y')}}</p>
                </div>
               <p>{!! $post->bc_excerpt !!}</p>
            </div>
        @endforeach
    </div>
    @if($lastPosts->total() > $lastPosts->count())
        <div class="container ml-6 grid-cols-1">
            {{ $lastPosts->links() }}
        </div>
    @endif
@endsection