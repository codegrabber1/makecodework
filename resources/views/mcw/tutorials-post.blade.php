@extends(env('THEME').'.layouts.main')
@section('content')
    <ul class="flex flex-row">
        <li class="mr-6"><a href="{{ route("index") }}">Home</a></li>
        @foreach($tutorialCategories as $item)
            <li class="mr-6"><a href="{{ route('tutorials.category', $item->id) }}">{{ $item->th_cat_name  }}</a></li>
        @endforeach
    </ul>
    <hr>
    <h2>{{ $getPost->p_title }}</h2>
    <img class="w-1/2" src="{{ asset(env('THEME')).'/images/themes/'.$getPost->p_image }}" alt="{{ $getPost->p_title }}">
    <p>{!! $getPost->p_text !!}</p>
@endsection