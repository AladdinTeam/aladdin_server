<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link href="{{asset('css/grid.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/general.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/auth.less')}}" rel="stylesheet/less"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" ></script>
</head>
<body style="background-color: #f9fafb;">
<nav class="nav" style="background: white">
    <div class="row nav-mobile">
        <div class="logo mobile-logo">
            @yield('mobile-logo')
        </div>
    </div>
    <div class="row nav-desktop">
        <div class="col-2 col-sm-1">
            <div class="menu">
                <span id="menuButton" onclick="openNav()"><img class="menu-img" src="{{ asset('img/icon-menu.png') }}"></span>
            </div>
        </div>
        <div class="col-10 col-sm-2">
            <div class="logo desktop-logo">
                @yield('desktop-logo')
            </div>
        </div>
        <div class="col-9 col-sm-9">
            <div class="nav_menu_container">
                <div class="nav_menu nav_menu-border">
                    <a class="nav_item" href="/soon">О сервисе</a>
                </div>
                <div class="nav_menu">
                    <a class="nav_item" href="/search">Найти специалиста</a>
                </div>
                <div class="nav_menu">
                    <a class="nav_item" href="/soon">Исполнителям</a>
                </div>
                <div class="nav_menu">
                    <a class="nav_item" href="/soon">Для бизнеса</a>
                </div>
                <div class="nav_menu">
                    <span class="nav_span">
                        <span class="nav_enter">
                            <a class="nav_item nav_enter_a" href="/login">Вход</a>
                        </span>
                        <span class="nav_register">
                            <a class="nav_item nav_enter_a" href="/registration">Регистрация</a>
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div id="sidenav" class="sidenav">
        <span onclick="closeNav()" class="closebtn" >&times;</span>
        <a href="/soon">О сервисе</a>
        <a href="/search">Найти специалиста</a>
        <a href="/soon">Исполнителям</a>
        <a href="/soon">Для бизнеса</a>
        <a class="min" href="/login">Вход</a>
        <a class="min" href="/registration">Регистрация</a>
    </div>
</nav>
<div class="row"></div>
@yield('content')
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{asset('js/jquery.maskedinput.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
</body>
</html>