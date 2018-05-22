@push('custom-scripts')
    <script src="{{ asset('js/components/rating.js') }}"></script>
@endpush

@extends('layouts.app')

@section('content')

    <main id="content" class="col-md-8 mb-3 p-3 bg-white rounded shadow">
        <div class="row">
            <section class="section col p-0">
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
                <div class="col">
                <div class="float-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('posts.index') }}"> Назад</a>
                </div>
                <h1 class="h5 mt-4 mb-3">{{ $post->title}}</h1>

                {!! $post->content !!}

                    <span class="fload-left component-like__count mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                        {{$post->comments->count()}}</span>
                    <span class="fload-left component-like__count">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>

                        {{$post->count_view}}</span>

                </div>
            </section>
        </div>
        <div class="row">
            <section class="section col p-0 mt-4 border-top border-gray">
                @include('comments.list')
            </section>
        </div>
    </main>

@endsection

@section('aside')
    <aside class="col-md-4">
        <ul>
            <li><a href="{{ route('users.list') }}">Пользователи</a></li>
            <li><a href="{{ route('posts.index') }}">Посты</a></li>

            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ route('login') }}" class="ajax-modal main-menu__link" data-toggle="modal" data-url="{{ route('login') }}" data-name="Войти" data-modal-size="modal-sm">Войти</a></li>
                <li><a href="{{ route('register') }}">Регистрация</a></li>
            @else
                <li>
                    <a href="{{ route('users.profile', Auth::id()) }}">
                        {{ Auth::user()->nickname }}
                    </a>

                </li>

                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                        Выйти
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>

            @endif
        </ul>
    </aside>
@endsection