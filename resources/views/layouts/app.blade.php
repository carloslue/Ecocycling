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
</head>
<body>
    <div id="app">
        <nav class="barra navbar navbar-expand-md navbar-light  shadow-sm">
            <div class="container">
                <a><H3>ECOCYCLING</H3>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if (Auth::check())
                    <ul class="navbar-nav mr-auto">
                        <a class="btn nav-link" href="{{ route('comenta') }}">{{ __('comentarios') }}</a>
                        <a class="btn nav-link" href="{{ route('informa') }}">{{ __('informacion') }}</a>
                        <a class="btn nav-link" href="{{ route('inicio') }}">{{ __('rutas') }}</a>
                        <a class="btn nav-link" href="{{ route('promocione') }}">{{ __('promociones') }}</a>
                        <a class="btn nav-link" href="{{ route('client') }}">{{ __('clientes') }}</a>
                        <a class="btn nav-link" href="{{ route('reservaindex') }}">{{ __('reservas') }}</a>
                         <a class="btn nav-link" href="{{ route('reservasp') }}">{{ __('reservaspromocion') }}</a>
                      
                       
                    </ul>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 ">
            @yield('content')
        </main>
        <main class="py-4 fondo">
            @yield('contentt')
        </main>
        <div class=" barra footer">
           <center><h3><b>derechos reservados de ECOCYCLING el salvador</b></h3></center>
    </div>
    </div>

    
</body>
</html>

<style>
    .barra{
        background: rgb(28, 231, 2);
       
    }

    .fondo{
        background: rgb(0, 3, 15);
    }
    </style>