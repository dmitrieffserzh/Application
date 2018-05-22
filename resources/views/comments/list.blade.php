<div class="comments pt-3 px-3">


    <h5>Комментарии <span class="badge badge-secondary">{{$post->comments->count()}}</span></h5>
    @php
        if($post){
            $comments = $post->comments;
            $comments_list = $comments->groupBy('parent_id');
        } else {
            $comments_list = NULL;
        };
    @endphp
    <div class="list mt-4">
    @if($comments_list)
         @foreach($comments_list as $k => $comments)
            @if($k)
                @break
            @endif
            @include('comments.partials.item',['items'=>$comments])
        @endforeach

        @include('comments.partials.form_add')

    @else
        <div class="alert">
            Нет комментариев! Но ваш может быть первым! :)
        </div>
    @endif
    </div>
</div>