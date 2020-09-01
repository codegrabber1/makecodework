<aside class="w-1/3  ">
     <div class="sticky top-0">
         <div class="flex p-4 border border-b_color bg-white w-full mx-auto m-4 ">
             <h3 class="mr-1">Соцмережі: </h3>
             <ul class="flex justify-between">
                 <li><a class="block bg-blue-200 px-2 py-1 mr-3" href="#"><i class="fab fa-facebook-f"></i></a></li>
                 <li><a class="block bg-blue-200 px-2 py-1 mr-3" href="#"><i class="fab fa-twitter"></i></a></li>
                 <li><a class="block bg-blue-200 px-2 py-1 mr-3" href="#"><i class="fab fa-pinterest-p"></i></a></li>
                 <li><a class="block bg-blue-200 px-2 py-1 mr-3" href="#"><i class="fab fa-youtube"></i></a></li>

             </ul>
         </div>

         <div class="w-full search border border-b_color m-4 mx-auto">
             <input class="w-full p-2 rounded outline-none" type="text" name="search" value="search">
         </div>

    <nav class="w-full ">
        <div class="navBlock ">
            <div class="titleBlock bg-blue-500 w-full overflow-hidden">
                <h2 class="navBlockHeader bg-white float-left p-2 font-bold">Category</h2>
            </div>
            <ul class="topNavList ">
                <li class=""><a href="{{ route("index") }}">Home</a></li>
                @foreach($tutorialCategories as $item)
                    <li class="">
                        <a class="" href="{{ route('tutorials.category', $item->id) }}">{{ $item->th_cat_name }}</a></li>
                @endforeach

            </ul>
        </div>
        <div class="logo border border-green-600 my-5">
            <a href="{{ route("index") }}">Logo</a>
        </div>
        <div class="navBlock ">
            <div class="titleBlock bg-blue-500 w-full overflow-hidden">
                <h2 class="navBlockHeader bg-white float-left p-2 font-bold">Latest news</h2>
            </div>

            <ul class="topNavList ">
                <li class=""><a href="{{ route('blog') }}">All posts</a></li>
                @foreach($lastPosts as $item)
                    <li class="">
                        <a href="{{ route('blog.category.post', $item->id) }}">
                            <img src="{{ asset(env('THEME')).'/images/blog/'.$item->bc_image }}" alt="{{ $item->bc_title }}">
                            {{ $item->bc_title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
     </div>
</aside>