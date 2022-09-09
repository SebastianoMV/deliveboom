<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Deliveboom</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">

    <!-- FontAwsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="app">
        <header>
            <div class="container header-container">
                <div class="top-header">
                    <a class="logo-container" href="{{route('home')}}">
                        <h1 class="logo">Deliveb<i class="fa-solid fa-bomb fix-bomb"></i><i class="fa-solid fa-bomb fix-bomb"></i>m</h1>
                    </a>
                    <ul class="header-btns">
                        @guest
                            <li>
                                <a class="navigation-list-element" href="{{ route('login') }}"><i class="fa-solid fa-user"></i><span>{{__('Login')}}</span></a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a class="navigation-list-element" href="{{ route('register') }}"><i class="fa-solid fa-id-card"></i><span>{{__('Register')}}</span></a>
                                </li>
                            @endif
                        @else
                            <li>
                                <a
                                    class="navigation-list-element"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <span class="d-md-inline-block d-none mx-2">{{Auth::user()->name}}</span><i class="fa-solid fa-right-from-bracket" title="Logout"></i>
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </ul>
                    @endguest
                </div>
                @auth
                <nav>
                    <ul class="header-btns d-md-flex d-none">
                        <li><a class="navigation-list-element" href="{{route('admin.food.index')}}"><i class="fa-solid fa-list-ul"></i><span>Dashboard</span></a></li>
                        <li><a class="navigation-list-element" href="{{route('admin.food.create')}}"><i class="fa-solid fa-square-plus"></i><span>Aggiungi un nuovo prodotto</span></a></li>
                        <li><a class="navigation-list-element" href="{{route('admin.statistics')}}"><i class="fa-solid fa-chart-simple"></i><span>Statistiche</span></a></li>
                    </ul>
                    <div
                        class="header-dropdown-menu d-md-none d-block">
                        <ul class="dropdown-btns">
                            <li><a class="dropdown-list-element" href="{{route('admin.food.index')}}"><i class="fa-solid fa-list-ul"></i><span>Dashboard</span></a></li>
                            <li><a class="dropdown-list-element" href="{{route('admin.food.create')}}"><i class="fa-solid fa-square-plus"></i><span>Aggiungi un nuovo prodotto</span></a></li>
                            <li><a class="dropdown-list-element" href="{{route('admin.statistics')}}"><i class="fa-solid fa-chart-simple"></i><span>Statistiche</span></a></li>
                        </ul>
                    </div>
                </nav>
                @endauth
            </div>
        </header>




        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm teft-class d-none">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    Vai alla Home Pubblica
                </a>

                @auth
                    <a class="navbar-brand" href="{{ route('admin.food.index') }}">
                        Vai alla Index
                    </a>
                    <a class="navbar-brand" href="{{ route('admin.food.create') }}">
                        Aggiungi un nuovo prodotto
                    </a>
                    <a class="navbar-brand" href="{{ route('admin.statistics') }}">
                        Statistiche vendite
                    </a>
                @endauth

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
