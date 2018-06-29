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
<nav class="nav">
    <a href="/"><img class="logo" src="{{asset('img/true_logo.png')}}"></a>
    <div class="menu">
        {{--<div class="menu__item"><span class="phone">8(800) 550 16 45</span></div>--}}
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
        <div class="menu__item"><span>Исполнителям</span></div>
        <div class="menu__item"><span>Заказчикам</span></div>
        <div class="menu__item"><span onclick="location.href='/search'">Найти специалиста</span></div>
    </div>
    <img class="menu-icon" onclick="openNav()" src="{{asset('img/icon-menu.png')}}">
    <div class="sidenav" id="sidenav">
        <a href="javascript:void(0)" class="sidenav__close" onclick="closeNav()">&times</a>
        <a href="/search" class="sidenav__item">Найти специалиста</a>
        <a href="#" class="sidenav__item">Заказчикам</a>
        <a href="#" class="sidenav__item">Исполнителям</a>
        @if(isset($name))
            <a href="/orders" class="sidenav__item">Мои заказы</a>
            <a href="/logout" class="sidenav__item">Выход</a>
        @else
            <a href="/login" class="sidenav__item">Мои заказы</a>
        @endif
    </div>
</nav>
@yield("body")
<footer class="footer">
    <div class="footer__container">
        <div class="row">
            <div class="col-12 col-sm-4 block">
                <h3 class="block__header">Клиентам</h3>
                <p class="block__item"><a class="block__link" href="#">Как работает Aladdin</a></p>
                <p class="block__item"><a class="block__link" href="#">Об исполнителях</a></p>
                <p class="block__item"><a class="block__link" href="#">Гарантии и безопасность</a></p>
                <p class="block__item"><a class="block__link" href="#">Безопасная сделка</a></p>
                <p class="block__item"><a class="block__link" href="#">Частые вопросы</a></p>
            </div>
            <div class="col-12 col-sm-4 block">
                <h3 class="block__header">Исполнителям</h3>
                <p class="block__item"><a class="block__link" href="#">Aladdin для исполнителей</a></p>
                <p class="block__item"><a class="block__link" href="#">Стать партнёром</a></p>
                <p class="block__item"><a class="block__link" href="#">Условия работы</a></p>
            </div>
            <div class="col-12 col-sm-4 block block--right">
                <h1 class="block__phone">8 (800) 550-16-45</h1>
                <p class="block__item block__item--lighter">info@vsealaddin.ru</p>
                <p class="block__item block__item--spaced"><a class="block__link block__link--lighter" href="#"><u>Пользовательское соглашение</u></a></p>
                <p class="block__item block__item--lighter">2017 - 2018</p>
                <p class="block__item block__item--lighter">ООО "Аладдин Рус"</p>
                <p class="block__item block__item--lighter">&copy; Все права защищены</p>
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