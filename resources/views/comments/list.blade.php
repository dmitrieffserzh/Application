<div class="comments pt-3 px-3">
    <h5>Комментарии {{$post->comments->count()}}</h5>

    @php
        if($post){
            $comments = $post->comments;
            $comments_list = $comments->groupBy('parent_id');
        } else $comments_list = null;
    @endphp
    <div class="list mt-4">
    @if($comments_list)
         @foreach($comments_list as $k => $comments)
            @if($k)
                @break
            @endif
            @include('comments.partials.item',['items'=>$comments])
        @endforeach
    @else
        <div class="alert">
            <p>Нет комментариев!</p>
        </div>
    @endif

    </div>

</div>