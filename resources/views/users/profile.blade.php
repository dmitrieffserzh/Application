@push('custom-styles')
    <link href="{{ asset('css/components/image-select-area.css') }}" rel="stylesheet">
@endpush
@push('custom-scripts')
    <script src="{{ asset('js/components/jq_crop.js') }}"></script>
    <script src="{{ asset('js/components/image-uploader.js') }}"></script>
@endpush
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div id="content" class="col-md-8">
                <div class="post">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <strong>Original Image:</strong>
                                <br/>
                                <img src="/images/{{ Session::get('imageName') }}" />
                            </div>
                            <div class="col-md-4">
                                <strong>Thumbnail Image:</strong>
                                <br/>
                                <img src="/thumbnail/{{ Session::get('imageName') }}" />
                            </div>
                        </div>
                    @endif

                    <?php //print_r($post->owner->name); ?>

                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ getImage('normal', $user->profile->avatar) }}" alt="{{$user->nickname}}" class="avatar_big">
                            @include('users.partials.image_form')
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



    <script>

        var  jcrop_api;

        jQuery(function($){
            var width  = jQuery('#target').prop('naturalWidth');
            var height = jQuery('#target').prop('naturalHeight');

            jQuery('#target').Jcrop({
                aspectRatio: 1,
                onSelect: showPreview,
                onChange: showPreview,
                //setSelect: [ 100, 100, 200, 200 ],

                trueSize: [width,height],
                boxWidth: width,
                allowResize: true,
                minSize:  [ 300, 300 ]
            });





        var $preview = $('#preview');
        // Our simple event handler, called from onChange and onSelect
        // event handlers, as per the Jcrop invocation above
        function showPreview(coords)
        {
            if (parseInt(coords.w) > 0)
            {
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


@endsection