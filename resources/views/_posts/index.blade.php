@extends('layouts.app')

@section('content')
    <div class="container">

        <div id="result"></div>


        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Post</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                            @foreach ($posts as $post)
                                <div class="data" data-id="{{$post->id}}" data-type="post">
                                <div>{{ $post->title }}</div>
                                <div>{{ $post->content }}</div>
                                <div class="count">{{ $post->like()->count() }}</div>


                                </div>
                            <hr>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
