@push('custom-scripts')

@endpush
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div id="content" class="col-md-8">
                <div class="post">


                    <?php //print_r($post->owner->name); ?>

                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{$user->profile->avatar}}" alt="{{$user->nickname}}" class="avatar_big">
                        </div>
                        <div class="col-md-8">
                            <h4>{{$user->nickname}}</h4>
                            @if($user->isOnline())
                                <span class="online"></span>
                            @else
                                <span class="offline"></span>
                            @endif
                            <a href="{{ route('users.profile.edit', $user->id) }}" title="Изменить профиль"
                               class="pull-right">
                                Изменить профиль
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div>Ава: {{$user->profile->avatar}}</div>
                    <hr>
                    <div>Имя: {{$user->profile->name}}</div>
                    <hr>
                    <div>фамилия: {{$user->profile->surname}}</div>
                    <hr>
                    <div>Город: {{$user->profile->city}}</div>
                    <hr>
                    <div>Телефон: {{$user->profile->phone}}</div>
                    <hr>
                    <div>Обомне: {{$user->profile->about_user}}</div>
                    <hr>
                    <div>Зарегистрирован: {{ $user->profile->created_at->diffForHumans() }}</div>


                </div>
            </div>
        </div>
    </div>
@endsection