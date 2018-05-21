{{--<div class="media py-3 border-bottom border-gray">--}}
{{--<span class="d-inline-block position-relative mr-2">--}}
{{--<img class="rounded-circle" style="width: 30px; height: 30px;" src="{{ getImage('thumbnail', $comment->author->profile->avatar) }}" alt="{{ $comment->author->nickname }}">--}}
{{--@if($comment->author->isOnline())--}}
{{--<span class="component-status component-status--online"></span>--}}
{{--@else--}}
{{--<span class="component-status component-status--offline"></span>--}}
{{--@endif--}}
{{--</span>--}}
{{--<div class="media-body">--}}
{{--<a class="text-dark small font-weight-bold lh-100" href="{{ route('users.profile', $comment->author->id) }}" title="{{ $comment->author->nickname }}">--}}
{{--{{ $comment->author->nickname }}--}}
{{--</a>--}}
{{--<span class="d-block text-muted small font-weight-light font-monospace lh-100">--}}
{{--{{ $comment->created_at->diffForHumans() }}--}}
{{--</span>--}}
{{--@if($comment->author->profile->name || $comment->author->profile->surname)--}}
{{--<span class="d-block text-secondary small lh-125">{{$comment->author->profile->name}} {{$comment->author->profile->surname}}</span>--}}
{{--@endif--}}
{{--<div class="comment-text">--}}
{{--{{$comment->content}}--}}
{{--</div>--}}


{{--@if(count($comment->children) > 0)--}}
{{--<div class="media py-3 border-top border-gray ml-2">--}}
{{--<span class="d-inline-block position-relative mr-2">--}}
{{--<img class="rounded-circle" style="width: 30px; height: 30px;" src="{{ getImage('thumbnail', $comment->author->profile->avatar) }}" alt="{{ $comment->author->nickname }}">--}}
{{--@if($comment->author->isOnline())--}}
{{--<span class="component-status component-status--online"></span>--}}
{{--@else--}}
{{--<span class="component-status component-status--offline"></span>--}}
{{--@endif--}}
{{--</span>--}}
{{--<div class="media-body">--}}
{{--<a class="text-dark small font-weight-bold lh-100" href="{{ route('users.profile', $comment->author->id) }}" title="{{ $comment->author->nickname }}">--}}
{{--{{ $comment->author->nickname }}--}}
{{--</a>--}}
{{--<span class="d-block text-muted small font-weight-light font-monospace lh-100">--}}
{{--{{ $comment->created_at->diffForHumans() }}--}}
{{--</span>--}}
{{--@if($comment->author->profile->name || $comment->author->profile->surname)--}}
{{--<span class="d-block text-secondary small lh-125">{{$comment->author->profile->name}} {{$comment->author->profile->surname}}</span>--}}
{{--@endif--}}
{{--<div class="comment-text">--}}
{{--{{$comment->content}}--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endif--}}





@foreach($items as $item)
    {{--print_r($item)--}}


    <div id="comment-{{$item->id}}" class="media lh-100">

    <span class="d-inline-block position-relative mr-2">
        <img class="rounded-circle" style="width: 30px; height: 30px;"
             src="{{ getImage('thumbnail', $item->author->profile->avatar) }}" alt="{{ $item->author->nickname }}">
        @if($item->author->isOnline())
            <span class="component-status component-status--online"></span>
        @else
            <span class="component-status component-status--offline"></span>
        @endif
    </span>
        <div class="media-body">
            <a class="text-dark small font-weight-bold lh-100" href="{{ route('users.profile', $item->author->id) }}"
               title="{{ $item->author->nickname }}">
                {{ $item->author->nickname }}
            </a>
            <span class="d-block text-muted small font-weight-light font-monospace lh-100">
        {{ $item->created_at->diffForHumans() }}
        </span>
            @if($item->author->profile->name || $item->author->profile->surname)
                <span class="d-block text-secondary small lh-125">{{$item->author->profile->name}} {{$item->author->profile->surname}}</span>
            @endif
            <div class="comment-text text-secondary small mt-2 mb-3 p-3 bg-light rounded lh-125">
                @if($item->deleted_at)
                    Комментарий удален!
                @else
                {{$item->content}}
                @endif
            </div>


            {{--<li id="li-comment-{{$item->id}}" class="comment">--}}
            {{--<div id="comment-{{$item->id}}" class="comment-container">--}}
            {{--<div class="comment-author vcard">--}}
            {{--<img alt="" src="https://www.gravatar.com/avatar/{{md5($item->email)}}?d=mm&s=75" class="avatar" height="75" width="75" />--}}
            {{--<cite class="fn">{{$item->name}}</cite>--}}
            {{--</div>--}}

            {{--<div class="comment-meta commentmetadata">--}}
            {{--<div class="intro">--}}
            {{--<div class="commentDate">--}}
            {{--{{ is_object($item->created_at) ? $item->created_at->format('d.m.Y в H:i') : ''}}--}}
            {{--</div>--}}

            {{--</div>--}}
            {{--<div class="comment-body">--}}
            {{--<p>{{ $item->text }}</p>--}}
            {{--</div>--}}
            {{--<div class="reply group">--}}
            {{--<a class="comment-reply-link" href="#respond" onclick="return addComment.moveForm(&quot;comment-{{$item->id}}&quot;, &quot;{{$item->id}}&quot;, &quot;respond&quot;, &quot;{{$item->article_id}}&quot;)">Ответить</a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}


            @if(isset($comments_list[$item->id]))

                @include('comments.partials.item',['items'=>$comments_list[$item->id]])

            @endif

        </div>
    </div>

@endforeach

