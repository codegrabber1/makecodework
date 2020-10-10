@extends(env('THEME').'.layouts.main')
{{--@section('sidebar')--}}
    {{--@include(env('THEME').'.inner-sidebar')--}}
{{--@endsection--}}
@section('content')

    <ul class="flex">
        <li class="mr-6"><a href="{{ route("index") }}">Home</a></li>
        @foreach($tutorialCategories as $item)
            <li class="mr-6"><a href="{{ route('tutorials.category', $item->id) }}">{{ $item->th_cat_name  }}</a></li>
        @endforeach
    </ul>

    <div class="bg-white p-5 my-3 text-center shadow">
        The description of the category
    </div>

    @if(!empty($tutorialCategories))
    <div class="container">
        <div class="grid gap-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 ">
            @foreach($tutorialCategories as $post)
                <div class="bg-white navBlock shadow">
                    <img class="w-full max-h-64 h-64" src="{{ asset(env('THEME')).'/images/themes/'.$post->th_cat_img }}" alt="">
                    <h3 class="mx-4 text-2xl">
                        <strong>Category:</strong> &nbsp;<a href="{{ route('tutorials.category', $post->id) }}">{{ $post->th_cat_name }}</a>
                    </h3>
                    <div class="meta text-sm text-gray-500 text-sm mx-1 my-2">
                        <ul class="flex justify-around my-1">
                            <li>Author: {{ $post->user->name }} </li>
                            <li>Theme: {{ $post->theme->theme_name }}</li>
                            <li>Published: {{ \Carbon\Carbon::parse($post->created_at )->locale('uk')->isoFormat('D MMM Y') }} </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
        @if($tutorialCategories->total() > $tutorialCategories->count())
            <div class="container ml-6 grid-cols-1">
                {{ $tutorialCategories->links() }}
            </div>
        @endif
    </div>
        
    @else
        <p>There is no article yet!</p>
    @endif
@endsection