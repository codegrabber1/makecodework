@extends(env("THEME").'.layouts.main')
@section('sidebar')
    @include(env('THEME').'.inner-sidebar')
@endsection
@section('content')
    <section class="bg-white shadow-sm px-4 ml-6">
    <div class="py-3 divide-y divide-y-reverse divide-gray-400">
        <h1 class="text-3xl">{{ $blogPost->bc_title }}</h1>

        <div class="meta flex pb-4 ">
            <ol class="flex divide-x divide-gray-400">

                <li class="text-gray-500 text-sm mx-1"><strong>Author:</strong> {{ $blogPost->user->name }}</li>
                <li class="text-gray-500 text-sm mx-1 pl-2"><strong>Published:</strong>
                    {{ \Carbon\Carbon::parse($blogPost->created_at )->locale('uk')->isoFormat('D MMMM Y') }} </li>
                <li class="text-gray-500 text-sm mx-1 pl-2"><strong>Updated:</strong>
                    {{ \Carbon\Carbon::parse($blogPost->updated_at )->locale('uk')->isoFormat('D MMMM Y') }} </li>
                <li class="text-gray-500 text-sm mx-1 pl-2">
                    @if(count($blogPost->comments) == 0)
                        <p>No comments</p>
                    @else
                        <strong><i class="far fa-comments"></i> </strong> {{ count($blogPost->comments) }}
                    @endif
                </li>
            </ol>
        </div>

    </div>
    <img class="mx-auto" src="{{ asset(env('THEME')).'/images/blog/'.$blogPost->bc_image }}" alt="{{ $blogPost->bc_title }}">
    <div class="leading-8 my-4 px-10 text-lg">{!! $blogPost->bc_text !!}</div>

    {{-- Comments --}}
    <div id="comments" class="border-t-4 mt-3">
        <div class="wrap_result"></div>
        <h3 class="title slim">
            @if(count($blogPost->comments) == 0)
                <p>No comments</p>
            @else
                <strong>Comments: </strong> {{ count($blogPost->comments) }}

           @endif
        </h3>
        @php($com = $blogPost->comments->groupBy('parent_id') )

        <ul class="commentlist bg-grey mx-auto">
              @foreach($com as $k => $comments)
                 @if($k !== 0)
                     
                     @break
                 @endif
                 @include(env('THEME').'.blog.comment', ['comments'=> $comments])
              @endforeach
            
          </ul>

    </div>

    {{--Coment form--}}
    <div id="respond" class="w-3/4 mx-auto border border-green-200 overflow-hidden">
        <h3 class="title slim">Leave a Reaply
            <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Cancel reply</a></small></h3>
        <form action="{{ route('comment.store') }}" method="post" id="commentform" class="comments-form">
            @csrf
            @if(!Auth::check())

                <div class="flex justify-between">
                    <div class="w-full mr-1">
                        <label>Name: <span class="required text-red-500">*</span></label>
                        <input class="form-control border p-1 w-full" name="author_name" type="text">
                    </div>
                    <div class="w-full ml-1">
                        <label>Email Adress: <span class="required text-red-500">*</span></label>
                        <input class="form-control border p-1 w-full" name="author_email" type="email">
                    </div>
                </div>
            @endif
            <label>Comment: </label>
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
                <input type="hidden" id="comment_post_ID" name="comment_post_ID" value="{{ $blogPost->id }}">
                <input type="hidden" id="comment_parent" name="comment_parent" value="0">
                <input type="submit" id="submitComment" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right" value="Submit">
            </div>
        </form>
    </div>
    </section>
@endsection

