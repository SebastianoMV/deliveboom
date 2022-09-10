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
                                <span class="username">{{Auth::user()->name}}</span><a
                                    class="navigation-list-element"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-to-bracket" title="Logout"></i></i></a>
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
                        <li><a class="navigation-list-element no-border" href="{{route('admin.statistics')}}"><i class="fa-solid fa-chart-simple"></i><span>Statistiche</span></a></li>
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
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
