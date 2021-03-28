<aside class="w-5/12">
     <div class="sticky top-0">
         @include(env('THEME').'.includes.logo')

        {{--<nav class="w-full ">--}}
        {{--<div class="navBlock shadow-sm">--}}
            {{--<div class="titleBlock bg-background_sidebar w-full overflow-hidden">--}}
                {{--<h2 class="navBlockHeader shadow-r_s bg-white float-left py-2 px-3 font-bold">Category</h2>--}}
            {{--</div>--}}
            {{--<ul class=" ">--}}
                {{--<li class=""><a href="{{ route("index") }}">Home</a></li>--}}
                {{--@foreach($tutorialCategories as $item)--}}
                    {{--<li class="">--}}
                        {{--<a class="" href="{{ route('tutorials.category', $item->id) }}">{{ $item->th_cat_name }}</a></li>--}}
                {{--@endforeach--}}

            {{--</ul>--}}
        {{--</div>--}}
        {{--<div class="navBlock shadow-sm">--}}
            {{--<div class="titleBlock bg-background_sidebar w-full overflow-hidden">--}}
                {{--<h2 class="navBlockHeader shadow-r_s bg-white float-left py-2 px-3 font-bold">Latest news</h2>--}}
            {{--</div>--}}

            {{--<ul class="topNavList  ">--}}
                {{--<li class=""><a href="{{ route('blog') }}">All posts</a></li>--}}
                {{--@foreach($lastPosts as $item)--}}
                    {{--<li class="flex flex-row">--}}
                        {{--<a class="block w-1/2" href="{{ route('blog.category.post', $item->id) }}">--}}
                            {{--<img  src="{{ asset(env('THEME')).'/images/blog/'.$item->bc_image }}" alt="{{ $item->bc_title }}">--}}
                        {{--</a>--}}
                        {{--<div class="w-1/2 font-head">--}}
                            {{--<a class="text-lg" href="{{ route('blog.category.post', $item->id) }}">--}}
                                {{--{{ $item->bc_title }}--}}
                            {{--</a>--}}
                            {{--<p class="text-gray-500 text-sm mx-1 pl-2">--}}
                                 {{--Category: {!! $item->category->bc_name !!}--}}
                            {{--</p>--}}
                            {{--<p class="text-gray-500 text-sm mx-1 pl-2">--}}
                                {{--@if(count($item->comments) == 0)--}}
                                    {{--<span class="text-gray-500">No comments</span>--}}
                                {{--@else--}}
                                    {{--Comments: &nbsp;<strong><i class="far fa-comments"></i> </strong> {{ count($item->comments) }}--}}
                                {{--@endif--}}
                            {{--</p>--}}
                        {{--</div>--}}

                    {{--</li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</nav>--}}
     @include(env('THEME').'.includes.search')
     <div class="hire_block border-solid border-green-500 border rounded bg-green-600 text-white  font-bold text-center p-3">
         <a href=" {{ route('hireme.index') }}" class="">
             {{ trans('ua.You can hire me and I will thank you') }}
         </a>

     </div>
         @include(env('THEME').'.includes.social')
     </div>
</aside>