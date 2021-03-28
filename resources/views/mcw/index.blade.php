@extends(env('THEME').'.layouts.main')
@section('main-block')
    <div class="w-full bg-background_main_block p-3 flex flex-row justify-between h-screen relative items-center z-10">
        <div class="absolute left-0 top-1/2">
            first block
        </div>
        <div class="absolute right-0 top-0 bg-black w-2/4">
            profile
        </div>
        <div class="container">
            <div class="row">
                hello
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section class="shadow my-6 " >
        <h2 class="p-3 bg-white mb-6 uppercase font-head font-semibold shadow-sm">
            {{ trans('ua.Search all tutorials') }}
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 row-gap-6 gap-6 ">
        @foreach($themes as $theme)
            <div class="shadow bg-white grid grid-cols-1 row-gap-1 gap-1">
                <a class="" href="{{ route('tutorials', $theme->id) }}" title="{{ $theme->theme_name }}">
                    <img class="object-contain w-full outline-none" src="{{ asset(env('THEME')).'/images/themes/'. $theme->theme_image }}" alt="{{ $theme->theme_name }}">
                </a>
                <div class="grid grid-cols-2 text-gray-500 py-2">
                    <div class="name font-semibold w-full capitalize px-2 ">
                        {{ $theme->theme_name }}
                    </div>
                    <div class="px-2">
                        <p class="float-right">
                            <i class="far fa-newspaper"></i>
                            {{ count($theme->themeCategory) }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
        </div>  
    </section>
    <section class="py-5 border-2 border-blue-500 bg-gray-100">
       <div class="flex mx-3">
           
           <div>
               <a href="">{{ trans('ua.Hire me') }}</a>
           </div>
       </div>
    </section>
    <section class="my-6 py-2">
        <div class="g-menu p-4 uppercase bg-white mb-6 uppercase shadow font-head font-semibold">{{ trans('ua.Our work')
        }}</div>
        <div class="owl-carousel main-carousel relative">
            @foreach( $portfolioImages as $image)
                <div class="pb-1 ">
                    <img src="{{ asset(env('THEME').'/images/portfolio/'.$image->img)  }}" alt="{{$image->title }}" >
                    <div class="overlay hidden absolute inset-0 border-2 border-fuchsia-600 bg-black
                    bg-opacity-50 justify-content-center">
                        <a class="text-white text-xl uppercase" href="{{ route('portfolio.item',
                    $image->id) }}">
                            {{ trans('ua.detail') }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
     <section class="my-6">
        <h2 class="p-3 bg-white mb-6 uppercase shadow font-head font-semibold">
            {{ trans('ua.Latest news from blog') }} <span class="float-right capitalize text-green-400 font-head">
                <a href="{{ route('blog') }}">{{ trans('ua.All news') }}</a></span></h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 row-gap-3 gap-6">
            @foreach($lastPosts as $item)
                <div class="bg-white shadow-xl border pb-3 ">
                    <a href="{{ route('blog.category.post', $item->id) }}">
                        <img src="{{ asset(env('THEME')).'/images/blog/'.$item->bc_image }}" alt="{{ $item->bc_title }}">
                        <p class="py-2 px-4 font-semibold text-2xl font-head">{!! $item->bc_title !!}</p>
                    </a>
                    <div class="px-4 mb-1">{!! $item->bc_excerpt !!}</div>
                </div>
            @endforeach
        </div>
    </section>
@stop