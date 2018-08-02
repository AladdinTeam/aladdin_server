<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield("title")</title>
    <link href="{{asset('css/grid.css')}}?v=001" type="text/css" rel="stylesheet"/>
    @yield('styles')
    <!-- [if it IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
{{--<div class="before-nav">
    <div class="row before-nav__container">
        <div class="col before-nav__block">
            <div class="row">
                <div class="before-nav__block__img-block">
                    <img class="before-nav__block__img" src="{{asset('img/before-nav-1.png')}}">
                </div>
                <div class="before-nav__block__text-block align-self-center">
                    <p class="before-nav__block__text">8 (800) 550 16 45</p>
                </div>
            </div>
        </div>
        <div class="col before-nav__block">
            <div class="row">
                <div class="col-9 offset-3">
                    <div class="row">
                    <div class="before-nav__block__img-block">
                        <img class="before-nav__block__img" src="{{asset('img/before-nav-2.png')}}">
                    </div>
                    <div class="before-nav__block__text-block align-self-center">
                        <p class="before-nav__block__text">mail@vsealaddin.ru</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col before-nav__block">
            <div class="row"  style="float: right">
                <div class="before-nav__block__img-block">
                    <img class="before-nav__block__img" src="{{asset('img/before-nav-3.png')}}">
                </div>
                <div class="before-nav__block__text-block align-self-center">
                    <p class="before-nav__block__text before-nav__block__text--small-whitespace">Санкт-Петербург</p>
                </div>
            </div>
        </div>
    </div>
</div>--}}
<nav class="nav">
    <div class="nav-container">
        <a href="/"><img class="logo" src="{{asset('img/logo376.png')}}"></a>
        <div class="menu">
            <div class="menu__item menu__item--active"><span onclick="location.href='/services'">Услуги</span></div>
            <div class="menu__item"><span>О проекте</span></div>
            {{--<div class="menu__item"><span onclick="location.href='/search'">Найти специалиста</span></div>
            <div class="menu__item"><span class="phone">8(800) 550 16 45</span></div>--}}
            @if(isset($name))
                <div class="menu__item menu__item--name dropdown" style="position: relative"><span>{{$name}}<img class="menu__item__img" src="{{asset('img/dropdown.png')}}"></span>
                    <div class="dropdown-content">
                        <a href="/orders">Мои заказы</a>
                        <a href="/logout">Выход</a>
                    </div>
                </div>
            @else
                <div class="menu__item"><span onclick="location.href = '/login'">Мои заказы</span></div>
            @endif
        </div>
        <div class="menu menu--right">
            <div class="menu__item--non-click">
                <div class="row">
                    <div class="col-3">
                        <img class="menu__img" src="{{asset('img/geo.png')}}">
                    </div>
                    <div class="col-8 align-self-center">
                        <p style="font-size: 0.9rem; font-weight: 600"><nobr>Санкт-Петербург</nobr></p>
                    </div>
                </div>
                <div class="row" style="margin-top: -30px">
                    <div class="col-3">
                        <img class="menu__img" src="{{asset('img/vibrophone.png')}}">
                    </div>
                    <div class="col-8 align-self-center">
                        <p style="font-size: 0.9rem; font-weight: 600"><nobr>8(800) 550 16 45</nobr></p>
                    </div>
                </div>
            </div>
        </div>
        <img class="menu-icon" onclick="openNav()" src="{{asset('img/icon-menu.png')}}">
        <div class="sidenav" id="sidenav">
            {{--<a href="javascript:void(0)" class="sidenav__close" onclick="closeNav()">&times</a>--}}
            <a href="#" class="sidenav__item">Услуги</a>
            <a href="#" class="sidenav__item">О проекте</a>
            @if(isset($name))
                <a href="/orders" class="sidenav__item">Мои заказы</a>
                <a href="/logout" class="sidenav__item">Выход</a>
            @else
                <a href="/login" class="sidenav__item">Мои заказы</a>
            @endif
        </div>
    </div>
</nav>
@yield("body")
<footer class="footer">
    <div class="footer__container">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-3 block">
                <h1 class="block__phone">8(800) 550-16-45</h1>
                <h1 class="block__phone">to@mytasker.ru</h1>
                <p class="block__item"><a class="block__link" href="#">О проекте</a></p>
                <p class="block__item"><a class="block__link" href="#">Как это работает</a></p>
                <p class="block__item"><a class="block__link" href="#">Безопасная сделка</a></p>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 block block--whitespaced">
                {{--<h3 class="block__header">Исполнителям</h3>--}}
                <p class="block__item"><a class="block__link" href="#">Оферта</a></p>
                <p class="block__item"><a class="block__link" href="#">Пользовательское соглашение</a></p>
            </div>
            <div class="col-12 col-sm-12 col-lg-6 block block--whitespaced2">
                <div class="row">
                    <div class="col-5 offset-1 col-sm-3 offset-sm-3 col-lg-4 offset-lg-2">
                        <img class="footer__img" src="{{asset('img/spark.png')}}">
                    </div>
                    <div class="col-5 col-sm-3 col-lg-4">
                        <img class="footer__img" src="{{asset('img/cossa.png')}}">
                    </div>
                    <div class="col-5 offset-1 col-sm-3 offset-sm-3 col-lg-4 offset-lg-2">
                        <img class="footer__img" src="{{asset('img/rusbase.png')}}">
                    </div>
                    <div class="col-5 col-sm-3 col-lg-4">
                        <img class="footer__img" src="{{asset('img/delpet.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="background-color: #f6f8fa">
        <div class="footer__container">
            <div class="row">
                <div class="col-12">
                    <p style="font-size: 0.9rem; font-weight: 600; padding: 10px">&copy; 2018 Tasker. Все права защищены.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/jquery.maskedinput.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
@yield('scripts')
</body>
</html>