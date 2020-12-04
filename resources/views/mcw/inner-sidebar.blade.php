<aside class="w-1/3  ">
     <div class="sticky top-0">
         <div class="flex p-4 border border-b_color bg-white w-full mx-auto m-4 shadow-sm">
             {{--<h3 class="mr-1">Соцмережі: </h3>--}}
             <ul class="flex justify-between">
                 <li><a class="block bg-blue-200 px-2 py-1 mr-3" href="#"><i class="fab fa-facebook-f"></i></a></li>
                 <li><a class="block bg-blue-200 px-2 py-1 mr-3" href="#"><i class="fab fa-twitter"></i></a></li>
                 <li><a class="block bg-blue-200 px-2 py-1 mr-3" href="#"><i class="fab fa-pinterest-p"></i></a></li>
                 <li><a class="block bg-blue-200 px-2 py-1 mr-3" href="#"><i class="fab fa-youtube"></i></a></li>

             </ul>
         </div>

         <div class="w-full search border border-b_color m-4 mx-auto shadow-sm">
             <form action="{{ route('search') }}" method="get">
                 <input class="w-full p-2 rounded outline-none" type="text" name="s" placeholder="search" required>
             </form>
         </div>

    <nav class="w-full ">
        <div class="navBlock shadow-sm">
            <div class="titleBlock bg-background_sidebar w-full overflow-hidden">
                <h2 class="navBlockHeader shadow-r_s bg-white float-left py-2 px-3 font-bold">Category</h2>
            </div>
            <ul class=" ">
                <li class=""><a href="{{ route("index") }}">Home</a></li>
                @foreach($tutorialCategories as $item)
                    <li class="">
                        <a class="" href="{{ route('tutorials.category', $item->id) }}">{{ $item->th_cat_name }}</a></li>
                @endforeach

            </ul>
        </div>
        <div class="logo my-5">
            <a href="{{ route("index") }}">
                <img src="{{ asset(env('THEME')).'/images/'. $settings->logo }}" alt="">
            </a>
        </div>
        <div class="navBlock shadow-sm">
            <div class="titleBlock bg-background_sidebar w-full overflow-hidden">
                <h2 class="navBlockHeader shadow-r_s bg-white float-left py-2 px-3 font-bold">Latest news</h2>
            </div>

            <ul class="topNavList ">
                <li class=""><a href="{{ route('blog') }}">All posts</a></li>
                @foreach($lastPosts as $item)
                    <li class="">
                        <a href="{{ route('blog.category.post', $item->id) }}">
                            {{--<img src="{{ asset(env('THEME')).'/images/blog/'.$item->bc_image }}" alt="{{ $item->bc_title }}">--}}
                            {{ $item->bc_title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
     </div>
</aside>