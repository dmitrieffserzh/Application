<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('custom-styles')

<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('custom-scripts')
</head>
<body class="body">

<header class="header">
    <div class="container">

            <div class="logo">Women <span>SAY!</span></div>
            <nav class="main-menu ">
                <button type="button" class="main-menu__button">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </nav>
    </div>
</header>

<div class="container">

    @yield('content')

    @yield('aside')

</div>

<footer class="footer">
    {{--footer--}}
</footer>
</body>
</html>
