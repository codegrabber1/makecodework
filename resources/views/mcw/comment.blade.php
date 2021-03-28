@foreach($comments as $comment)
    <li id="li-comment-{{ $comment->id }}" class="my-1 py-3">
        <div id="comment-{{ $comment->id }}" class="flex">
            <div class="avatar_block mr-3">
                @php($hash=isset($comment->author_email) ? md5($comment->author_email) : md5($comment->user->email))
                <img class="avatar"width="110" height="100" src="https://en.gravatar.com/avatar/{{ $hash }}?d=mm&s=110" alt="">
            </div>
             <div class="comment_block w-full mx-auto">
                <div class="meta border">
                    <span>{{ isset($comment->user_id) ? $comment->user->name : $comment->author_name  }}</span>,
                    <span class="time">{{ \Carbon\Carbon::parse($getPost->created_at )->locale('uk')->isoFormat('dddd, D MMM Y, H:m:s') }}</span>
                    <span class="reply float-right border block"><a class="comment-reply-link" href="#respond" onclick="return addComment.moveForm('comment-{{$comment->id}}','{{$comment->id}}','respond', '{{$comment->theme_post_id}}')">reply</a></span>
                </div>
                <p class="description mt-4">
                    {{ $comment->comment_text }}
                </p>
            </div>
        </div>
        @if(isset($com[$comment->id]))
            <ul class="commentChild ml-8">
                @include(env('THEME').'.comment', ['comments'=>$com[$comment->id]])
            </ul>
        @endif
    </li>
@endforeach