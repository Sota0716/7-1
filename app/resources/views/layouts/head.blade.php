<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Share</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- 自作css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
</head>
<body class="w-100">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white bg-gradient shadow-lg share-herader-bg">
            <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}" >
                        SHARE
                    </a>
                @if(Auth::check())
                    <a class=" share-heder-icon d-flex align-items-center justify-content-center" href="{{ route('mypage') }}">
                    <img src="{{ asset(Auth::user()->image) }}" alt="">
                    </a>
                @else
                    <a href="{{ route('login') }}"><button type="button" class="btn btn-success">ログイン</button></a>
                @endif
            </div>
        </nav>
    </div>
    @yield('content')
</body>

