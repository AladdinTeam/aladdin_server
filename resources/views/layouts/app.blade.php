<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield("title")</title>
    <link href="{{asset('css/grid.css')}}" type="text/css" rel="stylesheet"/>
    @yield('styles')
    <!-- [if it IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="nav">
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
@yield("body")
<footer class="footer_block">
    <div class="row">
        <div class="col-12 col-sm-6 col-xl-4 footer_block-block">
            <h1 class="footer_block-header">О сервисе</h1>
            <p class="footer_block-paragraph">Все услуги</p>
            <p class="footer_block-paragraph">Безопасность и гарантии</p>
            <p class="footer_block-paragraph">Безопасная сделка</p>
            <p class="footer_block-paragraph">Правила пользования</p>
            <p class="footer_block-paragraph">Рекомендации заказчикам</p>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 footer_block-block">
            <h1 class="footer_block-header">Для исполнителей</h1>
            <p class="footer_block-paragraph">Регистрация</p>
            <p class="footer_block-paragraph">Требования</p>
            <p class="footer_block-paragraph">Верификация</p>
        </div>
        <div class="col-12 col-xl-4 ninth_block-logo-div">
            <div class="row">
                <div class="col-12">
                    <img class="footer_block-logo" src="{{asset("img/logo-white.png")}}">
                    <p class="footer_block-paragraph2">8 (800) 550 16 45</p>
                    <p class="footer_block-paragraph2">mail@vsealaddin.ru</p>
                </div>
            </div>
            <div class="row footer_block-social">
                <div class="col-3">
                    <img class="footer_block-vk-logo" src="{{asset("img/vk_logo.png")}}">
                </div>
                <div class="col-3">
                    <img class="footer_block-OK-logo" src="{{asset("img/OK_logo.png")}}">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 footer_block_rights">
            <p>&copy; 2018 Aladdin</p>
            <p>Все права защищены</p>
        </div>
    </div>
</footer>
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/jquery.maskedinput.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
</body>
</html>