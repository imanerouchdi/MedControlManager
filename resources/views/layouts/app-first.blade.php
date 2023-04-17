@extends('AdminPanel.adminLayout')
@section('app')
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--  <title>{{ config('app.name', 'Laravel 9 User Roles and Permissions Tutorial') }}</title>  --}}
    <title>Configuration users</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="bg-black">
           <H1>Bonjour : {{ Auth::user()->name }}</H1> 
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <h3 class="navbar-brand fs-2 " href="{{ url('/') }}">
                    Bienvenu dans l&#39;espace des utilisateur
                </h3>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}"></a></li>
                            <li><a class="nav-link" href="{{ route('register') }}"></a></li>
                        @else
                            <li><a class="nav-link" href="{{ route('users.index') }}"></a></li>
                            <li><a class="nav-link" href="{{ route('roles.index') }}"></a></li>
                            <li><a class="nav-link" href=""></a></li>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            <div class="container">
            @yield('content')
            
            </div>
        </main>
    </div>
    
</body>
</html>
@endsection

