<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="@yield('description', 'ATOP - 华拓光通信OA系统')">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')

    <title>@yield('title', 'ATOP') - 华拓光通信OA系统</title>
</head>
<body>

    <div id="app" class="{{ route_class() }}-page">
        @include('layouts._header')

        <div class="container" id="main">
            @include('shared._messages')
            @yield('nav')
            @yield('content')
        </div>

        @include('layouts._footer')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>