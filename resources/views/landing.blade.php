@extends('layouts.app')
@section('mobile-logo')
    <a href="/"><img class="logo-img" src="{{ asset('img/new_logo.png') }}"></a>
@endsection
@section('desktop-logo')
    <a href="/"><img class="logo-img" src="{{ asset('img/new_logo.png') }}"></a>
@endsection
@section("title", "Aladdin")
@section("styles")
    <link href="{{asset('css/styles.less')}}" type="text/css" rel="stylesheet/less"/>
    <link href="{{asset('css/general.less')}}" type="text/css" rel="stylesheet/less"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js"></script>
@endsection
@section("body")
    <div class="first-block">
        <h3 class="first-block__header">Обращайтесь к грамотным исполнителям и совершайте безопасные сделки</h3>
        <h3 class="first-block__subheader">Поможем поручить бытовые задачи с оплатой за результат</h3>
        {{--<p class="first_block_paragraph"><u>Санкт-Петербург</u></p>--}}
    </div>
    <div class="second-block">
        <div class="second-block__container">
            <div class="second-block__header">На Aladdin часто ищут</div>
            <div class="second-block__subheader">Исполнители Санкт-Петербурга</div>
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-3 category">
                    <div class="row">
                        <div class="col-2">
                            <img class="category__img" src="{{ asset('img/category-repair.png') }}">
                        </div>
                        <div class="col-10 ">
                            <a class="category__header" href="/search">Мелкий ремонт</a>
                        </div>
                        <div class="col-10 offset-2 subcategory">
                            <ul>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search">Сантехник</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search">Электрик</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search">Мастер на час</a>
                                </li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search">Отделочные
                                        работы</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search">Сборка и ремонт
                                        мебели</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 category">
                    <div class="row">
                        <div class="col-2">
                            <img class="category__img" src="{{ asset('img/category-courier.png') }}">
                        </div>
                        <div class="col-10 ">
                            <a class="category__header" href="/search">Курьер</a>
                        </div>
                        <div class="col-10 offset-2 subcategory">
                            <ul>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search">Пешком</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search">На авто</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search">Купить и
                                        доставить</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search">Курьер на день</a>
                                </li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search">Срочная доставка</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 category">
                    <div class="row">
                        <div class="col-2">
                            <img class="category__img" src="{{ asset('img/category-cleaning.png') }}">
                        </div>
                        <div class="col-10 ">
                            <a class="category__header" href="/search">Уборка</a>
                        </div>
                        <div class="col-10 offset-2 subcategory">
                            <ul>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search">Влажная уборка</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search">Вывоз мусора</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search">Генеральная уборка</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search">Мытье окон</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search">Глажка</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 category">
                    <div class="row">
                        <div class="col-2">
                            <img class="category__img" src="{{ asset('img/category-transportision.png') }}">
                        </div>
                        <div class="col-10 ">
                            <a class="category__header" href="/search">Грузоперевозки</a>
                        </div>
                        <div class="col-10 offset-2 subcategory">
                            <ul>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search">Эвакутор</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search">Помощь в переезде</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search">Пассажирские перевозки</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search">Междугородние перевозки</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search">Грузчики</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="#" class="button button--blue button--center">Все специалисты</a>
                </div>
            </div>
        </div>
    </div>
    <div class="third-block">
        <div class="third-block__container">
            <h1 class="third-block__header">Почему?</h1>
            <div class="row">
                <div class="item col-12 col-sm-6 col-md-4">
                    <img class="item__img" src="{{asset('img/third-block-1.png')}}">
                    <h3 class="item__header">База проверенных,<br>ответственных специалистов</h3>
                    <p class="item__text">Исполнители проходят <span><a href="#" class="item__text--alloted">верификацию</a></span>, имеют образование и владеют сервисным этикетом</p>
                </div>
                <div class="item col-12 col-sm-6 col-md-4">
                    <img class="item__img" src="{{asset('img/third-block-2.png')}}">
                    <h3 class="item__header">Вернём деньги в случае некачественного сервиса</h3>
                    <p class="item__text">Воспользуйтесь <span><a href="#" class="item__text--alloted">безопасной сделкой</a></span>, чтобы защититься от любых невзгод</p>
                </div>
                <div class="item col-12 col-sm-6 offset-sm-3 offset-md-0 col-md-4">
                    <img class="item__img" src="{{asset('img/third-block-3.png')}}">
                    <h3 class="item__header">Найдём лучшую цену для любой задачи</h3>
                    <p class="item__text">Специалисты сами предложат свои услуги, останется только выбрать</p>
                </div>
            </div>
        </div>
    </div>
    <div class="fourth-block">
        <div class="fourth-block__container">
            <h1 class="fourth-block__header">Как Aladdin поможет найти лучшего специалиста?</h1>
            <div class="list">
                <div class="row">
                    <div class="col-2 align-self-center">
                        <img class="list__img" src="{{asset('img/fourth-block-1.png')}}">
                    </div>
                    <div class="col-10">
                        <h4 class="list__header">Расскажите, что требуется сделать</h4>
                        <p class="list__text">Вкратце опишите с какой проблемой или задачей вы столкнулись</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 align-self-center">
                        <img class="list__img--dot" src="{{asset('img/dot-line.png')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 align-self-center">
                        <img class="list__img" src="{{asset('img/fourth-block-2.png')}}">
                    </div>
                    <div class="col-10">
                        <h4 class="list__header">Задачу увидят более 1000 исполнителей Aladdin и сразу же начнут предлагать свои цены и сроки</h4>
                        <p class="list__text"><span><a class="list__text--allowed" href="#">Подробнее об исполнителях</a></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 align-self-center">
                        <img class="list__img--dot" src="{{asset('img/dot-line.png')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 align-self-center">
                        <img class="list__img" src="{{asset('img/fourth-block-3.png')}}">
                    </div>
                    <div class="col-10">
                        <h4 class="list__header">Остаётся выбрать самое подходящее предложение</h4>
                        <p class="list__text">Выбирайте исходя из цены, рейтинга, отзывов или вашей интуиции. Все исполнители проверены и готовы к работе</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 align-self-center">
                        <img class="list__img--dot" src="{{asset('img/dot-line.png')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 align-self-center">
                        <img class="list__img" src="{{asset('img/fourth-block-4.png')}}">
                    </div>
                    <div class="col-10">
                        <h4 class="list__header">Платите наличными или картой исполнителю</h4>
                        <p class="list__text"><span><a class="list__text--allowed" href="#">Безопасная сделка</a></span> позволит оплатить работу после того, как вы убедитесь в качестве проделанных работ. В противном случае, Aladdin вернёт деньги и возместит ущерб</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fifth-block">
        <div class="fifth-block__container">
            <div class="fifth-block__header">
                <h1 class="fifth-block__header__text">Расскажите о вашей задаче прямо сейчас и получите первые предложения от специалистов из Санкт-Петербурга уже через 8 минут</h1>
            </div>
            <form class="form">
                <select class="form__input-field form__select">
                    <option>Мелкий ремонт</option>
                    <option>Грузоперевозки</option>
                </select>
                <input class="form__input-field" type="text" placeholder="Ваше имя">
                <input class="form__input-field" type="text" placeholder="Ваш телефон">
                <textarea class="form__input-field" rows="3" placeholder="Что требуется сделать? Например, починить кран или доставить посылку"></textarea>
                <button type="submit" class="button button--blue button--center button--bold">ЗАРЕГИСТРИРОВАТЬСЯ И ВЫБРАТЬ ЛУЧШЕЕ ПРЕДЛОЖЕНИЕ</button>
                <a class="form__search" href="#">или найти специалиста вручную через поиск</a>
            </form>
            <div class="fifth-block__hint">
                <h1 class="fifth-block__hint__header">Что будет после оформления заявки?</h1>
                <p class="fifth-block__hint__text">Мы разошлем её всем исполнителям Aladdin, чтобы каждый смог предложить вам свои услуги. <span class="fifth-block__hint__text--bold">Оформление заявки не обязывает вас сделать заказ. Вы сможете удалить задачу в любой момент.</span></p>
            </div>
            <div class="fifth-block__hint">
                <h1 class="fifth-block__hint__header">Сколько предложений я получу и где их искать?</h1>
                <p class="fifth-block__hint__text">В среднем каждое задание получает 5-8 предложений в первый час публикации. Все предложения исполнителей отобразятся в вашем личном кабинете на Aladdin.</p>
            </div>
            <div class="fifth-block__hint">
                <h1 class="fifth-block__hint__header">Как связаться с исполнителем?</h1>
                <p class="fifth-block__hint__text">Номер телефона указан в предложении специлиста</p>
            </div>
            <div class="fifth-block__hint">
                <h1 class="fifth-block__hint__header">Как оплачивать услуги?</h1>
                <p class="fifth-block__hint__text">Наличными исполнителю или по карте через сервис <a href="#" class="fifth-block__hint__text--href">"безопасная сделка"</a></p>
            </div>
        </div>
    </div>
    <div class="sixth-block">
        <div class="sixth-block__container">
            <h1 class="sixth-block__header">Отзывы заказчиков</h1>
            <div class="report">
                <div class="row">
                    <div class="col-2">
                        <img class="report__img" src="{{asset('img/category-repair.png')}}">
                    </div>
                    <div class="col-8 align-self-center">
                        <h3 class="report__header">
                            Замена стеклопакета в комнате
                        </h3>
                    </div>
                    <div class="col-2 align-self-center">
                        <p class="report__price">5000 р</p>
                    </div>
                    <div class="col-12 col-sm-8 offset-sm-2">
                        <p class="report__text">
                            Мастер <a href="#" class="report__text--master">Иванов Иван</a> сделал всё как надо, оперативно приехал, сделал замеры, съездил за окном и поставил его на место. И всё это за один день! Спасибо!
                        </p>
                    </div>
                    <div class="col-12 col-sm-10">
                        <p class="report__signature">
                            Александр, 12.06.2018
                        </p>
                    </div>
                </div>
            </div>
            <div class="report">
                <div class="row">
                    <div class="col-2">
                        <img class="report__img" src="{{asset('img/category-cleaning.png')}}">
                    </div>
                    <div class="col-8 align-self-center">
                        <h3 class="report__header">
                            Влажная уборка офиса
                        </h3>
                    </div>
                    <div class="col-2 align-self-center">
                        <p class="report__price">500 р</p>
                    </div>
                    <div class="col-12 col-sm-8 offset-sm-2">
                        <p class="report__text">
                            Клинер <a href="#" class="report__text--master">Иванов Инна</a> прекрасно справилась с уборкой. Помыла 2 комнаты, а также выполнила все мои просьбы. Буду обращаться снова!
                        </p>
                    </div>
                    <div class="col-12 col-sm-10">
                        <p class="report__signature">
                            Никита, 12.06.2018
                        </p>
                    </div>
                </div>
            </div>
            <div class="report">
                <div class="row">
                    <div class="col-2">
                        <img class="report__img" src="{{asset('img/category-transportision.png')}}">
                    </div>
                    <div class="col-8 align-self-center">
                        <h3 class="report__header">
                            Трансфер из Гатчины в СПБ каждый день по будням
                        </h3>
                    </div>
                    <div class="col-2 align-self-center">
                        <p class="report__price">2500 р</p>
                    </div>
                    <div class="col-12 col-sm-8 offset-sm-2">
                        <p class="report__text">
                            Клинер <a href="#" class="report__text--master">Иванов Инна</a> прекрасно справилась с уборкой. Помыла 2 комнаты, а также выполнила все мои просьбы. Буду обращаться снова!
                        </p>
                    </div>
                    <div class="col-12 col-sm-10">
                        <p class="report__signature">
                            Никита, 12.06.2018
                        </p>
                    </div>
                </div>
            </div>
            <div class="report">
                <div class="row">
                    <div class="col-2">
                        <img class="report__img" src="{{asset('img/category-courier.png')}}">
                    </div>
                    <div class="col-8 align-self-center">
                        <h3 class="report__header">
                            Купить лекарство и привезти на адрес
                        </h3>
                    </div>
                    <div class="col-2 align-self-center">
                        <p class="report__price">5000 р</p>
                    </div>
                    <div class="col-12 col-sm-8 offset-sm-2">
                        <p class="report__text">
                            Осталась довольна. Исполнитель <a href="#" class="report__text--master">Игорь Морозов</a> был очень вежлив, купил препарат на свои деньги и привёз всё быстро. Мне оставалось только заплатить за доставку и чек.
                        </p>
                    </div>
                    <div class="col-12 col-sm-10">
                        <p class="report__signature">
                            Александр, 12.06.2018
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="seventh-block">
        <div class="seventh-block__container">
            <div class="seventh-block__header-block">
                <h1 class="seventh-block__header">Aladdin в СМИ</h1>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <img class="seventh-block__img" src="{{asset('img/rusbase.png')}}">
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <img class="seventh-block__img" src="{{asset('img/cossa.png')}}">
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <img class="seventh-block__img" src="{{asset('img/spark.png')}}">
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <img class="seventh-block__img" src="{{asset('img/delpet.png')}}">
                </div>
            </div>
        </div>
    </div>
    {{--<div class="third_block">
        <div class="row third_block-div  flex-sm-row-reverse ">
            <div class="col-10 offset-1 col-sm-5 offset-sm-0 col-lg-4 align-self-center third_block-image_div">
                <img class="third_block-img" src="{{ asset('img/blue-people.png') }}">
            </div>
            <div class="col-10 offset-1 col-sm-6 offset-sm-0 col-lg-7">
                <h1 class="third_block-header">
                    Не обязательно тратиться на сервисные кампании
                </h1>
                <p class="third_block-paragraph1">
                    На Aladdin вы бесплатно найдете надежного исполнителя, который оперативно справится с бытовой
                    задачей по разумной цене. <span class="second-parag">Мы тщательно проверяем всех специалистов, ручаясь за качество, и делаем сделки безопасными,
                    предоставляя вам возможность оплачивать услуги после успешного завершения работ.</span>
                </p>
                <p class="third_block-paragraph2">
                    Мы тщательно проверяем всех специалистов, ручаясь за качество, и делаем сделки безопасными,
                    предоставляя вам возможность оплачивать услуги после успешного завершения работ.
                </p>
            </div>
        </div>
    </div>
    <div class="fouth_block">
        <div class="row fourth_block-row">
            <div class="col-12 col-sm-4 col-xl-3 fourth_block-block">
                <div class="row">
                    <div class="col-10 offset-1 fourth_block-img_div">
                        <img class="fourth_block-img" src="{{'img/fourth_block-find.png'}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 offset-1 fourth_block-text">
                        <p class="fourth_block-text-p1"><span style="color: #2195f3">Выберите категорию</span><br>и
                            уточните детали</p>
                        <p class="fourth_block-text-p2">Укажите местоположение,<br>цену и срочность</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-1 fourth_block-arrow align-self-center">
                <img class="fourth_block-arrow_img" src="{{ asset('img/long-right-arrow.png') }}">
            </div>
            <div class="col-12 col-sm-4 col-xl-3 fourth_block-block">
                <div class="row">
                    <div class="col-10 offset-1 fourth_block-img_div">
                        <img class="fourth_block-img" src="{{'img/fourth_block-ancets.png'}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 offset-1 fourth_block-text">
                        <p class="fourth_block-text-p1"><span style="color: #2195f3">Просмотрите анкеты</span><br>исполнителей
                        </p>
                        <p class="fourth_block-text-p2">Читайте отзывы, сравнивайте<br>цены и условия работы</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-1 fourth_block-arrow align-self-center">
                <img class="fourth_block-arrow_img" src="{{ asset('img/long-right-arrow.png') }}">
            </div>
            <div class="col-12 col-sm-4 col-xl-3 fourth_block-block">
                <div class="row">
                    <div class="col-10 offset-1 fourth_block-img_div">
                        <img class="fourth_block-img" src="{{'img/fourth_block-call.png'}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 offset-1 fourth_block-text">
                        <p class="fourth_block-text-p1"><span style="color: #2195f3">Связывайтесь</span><br>напрямую</p>
                        <p class="fourth_block-text-p2">Через заявку или звонок. <br>Платите картой и наличными</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="third_block third_block_2">
        <div class="row">
            <div class="col-10 offset-1">
                <p class="third_block-paragraph3">Мы тщательно проверяем всех специалистов, ручаясь за качество, и
                    делаем сделки безопасными, предоставляя вам возможность оплачивать услуги после успешного завершения
                    работ.</p>
            </div>
        </div>
    </div>
    <div class="fifth_block">
        <div class="row">
            <div class="col-12">
                <h1 class="fifth_block-header">Не переживайте за дела</h1>
            </div>
        </div>
        <div class="row fifth_block-mobile">
            <div class="col-12 col-sm-6 fifth_block-item">
                <div class="row">
                    <div class="col-12 col-md-3 fifth_block-img_div align-self-start">
                        <img class="fifth_block-img" src="{{asset('img/land-check.png')}}">
                    </div>
                    <div class="col-10 offset-1 col-md-9 offset-md-0">
                        <h3 class="fifth_block_header_item"><span style="color: #2195f3">Проверяем</span> каждого
                            специалиста</h3>
                        <p class="fifth_block_paragraph_item">Все исполнители проходят тестирование на знание сервисного
                            этикета и процедуру подтверждения навыков</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 fifth_block-item">
                <div class="row">
                    <div class="col-12 col-md-3 fifth_block-img_div align-self-start">
                        <img class="fifth_block-img" src="{{asset('img/land-return.png')}}">
                    </div>
                    <div class="col-10 offset-1 col-md-9 offset-md-0">
                        <h3 class="fifth_block_header_item"><span style="color: #2195f3">Вернём</span> деньги</h3>
                        <p class="fifth_block_paragraph_item">В случае каких-либо проблем мы вернем вам деньги и
                            проведем работу с исполнителем.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 fifth_block-item">
                <div class="row">
                    <div class="col-12 col-md-3 fifth_block-img_div align-self-start">
                        <img class="fifth_block-img" src="{{asset('img/land-control.png')}}">
                    </div>
                    <div class="col-10 offset-1 col-md-9 offset-md-0">
                        <h3 class="fifth_block_header_item"><span style="color: #2195f3">Контролируем</span> ход работ
                        </h3>
                        <p class="fifth_block_paragraph_item">Следим за пунктуальностью и процессом сделки. Помогаем
                            разрешать спорные ситуации.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 fifth_block-item">
                <div class="row">
                    <div class="col-12 col-md-3 fifth_block-img_div align-self-start">
                        <img class="fifth_block-img" src="{{asset('img/land-find.png')}}">
                    </div>
                    <div class="col-10 offset-1 col-md-9 offset-md-0">
                        <h3 class="fifth_block_header_item"><span style="color: #2195f3">Найдем</span> лучшую цену</h3>
                        <p class="fifth_block_paragraph_item">Разошлите задачу всем исполнителям и получить готовые
                            предложения по цене.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 fifth_block-button_div">
                <button class="fifth_block-button" type="button">Перейти к поиску</button>
            </div>
        </div>
    </div>
    <div class="sixth_block">
        <div class="row sixth_block-main">
            <div class="col-10 offset-1 col-sm-7 offset-sm-1">
                <div class="row"><div class="col-11 offset-1"><h2 class="sixth_block-header">Наши исполнители</h2></div></div>
                <div class="row align-items-center sixth_block-item">
                    <div class="col-1">
                        <img class="sixth_block-parag_img" src="{{asset('img/icons-check.png')}}">
                    </div>
                    <div class="col-11">
                        <p class="sixth_block-paragraph">Подтвердили навыки и опыт отзывами и сертификатами</p>
                    </div>
                </div>
                <div class="row align-items-center sixth_block-item">
                    <div class="col-1">
                        <img class="sixth_block-parag_img" src="{{asset('img/icons-check.png')}}">
                    </div>
                    <div class="col-11">
                        <p class="sixth_block-paragraph">Предоставили копию паспортных данных</p>
                    </div>
                </div>
                <div class="row align-items-center sixth_block-item">
                    <div class="col-1">
                        <img class="sixth_block-parag_img" src="{{asset('img/icons-check.png')}}">
                    </div>
                    <div class="col-11">
                        <p class="sixth_block-paragraph">Имеют образование и владеют сервисным этикетом</p>
                    </div>
                </div>
                <button class="sixth_block-button">Подробнее об исполнителях</button>
            </div>
            <div class="col-sm-3 sixth_block-img_div align-self-center">
                <img class="sixth_block-img" src="{{asset('img/sixth_block.png')}}">
            </div>
        </div>
    </div>
    <div class="seventh_block">
        <div class="row">
            <div class="col-12">
                <h2 class="seventh_block-header">Лучшая цена за 15 минут</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3 class="seventh_block-subheader">Разошлите задачу всем исполнителям Aladdin, получите в ответ предложения<br class="display-xl">с ценой и выберете лучшее в личном кабинете</h3>
            </div>
        </div>
        <div class="row seventh_block-body">
            <div class="col-sm-5 offset-sm-1 seventh_block-hide_part">
                <div class="row align-items-center seventh_block-item">
                    <div class="col-3">
                        <img class="seventh_block-img" src="{{asset('img/seventh_block-15_min.png')}}">
                    </div>
                    <div class="col-8">
                        <p class="seventh_block_paragraph">Предложения поступят в течении 15 минут</p>
                    </div>
                </div>
                <div class="row align-items-center  seventh_block-item">
                    <div class="col-3">
                        <img class="seventh_block-img" src="{{asset('img/seventh_block-slider.png')}}">
                    </div>
                    <div class="col-8">
                        <p class="seventh_block_paragraph">Выберите исполнителя по цене, рейтингу или примерам работ</p>
                    </div>
                </div>
                <div class="row align-items-center  seventh_block-item">
                    <div class="col-3">
                        <img class="seventh_block-img" src="{{asset('img/seventh_block-phone.png')}}">
                    </div>
                    <div class="col-8">
                        <p class="seventh_block_paragraph">Связывайтесь напрямую. Оплачивайте наличными или картой через
                            <span style="color: #2195f3">безопасную сделку</span></p>
                    </div>
                </div>

            </div>
            <div class="col-12 col-sm-3 offset-sm-0">
                <form class="seventh_block-form">
                    <div class="row input_field_div">
                        <div class="col-12">
                            <input class="input_field" type="text" placeholder="Ваше имя">
                        </div>
                    </div>
                    <div class="row input_field_div">
                        <div class="col-12">
                            <input class="input_field" type="email" placeholder="Ваш e-mail">
                        </div>
                    </div>
                    <div class="row input_field_div">
                        <div class="col-12">
                            <textarea class="input_field" rows="5"
                                      placeholder="Что требуется сделать? Например, покрасить балкон 12 кв м синей краской."></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10 offset-1">
                            <button class="seventh_block-button" type="submit">Зарегистрироваться</button>
                            <br>
                            <label class="seventh_block-label">и получить предложения</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="eighth_block">
        <div class="row">
            <div class="col-12">
                <h1 class="eighth_block-header">Каждый отзыв - это реальный опыт заказчиков</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3 class="eighth_block-subheader1">Ежедневно мы связываемся с пользователями Aladdin и запрашиваем<br>объективные отзывы, чтобы помочь будущим заказчикам сделать выбор</h3>
            </div>
        </div>
        <div class="row"> <!--otzyv-->
            <div class="col-10 offset-1 col-lg-8 offset-lg-2 eighth_block-full_report">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2 align-self-center">
                                <img class="eighth_block-avatar" src="{{asset('img/panda.png')}}">
                            </div>
                            <div class="col-10 align-self-start eighth_block-name_service">
                                <p class="eighth_block-name">Валентин Кимаров</p>
                                <p class="eighth_block-service"><span style="color: #2195f3">Мелкий ремонт</span><br
                                            class="eighth_block-br">Замена стеклопакета в комнате</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-9 offset-md-2 eighth_block_report">
                        <p>Мастер <span style="color: #2195f3">Роман Халлопович</span> сделал всё как надо, оперативно приехал, сделал замеры, съездил за
                            окном и поставил его на место. И всё это за один день! Спасибо!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 offset-1 col-md-9 offset-md-2 eighth_block-date_deal">
                        <p class="eighth_block-date">12.03.2017</p>
                        <p class="eighth_block-deal"><img class="eighth_block-img_check"
                                                          src="{{asset('img/galochka.png')}}"><span style="color: #2195f3">Безопасная сделка</span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row"> <!--otzyv-->
            <div class="col-10 offset-1 col-lg-8 offset-lg-2 eighth_block-full_report">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2 align-self-center">
                                <img class="eighth_block-avatar" src="{{asset('img/cat_Z3FDfBn.png')}}">
                            </div>
                            <div class="col-10 align-self-start eighth_block-name_service">
                                <p class="eighth_block-name">Мария Рожкова</p>
                                <p class="eighth_block-service"><span style="color: #2195f3">Услуги курьера</span><br
                                            class="eighth_block-br">Купить лекарство и привезти на адрес</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-9 offset-md-2 eighth_block_report">
                        <p>Осталась довольна. Исполнитель <span style="color: #2195f3">Игорь Морозов</span> был очень вежлив, купил препарат на свои деньги
                            и привёз всё быстро. Мне оставалось только заплатить за доставку и чек.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 offset-1 col-md-9 offset-md-2 eighth_block-date_deal">
                        <p class="eighth_block-date">12.03.2017</p>

                    </div>
                </div>
            </div>
        </div>

        <div class="row"> <!--otzyv-->
            <div class="col-10 offset-1 col-lg-8 offset-lg-2 eighth_block-full_report">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2 align-self-center">
                                <img class="eighth_block-avatar" src="{{asset('img/man.png')}}">
                            </div>
                            <div class="col-10 align-self-start eighth_block-name_service">
                                <p class="eighth_block-name">Юрий Абрамов</p>
                                <p class="eighth_block-service"><span style="color: #2195f3">Уборка</span><br
                                            class="eighth_block-br">Влажная уборка двух комнат</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-9 offset-md-2 eighth_block_report">
                        <p>Клинер <span style="color: #2195f3">Запад Ронялова</span> прекрасно справилась с уборкой. Помыла 2 комнаты, а также выполнила все
                            мои просьбы. Буду обращаться снова!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 offset-1 col-md-9 offset-md-2 eighth_block-date_deal">
                        <p class="eighth_block-date">12.03.2017</p>
                        <p class="eighth_block-deal"><img class="eighth_block-img_check"
                                                          src="{{asset('img/galochka.png')}}"><span style="color: #2195f3">Безопасная сделка</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button class="eighth_block-button">Все отзывы</button>
            </div>
        </div>
    </div>
    <div class="ninth_block">
        <div class="row">
            <div class="col-12 ninth_block-header">Aladdin в СМИ</div>
        </div>
        <div class="row ninth_block-imgs-div">
            <div class="col-6 col-sm-5 offset-sm-1 col-lg-3 offset-lg-0 ninth_block-one_img">
                <img class="ninth_block-img" src="{{asset('img\rusbase.png')}}">
            </div>
            <div class="col-6 col-sm-5 offset-sm-0 col-lg-3 ninth_block-one_img">
                <img class="ninth_block-img" src="{{asset('img\spark.png')}}">
            </div>
            <div class="col-6 col-sm-5 offset-sm-1 col-lg-3 offset-lg-0 ninth_block-one_img">
                <img class="ninth_block-img" src="{{asset('img\delpet.png')}}">
            </div>
            <div class="col-6 col-sm-5 offset-sm-0 col-lg-3 ninth_block-one_img">
                <img class="ninth_block-img" src="{{asset('img\cossa.png')}}">
            </div>
        </div>
    </div>--}}
@endsection