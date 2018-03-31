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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css"  type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.material.min.css" type="text/css">
    {{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">   
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav navbar-right">
                        <li class="nav-item ">
                            <a class="btn btn-cta" href="{{ route('home') }}"> 
                            <i class="ion ion-home" aria-hidden="true"></i> 
                            @lang('lang.home')
                            </a>
                        </li>
                       <!-- Authentication Links -->
                        @include("_includes.partials.guest")
                        
                        <!-- Language Links -->                        
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle"  data-toggle="dropdown">  
                                <i class="fa fa-language" aria-hidden="true"></i> 
                            </a> 
                            <ul class="dropdown-menu">
                                <li><a href="{{route('lang','en')}}" id="en">English</a></li>
                                <li><a href="{{route('lang','ar')}}" id="ar">العربية</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
