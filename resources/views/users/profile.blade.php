@push('custom-styles')
    {{--<link href="{{ asset('css/components/image-select-area.css') }}" rel="stylesheet">--}}
@endpush
@push('custom-scripts')
    {{--<script src="{{ asset('js/components/jq_crop.js') }}"></script>--}}
    <script src="{{ asset('js/components/image-uploader.js') }}"></script>
@endpush
@extends('layouts.app')
<style>
    .bg-profile {

        background: url('{{ getImage('cover', $user->profile->avatar) }}') no-repeat center center;
        background-size: cover;
        width: 100%;
        height: auto
    }
</style>
@section('content')
    <main id="content" class="col-md-8 mb-3 p-0 bg-white rounded shadow ow-h">
        <section class="section profile ow-h">
            <div class="profile-header">
                <div class="media pb-3 px-3 border-bottom border-gray lh-100  bg-profile">
                    <span class="d-inline-block position-relative my-5 mx-3">
                       <img class="rounded-circle" style="width: 150px; height: 150px;"
                            src="{{ getImage('normal', $user->profile->avatar) }}"
                            alt="{{ $user->nickname }}">
                    </span>
                    <div class="media-body align-self-center">
                        <h4 class="text-white">
                            {{ $user->nickname }}
                        </h4>

                        @if($user->isOnline())
                            <span class="d-block text-light small lh-125 font-weight-light font-monospace">
                                онлайн
                            </span>
                        @else
                            <span class="d-block text-light small lh-125 font-weight-light font-monospace">
                                {{ getOnlineTime($user->profile->sex, $user->profile->offline_at->diffForHumans()) }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </section>


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



            {{--<h4>{{$user->nickname}}</h4>--}}
            {{--@if($user->isOnline())--}}
                {{--<span class="online"></span>--}}
            {{--@else--}}
                {{--<span class="offline"></span>--}}
                {{--{{ getOnlineTime($user->profile->sex, $user->profile->offline_at->diffForHumans()) }}--}}
            {{--@endif--}}

            {{--@if ($user->id == Auth::id())--}}
                {{--<a href="{{ route('users.profile.edit', $user->id) }}" title="Изменить профиль"--}}
                   {{--class="pull-right">--}}
                    {{--Изменить профиль--}}
                {{--</a>--}}
            {{--@endif--}}


        <div class="p-3 border-top border-gray">фамилия: {{$user->profile->surname}}</div>
        <div class="p-3 border-top border-gray">Пол: {{ getSex($user->profile->sex) }}</div>
        <div class="p-3 border-top border-gray">Город: {{$user->profile->city}}</div>
        <div class="p-3 border-top border-gray">Телефон: {{$user->profile->phone}}</div>
        <div class="p-3 border-top border-gray">Обомне: {{$user->profile->about_user}}</div>
        <div class="p-3 border-top border-gray">Зарегистрирован: {{ $user->profile->created_at->diffForHumans() }}</div>


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