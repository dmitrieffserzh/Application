<article class="article mb-3 pt-3 pb-3 bg-white rounded shadow">
    <header class="article-header">
        <div class="media pb-3 px-3 border-bottom border-gray lh-100">
               <span class="d-inline-block position-relative mr-2">
                   <img class="rounded-circle" style="width: 30px; height: 30px;"
                        src="{{ getImage('thumbnail', $post->owner->profile->avatar) }}"
                        alt="{{ $post->owner->nickname }}">
                   @if($post->owner->isOnline())
                       <span class="component-status component-status--online"></span>
                   @else
                       <span class="component-status component-status--offline"></span>
                   @endif
               </span>
            <div class="media-body">
                <a class="text-dark small font-weight-bold" href="{{ route('users.profile', $post->owner->id) }}"
                   title="{{ $post->owner->nickname }}">
                    {{ $post->owner->nickname }}
                </a>
                <span class="d-block text-muted small font-weight-light font-monospace">
                        {{ $post->created_at->diffForHumans() }}
                    </span>
            </div>
        </div>
        <h5 class="pt-3 px-3">
            <a href="{{ route('post.view', $post->id) }}">
                {{ $post->title }}
            </a>
        </h5>
    </header>
    <div class="article-content">
        {!! $post->content !!}
    </div>
    <footer class="article-footer pt-3 px-3 border-top border-gray lh-100">
        {{$post->count_view}}
        <div class="component-like d-block text-right">
            <div class="component-like__count d-inline-block">{{ $post->like()->count() }}</div>
            @if (Auth::guest())
                <a href="{{ route('login') }}" class="ajax-modal component-like__button d-inline-block like--noliked" data-name="Войти" data-url="{{ route('login') }}" data-modal-size="modal-sm">
                    <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                         xmlns:svg="http://www.w3.org/2000/svg">
                        <path d="m9.93287,4.06894c0.79747,-1.91386 2.61926,-3.25113 4.73822,-3.25113c2.85439,0 4.91012,2.47246 5.16857,5.41908c0,0 0.1395,0.73145 -0.16756,2.04831c-0.4181,1.79342 -1.40092,3.38677 -2.72596,4.60279l-7.01327,6.3358l-6.89512,-6.3362c-1.32504,-1.21562 -2.30786,-2.80937 -2.72596,-4.60279c-0.30706,-1.31686 -0.16756,-2.04831 -0.16756,-2.04831c0.25845,-2.94662 2.31418,-5.41908 5.16857,-5.41908c2.11935,0 3.82258,1.33766 4.62006,3.25153l0.00001,0z"/>
                    </svg>
                </a>
            @else
                <a href="#"
                   class="component-like__button d-inline-block like @if($post->liked)like--liked @else like--noliked @endif"
                   data-id="{{ $post->id }}" data-type="{{ $post->type }}">
                    <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                         xmlns:svg="http://www.w3.org/2000/svg">
                        <path d="m9.93287,4.06894c0.79747,-1.91386 2.61926,-3.25113 4.73822,-3.25113c2.85439,0 4.91012,2.47246 5.16857,5.41908c0,0 0.1395,0.73145 -0.16756,2.04831c-0.4181,1.79342 -1.40092,3.38677 -2.72596,4.60279l-7.01327,6.3358l-6.89512,-6.3362c-1.32504,-1.21562 -2.30786,-2.80937 -2.72596,-4.60279c-0.30706,-1.31686 -0.16756,-2.04831 -0.16756,-2.04831c0.25845,-2.94662 2.31418,-5.41908 5.16857,-5.41908c2.11935,0 3.82258,1.33766 4.62006,3.25153l0.00001,0z"/>
                    </svg>
                </a>
            @endif
        </div>
    </footer>
</article>