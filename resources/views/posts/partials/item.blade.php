<article class="article">
    <header class="article-header">
        <div class="row">
            <div class="col-xs-12">
                <div class="component-user">
                    <div class="component-user__avatar">
                        <img src="{{ getImage('thumbnail', $post->owner->profile->avatar) }}"
                             alt="{{ $post->owner->nickname }}">
                        @if($post->owner->isOnline())
                            <span class="status status--online"></span>
                        @else
                            <span class="status status--offline"></span>
                        @endif
                    </div>
                    <a class="component-user__link" href="{{ route('users.profile', $post->owner->id) }}"
                       title="{{$post->owner->nickname}}" title="Посмотреть профиль {{ $post->owner->nickname }}">
                        <span class="component-user__name">{{ $post->owner->nickname }}</span>
                        <span class="component-user__date">{{ $post->created_at->diffForHumans() }}</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h2>{{ $post->title }}</h2>
            </div>
        </div>
    </header>
    <div class="article-content">{!! $post->content !!}</div>
    <footer class="article-footer">
        <div class="row">
            <div class="col-xs-12">
                <div class="component-like pull-right">
                    <div class="component-like__count">{{ $post->like()->count() }}</div>

                    @if (Auth::guest())
                        <a href="{{ route('login') }}" class="component-like__button like--noliked">
                            <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:svg="http://www.w3.org/2000/svg">
                                <path d="m9.93287,4.06894c0.79747,-1.91386 2.61926,-3.25113 4.73822,-3.25113c2.85439,0 4.91012,2.47246 5.16857,5.41908c0,0 0.1395,0.73145 -0.16756,2.04831c-0.4181,1.79342 -1.40092,3.38677 -2.72596,4.60279l-7.01327,6.3358l-6.89512,-6.3362c-1.32504,-1.21562 -2.30786,-2.80937 -2.72596,-4.60279c-0.30706,-1.31686 -0.16756,-2.04831 -0.16756,-2.04831c0.25845,-2.94662 2.31418,-5.41908 5.16857,-5.41908c2.11935,0 3.82258,1.33766 4.62006,3.25153l0.00001,0z"/>
                            </svg>
                        </a>
                    @else
                        <a href="#"
                           class="component-like__button like @if($post->liked)like--liked @else like--noliked @endif"
                           data-id="{{ $post->id }}" data-type="{{ $post->type }}">
                            <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:svg="http://www.w3.org/2000/svg">
                                <path d="m9.93287,4.06894c0.79747,-1.91386 2.61926,-3.25113 4.73822,-3.25113c2.85439,0 4.91012,2.47246 5.16857,5.41908c0,0 0.1395,0.73145 -0.16756,2.04831c-0.4181,1.79342 -1.40092,3.38677 -2.72596,4.60279l-7.01327,6.3358l-6.89512,-6.3362c-1.32504,-1.21562 -2.30786,-2.80937 -2.72596,-4.60279c-0.30706,-1.31686 -0.16756,-2.04831 -0.16756,-2.04831c0.25845,-2.94662 2.31418,-5.41908 5.16857,-5.41908c2.11935,0 3.82258,1.33766 4.62006,3.25153l0.00001,0z"/>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </footer>
</article>