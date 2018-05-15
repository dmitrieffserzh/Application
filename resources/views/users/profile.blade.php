@push('custom-styles')
    {{--<link href="{{ asset('css/components/image-select-area.css') }}" rel="stylesheet">--}}
@endpush
@push('custom-scripts')
    {{--<script src="{{ asset('js/components/jq_crop.js') }}"></script>--}}
    <script src="{{ asset('js/components/image-uploader.js') }}"></script>
@endpush
@extends('layouts.app')
<!--<div style="
        margin-top: -30px;
        background: url('{{ getImage('cover', $user->profile->avatar) }}') no-repeat center center;
        background-size: cover;
        width: 100%;
        height: 300px
        "></div>-->
@section('content')
    <main id="content" class="col-md-8 mb-3 p-3 bg-white rounded shadow">
        <section class="section">

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>

                <div class="col-md-4">
                    <strong>Original Image:</strong>
                    <br/>
                    <img src="/images/{{ Session::get('image') }}"/>
                </div>
                <div class="col-md-4">
                    <strong>Thumbnail Image:</strong>
                    <br/>
                    <img src="/thumbnail/{{ Session::get('image') }}"/>
                </div>

            @endif

			<?php //print_r($post->owner->name); ?>


            <div class="col-md-4">
                <img src="{{ getImage('thumbnail', $user->profile->avatar) }}" alt="{{$user->nickname}}"
                     class="rounded">
                @include('users.partials.image_form')
            </div>
            <div class="col-md-8">
                <h4>{{$user->nickname}}</h4>
                @if($user->isOnline())
                    <span class="online"></span>
                @else
                    <span class="offline"></span>
                    {{ getOnlineTime($user->profile->sex, $user->profile->offline_at->diffForHumans()) }}
                @endif

                @if ($user->id == Auth::id())
                    <a href="{{ route('users.profile.edit', $user->id) }}" title="Изменить профиль"
                       class="pull-right">
                        Изменить профиль
                    </a>
                @endif
            </div>

            <hr>
            <div>Ава: {{$user->profile->avatar}}</div>
            <hr>
            <div>Имя: {{$user->profile->name}}</div>
            <hr>
            <div>фамилия: {{$user->profile->surname}}</div>
            <hr>
            <div>Пол: {{ getSex($user->profile->sex) }}</div>
            <hr>
            <div>Город: {{$user->profile->city}}</div>
            <hr>
            <div>Телефон: {{$user->profile->phone}}</div>
            <hr>
            <div>Обомне: {{$user->profile->about_user}}</div>
            <hr>
            <div>Зарегистрирован: {{ $user->profile->created_at->diffForHumans() }}</div>


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

<script>

    var jcrop_api;

    jQuery(function ($) {
        var width = jQuery('#target').prop('naturalWidth');
        var height = jQuery('#target').prop('naturalHeight');

        jQuery('#target').Jcrop({
            aspectRatio: 1,
            onSelect: showPreview,
            onChange: showPreview,
            //setSelect: [ 100, 100, 200, 200 ],

            trueSize: [width, height],
            boxWidth: width,
            allowResize: true,
            minSize: [300, 300]
        });


        var $preview = $('#preview');
        // Our simple event handler, called from onChange and onSelect
        // event handlers, as per the Jcrop invocation above
        function showPreview(coords) {
            if (parseInt(coords.w) > 0) {
                var rx = 100 / coords.w;
                var ry = 100 / coords.h;

                $preview.css({
                    width: Math.round(rx * 500) + 'px',
                    height: Math.round(ry * 370) + 'px',
                    marginLeft: '-' + Math.round(rx * coords.x) + 'px',
                    marginTop: '-' + Math.round(ry * coords.y) + 'px'
                }).show();
            }
        }

    });
</script>