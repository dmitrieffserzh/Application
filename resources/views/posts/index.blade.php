@push('custom-scripts')
    <script src="{{ asset('js/components/rating.js') }}"></script>
    <!--<script src="{{ asset('js/components/jq_scroll.js') }}"></script>
    <script src="{{ asset('js/components/paginate.js') }}"></script>-->
@endpush
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @include('posts.partials.form_list')
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div id="content" class="col-md-8">
                @include('posts.partials.item')
            </div>
        </div>
    </div>
@endsection