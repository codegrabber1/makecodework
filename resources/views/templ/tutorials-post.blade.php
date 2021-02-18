@extends(env('THEME').'.layouts.main')
{{--@section('sidebar')--}}
    {{--@include(env('THEME').'.inner-sidebar')--}}
{{--@endsection--}}
@section('content')
    <section class="bg-white shadow-sm px-4 mr-6">
   
    <div class="py-3 divide-y divide-y-reverse divide-gray-400">
        <h1 class="text-2xl font-head">{{ $getPost->p_title }}</h1>

        <div class="meta flex pb-4 ">
            <ol class="flex divide-x divide-gray-400">

                <li class="text-gray-500 text-sm mx-1"><strong>Author:</strong> {{ $getPost->user->name }}</li>
                <li class="text-gray-500 text-sm mx-1 pl-2"><strong>Published:</strong>
                    {{ \Carbon\Carbon::parse($getPost->created_at )->locale('uk')->isoFormat('D MMMM Y') }} </li>
                <li class="text-gray-500 text-sm mx-1 pl-2"><strong>Updated:</strong>
                    {{ \Carbon\Carbon::parse($getPost->updated_at )->locale('uk')->isoFormat('D MMMM Y') }} </li>
                <li class="text-gray-500 mx-1 pl-2">
                    @if(count($getPost->comments) == 0)
                        <p>No comments</p>
                        @else
                        <strong><i class="far fa-comments"></i> </strong> {{ count($getPost->comments) }}
                    @endif
                </li>
            </ol>
        </div>

    </div>

    <img class="mx-auto" src="{{ asset(env('THEME')).'/images/themes/'.$getPost->p_image }}" alt="{{ $getPost->p_title }}">
    <div class="leading-8 my-4 px-5 text-base">{!! $getPost->p_text !!}</div>
    </section>
    <section class="mr-6">
    <div id="comments" class="border-t-4 mt-3 shadow">
        <div class="wrap_result"></div>
        <h3 class="title slim font-head">
            @if(count($getPost->comments) == 0)
                <div class="p-2 bg-white mb-2"><p>No comments</p></div>
            @else
                <strong>Comments: </strong> {{ count($getPost->comments) }}
            @endif
        </h3>
       
        @php($com = $getPost->comments->groupBy('parent_id') )

        <ul class="commentlist bg-grey mx-auto">
            @foreach($com as $k => $comments)
                @if($k !== 0)
                    @break
                @endif
                @include(env('THEME').'.comment', ['comments'=> $comments])
            @endforeach
        </ul>

    </div>


    <div id="respond" class="overflow-hidden bg-white py-3 shadow">
        <h3 class="title slim w-3/4 mx-auto my-3">Leave a Reaply
            <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Cancel reply</a></small></h3>
        <form action="{{ route('tutorial.comment.store') }}" method="post" id="commentform" class="comments-form w-5/6 mx-auto">
            @csrf
            @if(!Auth::check())
                <div class="flex justify-between my-3">
                    <div class="w-full mr-1">
                        <label class="block mb-3">Name: <span class="required text-red-500">*</span></label>
                        <input class="form-control border p-1 w-full" name="author_name" type="text">
                    </div>
                    <div class="w-full ml-1">
                        <label class="block mb-3">Email Adress: <span class="required text-red-500">*</span></label>
                        <input class="form-control border p-1 w-full" name="author_email" type="email">
                    </div>
                </div>
            @endif
            <label class="block mb-3">Comment: </label>
            <div class="row">
                <div class="comment-box">
                    <textarea class="form-control border w-full" rows="7" name="comment_text" ></textarea>
                    <i>Note: HTML is not translated!</i>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="button-set">
                <span class="required float-left text-red-500"><b>*</b> Required Field</span>
                <input type="hidden" name="moderated" id="moderated" value="0">
                <input type="hidden" id="comment_post_ID" name="comment_post_ID" value="{{ $getPost->id }}">
                <input type="hidden" id="comment_parent" name="comment_parent" value="0">
                <input type="submit" id="submitComment" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right" value="Submit">
            </div>
        </form>
    </div>
    </section>
@endsection