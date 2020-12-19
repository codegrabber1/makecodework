@extends(env('THEME').'.layouts.main')
@section('content')
    @foreach($allPosts as $item)
        <h2 class="font-head text-2xl">{{ $item->bc_title }}</h2>
        <p>{{ $item->blog_category_id }}</p>
    @endforeach
@endsection