<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm text-white">
        <img src="{{ asset('img/ub-logo.jpg') }}" style="height:50px" class="mr-4"/>
        <div class="container offset-3">
            <a class="navbar-brand " href="{{ url('/') }} " style="color: white">
                {{--                    {{ config('app.name', 'Laravel') }}--}}
                UB Information Technology Department Procurement System
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav offset-2 mr-auto">
                    <!-- Authentication Links -->
                    @if (Route::has('register') && Route::currentRouteName() !== 'register')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"
                               style="color: white;">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @guest
                        @if (Route::has('login') && Route::currentRouteName() !== 'login')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"
                                   style="color: white;">{{ __('Login') }}</a>
                            </li>
                        @endif
                    @endguest

                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
