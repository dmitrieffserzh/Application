@forelse ($posts as $post)
    <div class="post">
        <?php //print_r($post->owner->name); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <a href="{{ route('users.profile', $post->owner->id) }}" title="{{$post->owner->nickname}}">
                    <img src="{{$post->owner->profile->avatar}}" alt="{{$post->owner->nickname}}" class="avatar">
                    {{$post->owner->nickname}}
                    </a>
                    @if($post->owner->isOnline())
                        <span class="online"></span>
                    @else
                        <span class="offline"></span>
                    @endif
                </div>
                <div class="col-md-6 text-right">menu</div>
            </div>
        </div>
        <hr>
        <h3>{{ $post->title }}</h3>
        <div>{!! $post->content !!}</div>


        <div class="col-md-12">
            <div class="row">
                <hr>
                <div class="col-md-6">
                    <span class="count">{{ $post->like()->count() }}</span>
                    <button class="like" data-id="{{$post->id}}" data-type="{{$post->type}}"
                            @if($post->liked)style="color: #ff2b78;"@endif>
                        <i class="glyphicon glyphicon-heart" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="col-md-6 text-right">{{ $post->created_at->diffForHumans() }}</div>
            </div>
        </div>
    </div>
@empty
    <p>Нет записей!</p>
@endforelse