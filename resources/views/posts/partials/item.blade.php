@forelse ($posts as $post)
    <div class="post">
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