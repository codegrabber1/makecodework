<li id="li-comment-{{ $data['id'] }}" class="lightComment">
    <div id="comment-{{ $data['id'] }}">
        <img class="avatar" width="110" height="110" src="https://en.gravatar.com/avatar/{{ $data['hash'] }}?d=mm&s=110" alt="{{ $data['author_name']  }}">
        <div class="meta">
            <span>{{ $data['author_name']  }}</span>,
            <span class="time">{{ \Carbon\Carbon::parse($data['created_at'] )->locale('uk')->isoFormat('dd MM Y') }}</span>
        </div>
        <p class="description bg-red-300">
            {!! $data['comment_text'] !!}
        </p>
    </div>

</li>