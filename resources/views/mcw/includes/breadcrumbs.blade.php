<div class="p-3 bg-white mb-6 uppercase shadow font-head font-semibold">
    <ul class="flex mx-10">
        <li class="mr-6"><a href="{{ route("index") }}">{{ trans('ua.Find more') }}: </a></li>
        @foreach($tutorialCategories as $item)
            <li class="mr-6"><a href="{{ route('tutorials.category', $item->id) }}">{{ $item->th_cat_name  }}</a></li>
        @endforeach

    </ul>
</div>