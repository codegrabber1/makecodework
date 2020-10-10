<aside class="w-1/3   ">
    <div class="sticky top-0">
    {{--<div class="flex p-4 border border-b_color bg-white w-full mx-auto m-4 ">--}}
        {{--<h3 class="mr-1">Соцмережі: </h3>--}}
        {{--<ul class="flex flex-row justify-center">--}}
            {{--<li><a class="block bg-blue-200 px-2 py-1 mr-3" href="#"><i class="fab fa-facebook-f"></i></a></li>--}}
            {{--<li><a class="block bg-blue-200 px-2 py-1 mr-3" href="#"><i class="fab fa-twitter"></i></a></li>--}}
            {{--<li><a class="block bg-blue-200 px-2 py-1 mr-3" href="#"><i class="fab fa-pinterest-p"></i></a></li>--}}
            {{--<li><a class="block bg-red-500 px-2 py-1 mr-3" href="#"><i class="fab fa-youtube"></i></a></li>--}}

        {{--</ul>--}}
    {{--</div>--}}

    <div class="w-full search border border-b_color m-4 mx-auto">
        <input class="w-full p-1 rounded outline-none" type="text" name="search" value="search">
    </div>

    <nav class="w-full ">
        <div class="navBlock ">
            <div class="titleBlock bg-green-400 w-full overflow-hidden">
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
            <div class="titleBlock bg-green-400 w-full overflow-hidden">
                <h2 class="navBlockHeader bg-white float-left p-2 font-bold">Facebook Page</h2>
            </div>

            <div>
                <div class="fb-page" data-href="https://www.facebook.com/designdevelop.sites" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/designdevelop.sites" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/designdevelop.sites">Makecodework</a></blockquote></div>
            </div>
        </div>
    </nav>
    </div>
</aside>