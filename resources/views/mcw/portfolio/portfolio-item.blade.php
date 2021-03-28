@extends(env('THEME').'.layouts.main')
@include(env('THEME') .'.includes.breadcrumbs')
@section('sidebar')
    @include(env('THEME').'.inner-sidebar')
@stop
@section('content')
    <section class="bg-white shadow-sm mr-6">
        <div class="w-full border-b border-dark mb-2 pb-3">
            <img class="block my-auto mx-auto" src="{{ asset(env('THEME'). '/images/portfolio/'. $item->img) }}" alt="{{
            $item->title
            }}">
        </div>
        <div class="w-full pb-4 px-4">
            @include(env('THEME') .'.includes.social')

            <div class="">
                <div class="w-full flex justify-between py-3 shadow align-center">
                    <div class="">{{ $item->title_task }}</div>
                    <div class="text-green-400 font-head font-semibold">
                        <a href="{{ $item->site_link }}" target="_blank">Visit Site</a>
                    </div>
                </div>
                {!! $item->task_description !!}
            </div>
        </div>
    </section>
@stop