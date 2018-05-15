@push('custom-scripts')

@endpush
@extends('layouts.app')

@section('content')

    <main id="content" class="col-md-8 mb-3 p-3 bg-white rounded shadow">

        <section class="section">

            <h4 class="border-bottom border-gray pb-2 mb-0">Пользователи</h4>
            <?php $count = count($users); ?>
            @forelse ($users as $user)

                @include('users.partials.item', ['post' => $user])

                @if(--$count > 0)

                @endif

            @empty

                <div class="alert">
                    <p>Нет записей!</p>
                </div>

            @endforelse
            <small class="d-block text-center mt-3">
                <button type="button" class="btn btn-primary btn-block">Загрузить еще</button>
            </small>
        </section>

    </main>

@endsection

@section('aside')
    <aside class="col-md-4">
        <ul>
            <li><a href="{{ route('users.list') }}">Пользователи</a></li>
            <li><a href="{{ route('posts.index') }}">Посты</a></li>

            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ route('login') }}">Войти</a></li>
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