<div class="col-md-12">
    <div class="row">
        <div class="content-users-item">
            <div class="content-users-item__avatar">
                <img src="{{ getImage('thumbnail', $user->profile->avatar) }}" alt="{{ $user->name }}">
                @if($user->isOnline())
                    <span class="status status--online"></span>
                @else
                    <span class="status status--offline"></span>
                @endif
            </div>
            <a class="content-users-item__link" href="{{ route('users.profile', $user->id) }}"
               title="{{ $user->nickname }}">
                {{ $user->nickname }}
            </a>
            @if($user->profile->name || $user->profile->surname)
            <!-- <div class="content-users-item__info">{{$user->profile->name}} {{$user->profile->surname}} </div>-->
            @endif
            @if($user->profile->city)
                <div class="content-users-item__info">{{ $user->profile->city }}</div>
            @endif
            @if(!$user->isOnline())
                <div class="content-users-item__info">
                    {{ $user->profile->offline_at->diffForHumans() }}
                </div>
            @endif
            {{--<div class="content-users-item__info">--}}
                {{--Зарегистрирован: {{ $user->profile->created_at->diffForHumans() }}--}}
            {{--</div>--}}
        </div>
    </div>
</div>