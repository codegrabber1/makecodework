<aside class="w-5/12">
     <div class="sticky top-0">
         <div class="logo my-5 p-10">
             <a href="{{ route("index") }}">
                 <img src="{{ asset(env('THEME')).'/images/'. $settings->logo }}" alt="">
             </a>
         </div>


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
    </nav>
         <div class="w-full search border border-b_color m-4 mx-auto shadow-sm">
             <form action="{{ route('search') }}" method="get">
                 <input class="w-full p-2 rounded outline-none" type="text" name="s" placeholder="search" required>
             </form>
         </div>
         <div class="hire_block border-solid border-green-500 border rounded bg-green-600 text-white uppercase font-bold text-center p-3">
             <a href=" {{ route('hireme.index') }}" class="">
                 You can hire me and I will thank you
             </a>

         </div>
         <div class="flex p-4 border border-b_color bg-white w-full mx-auto m-4 shadow-sm">
             <ul class="flex justify-between w-full">
                 <li class="w-1/4"><a class="block text-center  px-2 py-1" href="#"><i class="fab fa-facebook-f"></i></a></li>
                 <li class="w-1/4 ml-1"><a class="block text-center  px-2 py-1" href="#"><i class="fab fa-twitter"></i></a></li>
                 <li class="w-1/4 ml-1"><a class="block text-center  px-2 py-1" href="#"><i class="fab fa-pinterest-p"></i></a></li>
                 <li class="w-1/4 ml-1"><a class="block text-center  px-2 py-1" href="#"><i class="fab fa-youtube"></i></a></li>
                 <li class="w-1/4 ml-1"><a class="block text-center  px-2 py-1" href="#"><i class="fab fa-telegram-plane"></i></a></li>
                 <li class="w-1/4 ml-1"><a class="block text-center  px-2 py-1" href="#"><i class="fab fa-viber"></i></a></li>

             </ul>
         </div>
     </div>
</aside>