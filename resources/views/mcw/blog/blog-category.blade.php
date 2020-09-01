@extends(env('THEME').'.layouts.main')
@section('content')
    @foreach($allPosts as $item)
        <h2>{{ $item->bc_title }}</h2>
        <p>{{ $item->blog_category_id }}</p>
    @endforeach
@endsection