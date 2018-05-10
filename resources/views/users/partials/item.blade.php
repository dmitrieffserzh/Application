<div class="post">
    <?php $count = count($users); ?>
    @forelse ($users as $user)

        <?php //print_r($post->owner->name); ?>

        <div class="row">
            <div class="col-md-12">
                @if($user->isOnline())
                    <span class="online"></span>
                @else
                    <span class="offline"></span>
                @endif


                <img src="{{ getImage('thumbnail', $user->profile->avatar) }}" alt="{{$user->name}}" class="avatar">

                <a href="{{ route('users.profile', $user->id) }}" title="{{$user->nickname}}">
                    {{$user->nickname}}
                </a>
            </div>

        </div>
        @if(--$count > 0)
                <hr>
            @endif

    @empty
        <p>Нет пользователей!</p>
    @endforelse
</div>