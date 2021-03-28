@extends(env('THEME').'.layouts.main')

{{--@section('sidebar')--}}
    {{--@include(env('THEME').'.inner-sidebar')--}}
{{--@endsection--}}
@section('content')
    <div class="grid gap-3 grid-cols-1 mr-6">
        @foreach($allPosts as $post)
            <div class="flex flex-wrap bg-white shadow-sm ">
                <img class="sm:w-full md:w-2/5 lg:w-2/5" src="{{ asset(env('THEME')).'/images/themes/'.$post->p_image }}" alt="{{ $post->p_title }}">
                <div class="m-3 flex-1">
                    <h1 class="uppercase font-head py-3 text-2xl"><a href="{{ route('tutorials.category.post', $post->id) }}">{{ $post->p_title }}</a></h1>
                    <p class="leading-5 my-3">{!! $post->p_excerpt !!}</p>
                    <div class=" p-2 flex justify-between my-3  ">
                        <p class="text-gray-600 text-sm " ><strong>Author:</strong> {{ $post->user->name }}</p>
                        <p class="text-gray-600 text-sm"><strong>Published:</strong>
                            {{ \Carbon\Carbon::parse($post->created_at )->locale('uk')->isoFormat('D MMMM Y') }} </p>
                        <p class="text-gray-600 text-sm"><strong><i class="far fa-comments"></i> </strong> {{ count($post->comments) }} </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @if($allPosts->total() > $allPosts->count())
        <div class="container ml-6 grid-cols-1">
            {{ $allPosts->links() }}
        </div>
    @endif
@endsection