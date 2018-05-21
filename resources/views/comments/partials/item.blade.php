@foreach($items as $item)
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
            <a class="text-dark small font-weight-bold mr-2 lh-100" href="{{ route('users.profile', $item->author->id) }}"
               title="{{ $item->author->nickname }}">
                {{ $item->author->nickname }}
            </a>
            <span class="text-muted small font-weight-light font-monospace lh-100">
        {{ $item->created_at->diffForHumans() }}
        </span>
            @if($item->author->profile->name || $item->author->profile->surname)
                <span class="d-block text-secondary small lh-125">{{$item->author->profile->name}} {{$item->author->profile->surname}}</span>
            @endif

                @if($item->deleted_at)
                <div class="alert alert-primary small mt-2 mb-3 p-3 bg-light rounded lh-125">
                    Недавно здесь был отличный комментарий, но его сперли!
                </div>
                @else
                <div class="comment-text text-secondary small mt-2 mb-3 pb-2 border-bottom border-gray rounded lh-125">
                    {{$item->content}}
                    <span class="d-block text-muted font-weight-light font-monospace mt-2">
                        <a href="#" class="">Ответить</a>
                    </span>
                </div>
                @endif

            @if(isset($comments_list[$item->id]))
                @include('comments.partials.item',['items'=>$comments_list[$item->id]])
            @endif
        </div>
    </div>
@endforeach
