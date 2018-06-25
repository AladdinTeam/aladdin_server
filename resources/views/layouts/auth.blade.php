{{--
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
</html>--}}
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
{{--<nav class="nav">
    <a href="/"><img class="logo" src="{{asset('img/true_logo.png')}}"></a>
    <div class="menu">
        --}}{{--<div class="menu__item"><span class="phone">8(800) 550 16 45</span></div>--}}{{--
        @if(isset($name))
            <div class="menu__item dropdown" style="position: relative"><span>{{$name}}<img class="menu__item__img" src="{{asset('img/dropdown.png')}}"></span>
                <div class="dropdown-content">
                    <a href="/lk/orders">Мои заказы</a>
                    <a href="/logout">Выход</a>
                </div>
            </div>
        @else
            <div class="menu__item"><span>Мои заказы</span></div>
        @endif
        <div class="menu__item"><span>Исполнителям</span></div>
        <div class="menu__item"><span>Заказчикам</span></div>
        <div class="menu__item"><span onclick="location.href='/search'">Найти специалиста</span></div>
    </div>
    <img class="menu-icon" onclick="openNav()" src="{{asset('img/icon-menu.png')}}">
    <div class="sidenav" id="sidenav">
        <a href="javascript:void(0)" class="sidenav__close" onclick="closeNav()">&times</a>
        <a href="#" class="sidenav__item">Найти специалиста</a>
        <a href="#" class="sidenav__item --}}{{--sidenav__item--active--}}{{--">Заказчикам</a>
        <a href="#" class="sidenav__item">Исполнителям</a>
        <a href="#" class="sidenav__item">Мои заказы</a>
    </div>
</nav>--}}
@yield("body")
{{--<footer class="footer">
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
</footer>--}}
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/jquery.maskedinput.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
</body>
</html>
