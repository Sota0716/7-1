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
    <div  class="w-100 py-4 share-flex-column-center">
        <div class="row row-cols-3 w-100 share-height-70 my-4 text-center">
            <div class="col"></div>
            <div class="col h1">利用停止されています</div>
            <div class="col"><a href="{{ route('logout') }}" class="btn btn-outline-secondary" 
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">戻る</a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
        </div>
    </div> 
</body>