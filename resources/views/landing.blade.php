@extends('layouts.app')
@section("title", "Tasker")
@section("styles")
    <link href="{{asset('css/general.less')}}?v=001" type="text/css" rel="stylesheet/less"/>
    <link href="{{asset('css/styles.less')}}?v=001" type="text/css" rel="stylesheet/less"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js"></script>
@endsection
@section("body")
    <div class="first-block">
        <div class="first-block--container">
            <h3 class="first-block__header">Надежный и доступный способ сохранить уют в доме</h3>
            <h3 class="first-block__subheader">Обращайтесь к услугам профессиональных исполнителей Tasker</h3>
            <div class="row tiles">
                <div class="col-6 col-md-3">
                    <a href="{{url('search/repair')}}">
                        <div class="tiles--item">
                            <div class="category">
                                <img class="category--img" src="{{asset('img/master-hour.jpg')}}">
                                <h1 class="category--header" >Мастер на час</h1>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="{{url('search/repair')}}">
                        <div class="tiles--item">
                            <div class="category">
                                <img class="category--img" src="{{asset('img/furniture-assembly.jpg')}}">
                                <h1 class="category--header" >Сборка мебели</h1>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="{{url('search/repair')}}">
                        <div class="tiles--item">
                            <div class="category">
                                <img class="category--img" src="{{asset('img/electrician.jpg')}}">
                                <h1 class="category--header" >Электрик</h1>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="{{url('search')}}">
                        <div class="tiles--item">
                            <div class="category">
                                <img class="category--img" src="{{asset('img/apartment-cleaning.jpg')}}">
                                <h1 class="category--header" >Уборка</h1>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="tiles--item tiles--item--without-shadow">
                        <button class="button button--blue button--full-container button--big" onclick="location.href='/services'">Все услуги</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="first-block first-block--color">
        <div class="first-block--container">
            <h3 class="first-block__header first-block__header--min">Находите специалистов бесплатно</h3>
            <h3 class="first-block__subheader first-block__subheader--min">Проверенные исполнители Tasker в вашем городе </h3>
            <div class="row tiles">
                <div class="col-6 col-md-3">
                    <div class="tiles--item">
                        <div class="master">
                            <div class="row master__about">
                                <div class="col-12">
                                    <h1 class="master__name">Геннадий И.</h1>
                                </div>
                                <div class="col-12">
                                    <img class="master__photo" src="{{asset('img/photo_2017-09-13_18-50-29.jpg')}}">
                                </div>
                                <div class="col-12">
                                    <div class="master__rating">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row master__about--desktop">
                                <div class="col-4">
                                    <img class="master__photo master__photo--desktop" src="{{asset('img/photo_2017-09-13_18-50-29.jpg')}}">
                                </div>
                                <div class="col-8">
                                    <h1 class="master__name master__name--desktop">Геннадий И.</h1>
                                    <div class="master__rating master__rating--desktop">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                    </div>
                                </div>
                            </div>
                            <h1 class="master__service">Мастер на час</h1>
                            <p class="master__reports">98% положительных отзывов</p>
                            <p class="master__report">"Мастер сделал всё как надо, оперативно приехал, сделал замеры, съездил за окном и поставил его на место. И всё это за один день! Спасибо!"</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="tiles--item">
                        <div class="master">
                            <div class="row master__about">
                                <div class="col-12">
                                    <h1 class="master__name">Иван И.</h1>
                                </div>
                                <div class="col-12">
                                    <img class="master__photo" src="{{asset('img/photo_2017-08-29_16-33-07.jpg')}}">
                                </div>
                                <div class="col-12">
                                    <div class="master__rating">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row master__about--desktop">
                                <div class="col-4">
                                    <img class="master__photo master__photo--desktop" src="{{asset('img/photo_2017-08-29_16-33-07.jpg')}}">
                                </div>
                                <div class="col-8">
                                    <h1 class="master__name master__name--desktop">Иван И.</h1>
                                    <div class="master__rating master__rating--desktop">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                    </div>
                                </div>
                            </div>
                            <h1 class="master__service">Сантехник</h1>
                            <p class="master__reports">95% положительных отзывов</p>
                            <p class="master__report">"Мастер сделал всё как надо, оперативно приехал, сделал замеры, съездил за окном и поставил его на место. И всё это за один день! Спасибо!"</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="tiles--item">
                        <div class="master">
                            <div class="row master__about">
                                <div class="col-12">
                                    <h1 class="master__name">Владимир П.</h1>
                                </div>
                                <div class="col-12">
                                    <img class="master__photo" src="{{asset('img/photo_2017-09-13_10-46-45.jpg')}}">
                                </div>
                                <div class="col-12">
                                    <div class="master__rating">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row master__about--desktop">
                                <div class="col-4">
                                    <img class="master__photo master__photo--desktop" src="{{asset('img/photo_2017-09-13_10-46-45.jpg')}}">
                                </div>
                                <div class="col-8">
                                    <h1 class="master__name master__name--desktop">Владимир П.</h1>
                                    <div class="master__rating master__rating--desktop">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                    </div>
                                </div>
                            </div>
                            <h1 class="master__service">Уборка</h1>
                            <p class="master__reports">97% положительных отзывов</p>
                            <p class="master__report">"Мастер сделал всё как надо, оперативно приехал, сделал замеры, съездил за окном и поставил его на место. И всё это за один день! Спасибо!"</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="tiles--item">
                        <div class="master">
                            <div class="row master__about">
                                <div class="col-12">
                                    <h1 class="master__name">Аркадий М.</h1>
                                </div>
                                <div class="col-12">
                                    <img class="master__photo" src="{{asset('img/photo_2017-09-13_15-50-09.jpg')}}">
                                </div>
                                <div class="col-12">
                                    <div class="master__rating">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row master__about--desktop">
                                <div class="col-4">
                                    <img class="master__photo master__photo--desktop" src="{{asset('img/photo_2017-09-13_15-50-09.jpg')}}">
                                </div>
                                <div class="col-8">
                                    <h1 class="master__name master__name--desktop">Аркадий М.</h1>
                                    <div class="master__rating master__rating--desktop">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                        <img class="rating-star" src="{{asset('img/star.png')}}">
                                    </div>
                                </div>
                            </div>
                            <h1 class="master__service">Электрик</h1>
                            <p class="master__reports">92% положительных отзывов</p>
                            <p class="master__report">"Мастер сделал всё как надо, оперативно приехал, сделал замеры, съездил за окном и поставил его на место. И всё это за один день! Спасибо!"</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="tiles--item tiles--item--without-shadow">
                        <button class="button button--blue button--full-container button--big" onclick="location.href='/services'">Начать поиск</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="first-block">
        <div class="first-block--container">
            <h3 class="first-block__header first-block__header--desktop first-block__header--min">Поможем найти лучшее предложение услуг среди
                профессионалов</h3>
            <div class="mobile">
                <div class="find-help row">
                    <div class="col-12">
                        <img class="find-help__img" src="{{asset('img/one.png')}}">
                    </div>
                    <div class="col-12">
                        <h1 class="find-help__header">Расскажите о задаче</h1>
                    </div>
                    <div class="col-12">
                        <p class="find-help__text">Менее чем за 60 секунд при помощи выбора параметров задачи</p>
                    </div>
                </div>
                <div class="find-help row">
                    <div class="col-12">
                        <img class="find-help__img" src="{{asset('img/two.png')}}">
                    </div>
                    <div class="col-12">
                        <h1 class="find-help__header">Получите предложения</h1>
                    </div>
                    <div class="col-12">
                        <p class="find-help__text">Исполнители пришлют свои цены и сроки в ваш личный кабинет</p>
                    </div>
                </div>
                <div class="find-help row">
                    <div class="col-12">
                        <img class="find-help__img" src="{{asset('img/three.png')}}">
                    </div>
                    <div class="col-12">
                        <h1 class="find-help__header">Выберите лучшее</h1>
                    </div>
                    <div class="col-12">
                        <p class="find-help__text">Сравните предложения по цене, отзывам или рейтингу, а также общайтесь с исполнителями в мгновенном чате.</p>
                    </div>
                </div>
                <div class="find-help row">
                    <div class="col-12">
                        <img class="find-help__img" src="{{asset('img/four.png')}}">
                    </div>
                    <div class="col-12">
                        <h1 class="find-help__header">Оплата картой или наличными</h1>
                    </div>
                    <div class="col-12">
                        <p class="find-help__text">Оплата по карте через <a class="blue-text" href="#">безопасную сделку</a> гарантирует возврат денежный средств, если останетесь недовольны.</p>
                    </div>
                </div>
            </div>
            <div class="desktop">
                <div class="row tiles">
                    <div class="col-6 col-md-3">
                        <div class="tiles--item tiles--item--fix">
                            <div class="find-help row">
                                <div class="col-12">
                                    <img class="find-help__img" src="{{asset('img/one.png')}}">
                                </div>
                                <div class="col-12">
                                    <h1 class="find-help__header">Расскажите о задаче</h1>
                                </div>
                                <div class="col-12">
                                    <p class="find-help__text">Менее чем за 60 секунд при помощи выбора параметров задачи</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="tiles--item tiles--item--fix">
                            <div class="find-help row">
                                <div class="col-12">
                                    <img class="find-help__img" src="{{asset('img/two.png')}}">
                                </div>
                                <div class="col-12">
                                    <h1 class="find-help__header">Получите предложения</h1>
                                </div>
                                <div class="col-12">
                                    <p class="find-help__text">Исполнители пришлют свои цены и сроки в ваш личный кабинет</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="tiles--item tiles--item--fix">
                            <div class="find-help row">
                                <div class="col-12">
                                    <img class="find-help__img" src="{{asset('img/three.png')}}">
                                </div>
                                <div class="col-12">
                                    <h1 class="find-help__header">Выберите<br>лучшее</h1>
                                </div>
                                <div class="col-12">
                                    <p class="find-help__text">Сравните предложения по цене, отзывам или рейтингу, а также общайтесь с исполнителями в мгновенном чате.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="tiles--item tiles--item--fix">
                            <div class="find-help row">
                                <div class="col-12">
                                    <img class="find-help__img" src="{{asset('img/four.png')}}">
                                </div>
                                <div class="col-12">
                                    <h1 class="find-help__header">Оплата картой или наличными</h1>
                                </div>
                                <div class="col-12">
                                    <p class="find-help__text">Оплата по карте через <a class="blue-text" href="#">безопасную сделку</a> гарантирует возврат денежный средств, если останетесь недовольны.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{--<div class="second-block">--}}
        {{--<div class="second-block__container">--}}
            {{--<div class="second-block__header">На Aladdin часто ищут</div>--}}
            {{--<div class="second-block__subheader">Исполнители Санкт-Петербурга</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-12 col-sm-6 col-lg-3 category">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-2">--}}
                            {{--<img class="category__img" src="{{ asset('img/category-repair.png') }}">--}}
                        {{--</div>--}}
                        {{--<div class="col-10 ">--}}
                            {{--<a class="category__header" href="{{url('/search')}}">Мелкий ремонт</a>--}}
                        {{--</div>--}}
                        {{--<div class="col-10 offset-2 subcategory">--}}
                            {{--<ul>--}}
                                {{--<li class="subcategory__item"><a class="subcategory__item--text" href="{{url('/search?subcategory=1')}}">Сантехник</a></li>--}}
                                {{--<li class="subcategory__item"><a class="subcategory__item--text" href="{{url('/search?subcategory=2')}}">Электрик</a></li>--}}
                                {{--<li class="subcategory__item"><a class="subcategory__item--text" href="{{url('/search?subcategory=3')}}">Мастер на час</a></li>--}}
                                {{--<li class="subcategory__item"><a class="subcategory__item--text" href="{{url('/search?subcategory=4')}}">Отделочные работы</a></li>--}}
                                {{--<li class="subcategory__item"><a class="subcategory__item--text" href="{{url('/search?subcategory=5')}}">Сборка и ремонт мебели</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-12 col-sm-6 col-lg-3 category">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-2">--}}
                            {{--<img class="category__img" src="{{ asset('img/category-courier.png') }}">--}}
                        {{--</div>--}}
                        {{--<div class="col-10 ">--}}
                            {{--<a class="category__header" href="/search">Курьер</a>--}}
                        {{--</div>--}}
                        {{--<div class="col-10 offset-2 subcategory">--}}
                            {{--<ul>--}}
                                {{--<li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=6">Пешком</a></li>--}}
                                {{--<li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=7">На авто</a></li>--}}
                                {{--<li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=8">Купить и доставить</a></li>--}}
                                {{--<li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=9">Курьер на день</a></li>--}}
                                {{--<li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=10">Срочная доставка</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-12 col-sm-6 col-lg-3 category">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-2">--}}
                            {{--<img class="category__img" src="{{ asset('img/category-cleaning.png') }}">--}}
                        {{--</div>--}}
                        {{--<div class="col-10 ">--}}
                            {{--<a class="category__header" href="/search">Уборка</a>--}}
                        {{--</div>--}}
                        {{--<div class="col-10 offset-2 subcategory">--}}
                            {{--<ul>--}}
                                {{--<li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=11">Влажная уборка</a></li>--}}
                                {{--<li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=12">Вывоз мусора</a></li>--}}
                                {{--<li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=13">Генеральная уборка</a></li>--}}
                                {{--<li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=14">Мытье окон</a></li>--}}
                                {{--<li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=15">Глажка</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-12 col-sm-6 col-lg-3 category">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-2">--}}
                            {{--<img class="category__img" src="{{ asset('img/category-transportision.png') }}">--}}
                        {{--</div>--}}
                        {{--<div class="col-10 ">--}}
                            {{--<a class="category__header" href="/search">Грузоперевозки</a>--}}
                        {{--</div>--}}
                        {{--<div class="col-10 offset-2 subcategory">--}}
                            {{--<ul>--}}
                                {{--<li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=16">Эвакутор</a></li>--}}
                                {{--<li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=17">Помощь в переезде</a></li>--}}
                                {{--<li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=18">Пассажирские перевозки</a></li>--}}
                                {{--<li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=19">Междугородние перевозки</a></li>--}}
                                {{--<li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=20">Грузчики</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-12 button-wrapper">--}}
                    {{--<a href="#" class="button button--white-blue-border button--center">ВСЕ СПЕЦИАЛИСТЫ</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="why-block why-block--big-top-margin">
        <p class="why-block__text">Популярные услуги</p>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 col-lg-3 popular-service">
            <img class="full-container-img" src="{{asset('img/cleaning.jpg')}}">
            <p class="popular-service__text popular-service__text--one">Уборка<br>квартир</p>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 popular-service">
            <img class="full-container-img" src="{{asset('img/handymans.jpg')}}">
            <p class="popular-service__text popular-service__text--two">Мастер<br>на час</p>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 popular-service">
            <img class="full-container-img" src="{{asset('img/painting.jpg')}}">
            <p class="popular-service__text popular-service__text--three">Покраска<br>стен</p>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 popular-service">
            <img class="full-container-img" src="{{asset('img/conditioner.jpg')}}">
            <p class="popular-service__text popular-service__text--four">Установка<br>кондиционера</p>
        </div>
    </div>
    <div class="third-block">
        <div class="third-block__container third-block__container--without-header">
            <div class="row">
                <div class="item col-12 col-md-6 col-lg-4">
                    <img class="item__img" src="{{asset('img/third-block-1.png')}}">
                    <h3 class="item__header">Ассоциация<br>профессионалов</h3>
                    <p class="item__text">Исполнители Tasker с опытом работы прошли верификацию и подтвердили навыки отзывами и оценками от реальных клиентов</p>
                </div>
                <div class="item col-12 col-md-6 col-lg-4">
                    <img class="item__img" src="{{asset('img/third-block-2.png')}}">
                    <h3 class="item__header">Строгий регламент предоставления услуг</h3>
                    <p class="item__text">Мы проводим обучение каждого исполнителя по части исполнения услуг, подходу к клиенту и ориентации на результат</p>
                </div>
                <div class="item col-12 col-md-6 offset-md-3 offset-lg-0 col-lg-4">
                    <img class="item__img" src="{{asset('img/third-block-3.png')}}">
                    <h3 class="item__header">Вернём деньги, если останетесь недовольны</h3>
                    <p class="item__text">При оплате через безопасную сделку наш сервис вернёт вам деньги, если работа исполнителя не оправдала ожиданий</p>
                    <p><a href="#" class="blue-text" style="padding: 0 2%;">О БЕЗОПАСНОЙ СДЕЛКЕ</a></p>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="fourth-block">
        <div class="fourth-block__container fourth-block__container--snake">
            <h1 class="fourth-block__header"><span class="fourth-block__header--blue">4 шага</span> к идеальному исполнителю</h1>
            <div class="row rel-block">
                <div class="col-6">
                    <div class="list-block--bordered list-block--bordered--right-margin">
                        <h2 class="list-block__header">1. Расскажите о задаче</h2>
                        <p class="list-block__text">Вкратце <a class="list-block__text--link" href="#">опишите</a> с какой проблемой или задачей вы столкнулись</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="list-block--bordered--left-margin">
                        <img class="list-block__img--2" src="{{asset('img/1.png')}}">
                    </div>
                </div>
                <div class="col-6" style="margin-top: 25px">
                    <div class="list-block--bordered--left-margin">
                        <img class="list-block__img--2--right" src="{{asset('img/2.png')}}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="list-block--bordered list-block--bordered--left-margin">
                        <h2 class="list-block__header">2. Получите предложения</h2>
                        <p class="list-block__text">Задачу увидят все исполнители Aladdin и сразу же начнут предлагать свои цены и сроки.
                            <a class="list-block__text--link" href="#">Подробнее об исполнителях</a></p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="list-block--bordered list-block--bordered--right-margin">
                        <h2 class="list-block__header">3. Выберите подходящее</h2>
                        <p class="list-block__text">Выбирайте исходя из цены, рейтинга, отзывов или вашей интуиции.
                            Все исполнители <a class="list-block__text--link" href="#">проверены</a> и готовы к работе.</p>
                    </div>
                </div>
                <div class="col-6" style="margin-top: 20px">
                    <div class="list-block--bordered--left-margin">
                        <img class="list-block__img--2" src="{{asset('img/3.png')}}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="list-block--bordered--right-margin">
                        <img class="list-block__img--2--right" style="height: 150px; margin-top: 20px" src="{{asset('img/4.png')}}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="list-block--bordered list-block--bordered--left-margin">
                        <h2 class="list-block__header">4. Утвердите условия</h2>
                        <p class="list-block__text">После выбора исполнителя мы предоставим его контактный телефон для уточнения деталей</p>
                    </div>
                </div>
            </div>
            <div class="row list-block">
                <div class="col-12 list-block--bordered">
                    <h2 class="list-block__header">1. Расскажите о задаче</h2>
                    <p class="list-block__text">Вкратце <a class="list-block__text--link" href="#">опишите</a> с какой проблемой или задачей вы столкнулись</p>
                </div>
                <div class="col-6 list-block--fixed-height list-block--right-border"></div>
                <div class="col-12">
                    <img class="list-block__img" src="{{asset('img/fourth-block-1.png')}}">
                </div>
                <div class="col-6 list-block--fixed-height list-block--right-border"></div>
                <div class="col-12 list-block--bordered">
                    <h2 class="list-block__header">2. Получите предложения</h2>
                    <p class="list-block__text">Задачу увидят все исполнители Aladdin и сразу же начнут предлагать свои цены и сроки.
                        <a class="list-block__text--link" href="#">Подробнее об исполнителях</a></p>
                </div>
                <div class="col-6 list-block--fixed-height list-block--right-border"></div>
                <div class="col-12">
                    <img class="list-block__img" src="{{asset('img/fourth-block-2.png')}}">
                </div>
                <div class="col-6 list-block--fixed-height list-block--right-border"></div>
                <div class="col-12 list-block--bordered">
                    <h2 class="list-block__header">3. Выберите подходящее</h2>
                    <p class="list-block__text">Выбирайте исходя из цены, рейтинга, отзывов или вашей интуиции.
                        Все исполнители <a class="list-block__text--link" href="#">проверены</a> и готовы к работе.</p>
                </div>
                <div class="col-6 list-block--fixed-height list-block--right-border"></div>
                <div class="col-12">
                    <img class="list-block__img" src="{{asset('img/fourth-block-3.png')}}">
                </div>
                <div class="col-6 list-block--fixed-height list-block--right-border"></div>
                <div class="col-12 list-block--bordered">
                    <h2 class="list-block__header">4. Утвердите условия</h2>
                    <p class="list-block__text">После выбора исполнителя мы предоставим его контактный телефон для уточнения деталей</p>
                </div>
                <div class="col-6 list-block--fixed-height list-block--right-border"></div>
                <div class="col-12">
                    <img class="list-block__img" src="{{asset('img/fourth-block-4.png')}}">
                </div>
                <div class="col-6 list-block--fixed-height list-block--right-border"></div>
                <div class="col-12 list-block--bordered">
                    <h2 class="list-block__header">5. Платите наличными или картой</h2>
                    <p class="list-block__text">Оплата по карте через <a class="list-block__text--link" href="#">безопасную сделку</a>
                        позволит вернуть деньги, если что-то пойдет не так, а также получить компенсацию</p>
                </div>
                <div class="col-6 list-block--fixed-height list-block--right-border"></div>
                <div class="col-12">
                    <img class="list-block__img" src="{{asset('img/fourth-block-5.png')}}">
                </div>
            </div>
        </div>
    </div>
    <div class="why-block">
        --}}{{--<a href="{{url('/best_price#form')}}">--}}{{--
            <div class="why-block__container">
                <button class="button button--blue button--bordered button--big-font">Попробуйте, это бесплатно</button>
                --}}{{--<h1 class="why-block__header why-block__header--one-header">Это удобно</h1>--}}{{--
                <p class="why-block__text why-block__text--small">Вы также можете найти исполнителя вручную через <a href="{{url('/search#form')}}" class="why-block__text--link">поиск</a></p>
            </div>

        --}}{{--</a>--}}{{--
    </div>--}}
    {{--<div class="fourth-block">
        <div class="fourth-block__container">
            --}}{{--<div class="fourth-block__container fourth-block__container--right">--}}{{--
                <div class="list">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-5">
                            <div class="row list__item list__item--big-bottm-margin">
                                <div class="col-2">
                                    <img class="list__img list__img--larger" src="{{asset('img/fourth-block-2-1.png')}}">
                                </div>
                                <div class="col-10">
                                    <h4 class="list__header"><nobr>НЕ НУЖНО АНАЛИЗИРОВАТЬ</nobr><br><nobr>ДЕСЯТКИ САЙТОВ И ОБЪЯВЛЕНИЙ</nobr></h4>
                                    <p class="list__text list__text--without-padding"><nobr>На Aladdin исполнители сами высылают</nobr><br><nobr>вам свои предложения</nobr></p>
                                </div>
                            </div>
                            <div class="row list__item list__item--big-bottm-margin">
                                <div class="col-2">
                                    <img class="list__img list__img--larger" src="{{asset('img/fourth-block-2-2.png')}}">
                                </div>
                                <div class="col-10">
                                    <h4 class="list__header"><nobr>НЕ НУЖНО ТРАТИТЬ ВРЕМЯ</nobr><br><nobr>НА ПОДСЧЁТ СТОИМОСТИ</nobr></h4>
                                    <p class="list__text list__text--without-padding"><nobr>Каждое предложение уже содержит</nobr><br><nobr>цену, сроки и условия работы</nobr></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-5 offset-lg-2">
                            <div class="row list__item list__item--big-bottm-margin">
                                <div class="col-2">
                                    <img class="list__img list__img--larger" src="{{asset('img/fourth-block-2-3.png')}}">
                                </div>
                                <div class="col-10">
                                    <h4 class="list__header"><nobr>НЕ НУЖНО ОБЩАТЬСЯ С</nobr><br><nobr>ОПЕРАТОРАМИ</nobr></h4>
                                    <p class="list__text list__text--without-padding"><nobr>Заполните заявку и сразу же начните</nobr><br><nobr>получать предложения</nobr></p>
                                </div>
                            </div>
                            <div class="row list__item list__item--big-bottm-margin">
                                <div class="col-2">
                                    <img class="list__img list__img--larger" src="{{asset('img/fourth-block-2-4.png')}}">
                                </div>
                                <div class="col-10">
                                    <h4 class="list__header"><nobr>НЕ НУЖНО ТРАТИТЬСЯ НА</nobr><br><nobr>СЕРВИСНЫЕ КОМПАНИИ</nobr></h4>
                                    <p class="list__text list__text--without-padding"><nobr>У исполнителей Aladdin низкие цены из-за</nobr><br><nobr>отсутствия затрат на рекламу и офис</nobr></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            --}}{{--</div>--}}{{--
            <div class="text-block">
                <p class="text-block__text">Каждый исполнитель проходит процедуру <a href="#" class="text-block__text--link">верификации</a>, а возможность оплаты услуг после успешного завершения работ делает Aladdin по настоящему безопасным решением для заказчиков. </p>
            </div>
        </div>
    </div>--}}
    <div class="fifth-block fifth-block--form" id="search_form">
        <div class="fifth-block__container--with-form">
            {{--<div class="fifth-block__header">--}}
            <h3 class="first-block__header first-block__header--min2">Получите первые предложения от специалистов с ценами и сроками через <span class="fifth-block__header--blue" style="font-weight: 600">7 минут</span></h3>
            {{--</div>--}}
        </div>
        <div class="row fifth-block__container--with-form fifth-block__container--with-form--pad">
            <div class="col-12 col-md-5">
                <form class="form" method="post" action="{{route('miniOrder')}}">
                    {{--<h3 class="form__header">Поиск не обязывает вас оформить заказ</h3>--}}
                    {{csrf_field()}}
                    <input type="hidden" name="st" value="1">
                    <select name="category" id="categories" class="form__input-field form__select">
                        @if(old('category') != null)
                            {{--<option value="0" disabled selected>Выберите категорию</option>--}}
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @if(old('category')==$category->id) selected @endif>{{$category->name}}</option>
                            @endforeach
                        @else
                            <option value="0" disabled selected>Выберите категорию</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        @endif
                    </select>
                    @if($errors->has("category"))
                        @foreach ($errors->get("category") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif
                    <select name="subcategory" id="subcategories" class="form__input-field form__select">
                        @if (old('category') != null)
                            <?php
                            $subcategories = App\Subcategory::where('category_id', old('category'))->get();
                            if(old('subcategory') != 0){
                                foreach ($subcategories as $subcategory){
                                    if($subcategory->id == old('subcategory')){
                                        echo '<option value="'.$subcategory->id.'" selected>'.$subcategory->name.'</option>';
                                    } else {
                                        echo '<option value="'.$subcategory->id.'">'.$subcategory->name.'</option>';
                                    }
                                }
                            } else {
                                echo '<option value="0" disabled selected>Выберите услугу</option>';
                                foreach ($subcategories as $subcategory){
                                    echo '<option value="'.$subcategory->id.'">'.$subcategory->name.'</option>';
                                }
                            }
                            ?>
                        @else
                            <option value="0" disabled selected>Выберите услугу</option>
                        @endif
                    </select>
                    @if($errors->has("subcategory"))
                        @foreach ($errors->get("subcategory") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif
                    {{--<div class="row">
                        <div class="col-12 col-sm-6 form__input-field__div">
                            <input id="phone" name="phone" class="form__input-field form__input-field--one-row" type="text" placeholder="Ваш телефон" value="{{old('phone')}}">
                            @if($errors->has("phone"))
                                @foreach ($errors->get("phone") as $error)
                                    <label class="form__error">{{$error}}</label>
                                @endforeach
                            @endif
                        </div>
                        <div class="col-12 col-sm-6 form__input-field__div">
                            <input type="number" class="form__input-field form__input-field--one-row" name="amount" placeholder="--}}{{--Предполагаемый б--}}{{--Бюджет" value="{{old('amount')}}">
                            @if($errors->has("amount"))
                                @foreach ($errors->get("amount") as $error)
                                    <label class="form__error">{{$error}}</label>
                                @endforeach
                            @endif
                        </div>
                    </div>


                    <textarea class="form__input-field" rows="3" name="header" placeholder="Что требуется сделать? Например, починить кран или доставить посылку">{{old('header')}}</textarea>
                    @if($errors->has("header"))
                        @foreach ($errors->get("header") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif
                    <label class="form__container">Работа через безопасную сделку
                        <input type="checkbox" name="safety" @if(old('safety') != null) checked @endif>
                        <span class="form__checkmark"></span>
                    </label>--}}
                    <button type="submit" class="button button--blue button--center button--full-container" style="margin-top: 40px">Перейти к поиску</button>
                    <a href="#" class="form__note">Ознакомится с офертой</a>
                </form>
            </div>
            <div class="col-12 col-md-7">
                <div class="fifth-block__container--additional">
                    <div class="row">
                        <div class="col-12 col-sm-6 note note--left">
                            <img class="note__img" src="{{asset('img/note1.png')}}">
                            <p class="note__text">Каждое задание набирает от 8 предложений в первый час публикации</p>
                        </div>
                        <div class="col-12 col-sm-6 note note--right">
                            <img class="note__img" src="{{asset('img/note2.png')}}">
                            <p class="note__text">Общайтесь с исполнителями через чат или звоните напрямую</p>
                        </div>
                        <div class="col-12 col-sm-6 note note--left">
                            <img class="note__img" src="{{asset('img/note3.png')}}">
                            <p class="note__text">Все предложения отобразятся в вашем личном кабинете на Aladdin</p>
                        </div>
                        <div class="col-12 col-sm-6 note note--right">
                            <img class="note__img" src="{{asset('img/note4.png')}}">
                            <p class="note__text">Выберите исполнителя исходя из цены, рейтинга или отзывов</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="third-block">
        <div class="third-block__container">
            <h3 class="first-block__header first-block__header--min" style="margin-bottom: 50px">Недавние отзывы</h3>
            <div class="row">
                <div class="item col-12 col-md-6 col-lg-4">
                    <img class="item__img" src="{{asset('img/water.png')}}">
                    <h3 class="item__header">Валентин, 27.07.18</h3>
                    <p class="item__text">"Мастер сделал всё как надо, оперативно приехал, сделал замеры, съездил за окном и поставил его на место. И всё это за один день! Спасибо!"</p>
                    <p class="item__text">---</p>
                    <p class="item__text">Исполнитель, <span class="blue-text">Иван Иванов</span> </p>
                </div>
                <div class="item col-12 col-md-6 col-lg-4">
                    <img class="item__img" src="{{asset('img/key.png')}}">
                    <h3 class="item__header">Никита, 27.07.18</h3>
                    <p class="item__text">"Сантехник профессионал, никаких лишних разговоров , увидел проблему и решил, вежливый , пунктуальный , спасибо огромное"</p>
                    <p class="item__text">---</p>
                    <p class="item__text">Исполнитель, <span class="blue-text">Иван Иванов</span> </p>
                </div>
                <div class="item col-12 col-md-6 offset-md-3 offset-lg-0 col-lg-4">
                    <img class="item__img" src="{{asset('img/metla.png')}}">
                    <h3 class="item__header">Виктор, 26.07.18</h3>
                    <p class="item__text">"Анастасия все сделала хорошо. Был один недочёт, который обещала исправить в следующий раз. А так качество уборки понравилось."</p>
                    <p class="item__text">---</p>
                    <p class="item__text">Исполнитель, <span class="blue-text">Иван Иванов</span> </p>
                </div>
            </div>
        </div>
    </div>
@endsection