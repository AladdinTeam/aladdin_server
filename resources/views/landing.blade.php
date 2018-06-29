@extends('layouts.app')
@section("title", "Aladdin")
@section("styles")
    <link href="{{asset('css/styles.less')}}?v=001" type="text/css" rel="stylesheet/less"/>
    <link href="{{asset('css/general.less')}}?v=001" type="text/css" rel="stylesheet/less"/>
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
                            <a class="category__header" href="{{url('/search')}}">Мелкий ремонт</a>
                        </div>
                        <div class="col-10 offset-2 subcategory">
                            <ul>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="{{url('/search?subcategory=1')}}">Сантехник</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="{{url('/search?subcategory=2')}}">Электрик</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="{{url('/search?subcategory=3')}}">Мастер на час</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="{{url('/search?subcategory=4')}}">Отделочные работы</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="{{url('/search?subcategory=5')}}">Сборка и ремонт мебели</a></li>
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
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=6">Пешком</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=7">На авто</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=8">Купить и доставить</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=9">Курьер на день</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=10">Срочная доставка</a></li>
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
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=11">Влажная уборка</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=12">Вывоз мусора</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=13">Генеральная уборка</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=14">Мытье окон</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=15">Глажка</a></li>
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
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=16">Эвакутор</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=17">Помощь в переезде</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=18">Пассажирские перевозки</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=19">Междугородние перевозки</a></li>
                                <li class="subcategory__item"><a class="subcategory__item--text" href="/search?subcategory=20">Грузчики</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 button-wrapper">
                    <a href="#" class="button button--white-blue-border button--center">ВСЕ СПЕЦИАЛИСТЫ</a>
                </div>
            </div>
        </div>
    </div>
    <div class="why-block">
        <div class="why-block__container">
            <h1 class="why-block__header">Почему?</h1>
            <p class="why-block__text">Aladdin позволит бесплатно найти надежных исполнителей для решения бытовых задач, а также оплатить услуги после успешного завершения работ</p>
        </div>
    </div>
    <div class="third-block">
        <div class="third-block__container">
            <div class="row">
                <div class="item col-12 col-md-6 col-lg-4">
                    <img class="item__img" src="{{asset('img/third-block-1.png')}}">
                    <h3 class="item__header"><nobr>База проверенных,</nobr><br><nobr>ответственных исполнителей</nobr></h3>
                    <p class="item__text"><nobr>Исполнители проходят <span><a href="#" class="item__text--alloted">верификацию</a></span>, имеют</nobr><br><nobr>образование и владеют сервисным этикетом</nobr></p>
                </div>
                <div class="item col-12 col-md-6 col-lg-4">
                    <img class="item__img" src="{{asset('img/third-block-2.png')}}">
                    <h3 class="item__header"><nobr>Вернём деньги в случае</nobr><br><nobr>некачественного сервиса</nobr></h3>
                    <p class="item__text"><nobr>Воспользуйтесь <span><a href="#" class="item__text--alloted">безопасной сделкой</a></span>,</nobr><br><nobr>чтобы защититься от любых невзгод</nobr></p>
                </div>
                <div class="item col-12 col-md-6 offset-md-3 offset-lg-0 col-lg-4">
                    <img class="item__img" src="{{asset('img/third-block-3.png')}}">
                    <h3 class="item__header"><nobr>Найдём лучшую цену</nobr><br><nobr>для любой задачи</nobr></h3>
                    <p class="item__text"><nobr>Специалисты сами предложат свои</nobr><br><nobr>услуги, останется только выбрать</nobr></p>
                </div>
            </div>
        </div>
    </div>
    <div class="fourth-block">
        <div class="fourth-block__container">
            <h1 class="fourth-block__header">Найдите подходящего специалиста за <span class="fourth-block__header--blue">12 минут</span></h1>
            <div class="row rel-block">
                <div class="col-6">
                    <div class="list-block--bordered" style="margin-top: 10px">
                        <h2 class="list-block__header">1. Расскажите о задаче</h2>
                        <p class="list-block__text">Вкратце <a class="list-block__text--link" href="#">опишите</a> с какой проблемой или задачей вы столкнулись</p>
                    </div>
                </div>
                <div class="col-6">
                    <img class="list-block__img--2" src="{{asset('img/1.png')}}">
                </div>
                <div class="col-6" style="margin-top: 40px">
                    <img class="list-block__img--2--right" src="{{asset('img/2.png')}}">
                </div>
                <div class="col-6">
                    <div class="list-block--bordered">
                        <h2 class="list-block__header">2. Получите предложения</h2>
                        <p class="list-block__text">Задачу увидят все исполнители Aladdin и сразу же начнут предлагать свои цены и сроки.
                            <a class="list-block__text--link" href="#">Подробнее об исполнителях</a></p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="list-block--bordered">
                        <h2 class="list-block__header">3. Выберите подходящее</h2>
                        <p class="list-block__text">Выбирайте исходя из цены, рейтинга, отзывов или вашей интуиции.
                            Все исполнители <a class="list-block__text--link" href="#">проверены</a> и готовы к работе.</p>
                    </div>
                </div>
                <div class="col-6" style="margin-top: 20px">
                    <img class="list-block__img--2" src="{{asset('img/3.png')}}">
                </div>
                <div class="col-6" style="margin-top: 30px">
                    <img class="list-block__img--2--right" src="{{asset('img/2.png')}}">
                </div>
                <div class="col-6">
                    <div class="list-block--bordered">
                        <h2 class="list-block__header">4. Утвердите условия</h2>
                        <p class="list-block__text">После выбора исполнителя мы предоставим его контактный телефон для уточнения деталей</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-12 list-block--bordered">
                        <h2 class="list-block__header">5. Платите наличными или картой</h2>
                        <p class="list-block__text">Оплата по карте через <a class="list-block__text--link" href="#">безопасную сделку</a>
                            позволит вернуть деньги, если что-то пойдет не так, а также получить компенсацию</p>
                    </div>
                </div>
                <div class="col-6">
                    <img class="list-block__img--2" style="width: 150px; height: auto; margin-top: 20px" src="{{asset('img/5.png')}}">
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
        <a href="{{url('/best_price#form')}}">
        <div class="why-block__container">
            <button class="button button--blue button--bordered button--big-font">Попробуйте, это бесплатно</button>
            {{--<h1 class="why-block__header why-block__header--one-header">Это удобно</h1>--}}
            {{--<p class="why-block__text">Aladdin позволит бесплатно найти надежных исполнителей для решения бытовых задач, а также оплатить услуги после успешного завершения работ</p>--}}
        </div>
        </a>
    </div>
    <div class="fourth-block">
        <div class="fourth-block__container">
            <div class="list">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="row list__item">
                            <div class="col-2">
                                <img class="list__img" src="{{asset('img/fourth-block-2-1.png')}}">
                            </div>
                            <div class="col-10">
                                <h4 class="list__header"><nobr>НЕ НУЖНО АНАЛИЗИРОВАТЬ</nobr><br><nobr>ДЕСЯТКИ САЙТОВ И ОБЪЯВЛЕНИЙ</nobr></h4>
                                <p class="list__text"><nobr>На Aladdin исполнители сами высылают</nobr><br><nobr>вам свои предложения</nobr></p>
                            </div>
                        </div>
                        <div class="row list__item">
                            <div class="col-2">
                                <img class="list__img" src="{{asset('img/fourth-block-2-2.png')}}">
                            </div>
                            <div class="col-10">
                                <h4 class="list__header"><nobr>НЕ НУЖНО ТРАТИТЬ ВРЕМЯ</nobr><br><nobr>НА ПОДСЧЁТ СТОИМОСТИ</nobr></h4>
                                <p class="list__text"><nobr>Каждое предложение уже содержит</nobr><br><nobr>цену, сроки и условия работы</nobr></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="row list__item">
                            <div class="col-2">
                                <img class="list__img" src="{{asset('img/fourth-block-2-3.png')}}">
                            </div>
                            <div class="col-10">
                                <h4 class="list__header"><nobr>НЕ НУЖНО ОБЩАТЬСЯ С</nobr><br><nobr>ОПЕРАТОРАМИ</nobr></h4>
                                <p class="list__text"><nobr>Заполните заявку и сразу же начните</nobr><br><nobr>получать предложения</nobr></p>
                            </div>
                        </div>
                        <div class="row list__item">
                            <div class="col-2">
                                <img class="list__img" src="{{asset('img/fourth-block-2-4.png')}}">
                            </div>
                            <div class="col-10">
                                <h4 class="list__header"><nobr>НЕ НУЖНО ТРАТИТЬСЯ НА</nobr><br><nobr>СЕРВИСНЫЕ КОМПАНИИ</nobr></h4>
                                <p class="list__text"><nobr>У исполнителей Aladdin низкие цены из-за</nobr><br><nobr>отсутствия затрат на рекламу и офис</nobr></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-block">
                <p class="text-block__text">Каждый исполнитель проходит процедуру <a href="#" class="text-block__text--link">верификации</a>, а возможность оплаты услуг после успешного завершения работ делает Aladdin по настоящему безопасным решением для заказчиков. </p>
            </div>
        </div>
    </div>
    <div class="fifth-block" id="search_form">
        <div class="fifth-block__container">
            {{--<div class="fifth-block__header">--}}
            <h1 class="fifth-block__header">Расскажите о задаче прямо сейчас и получите первые предложения от специалистов Санкт-Петербурга уже через <span class="fifth-block__header--blue">7 минут</span>, это бесплатно</h1>
            {{--</div>--}}
        </div>
        <div class="row fifth-block__container--with-form">
            <div class="col-12 col-md-6">
                <form class="form" method="post" action="{{route('miniOrder')}}">
                    <h3 class="form__header">ОФОРМЛЕНИЕ ЗАЯВКИ НЕ ОБЯЗЫВАЕТ ВАС СДЕЛАТЬ ЗАКАЗ. ВЫ СМОЖЕТЕ УДАЛИТЬ ЗАДАЧУ В ЛЮБОЙ МОМЕНТ.</h3>
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
                                echo '<option value="0" disabled selected>Выберите подкатегорию</option>';
                                foreach ($subcategories as $subcategory){
                                    echo '<option value="'.$subcategory->id.'">'.$subcategory->name.'</option>';
                                }
                            }
                            ?>
                        @else
                            <option value="0" disabled selected>Выберите подкатегорию</option>
                        @endif
                    </select>
                    @if($errors->has("subcategory"))
                        @foreach ($errors->get("subcategory") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif
                    <input id="phone" name="phone" class="form__input-field" type="text" placeholder="Ваш телефон" value="{{old('phone')}}">
                    @if($errors->has("phone"))
                        @foreach ($errors->get("phone") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif
                    <input type="number" class="form__input-field" name="amount" placeholder="Предполагаемый бюджет" value="{{old('amount')}}">
                    @if($errors->has("amount"))
                        @foreach ($errors->get("amount") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif
                    <textarea class="form__input-field" rows="3" name="header" placeholder="Что требуется сделать? Например, починить кран или доставить посылку">{{old('header')}}</textarea>
                    @if($errors->has("header"))
                        @foreach ($errors->get("header") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif
                    <label class="form__container">Работа через безопасную сделку
                        <input type="checkbox" name="safety" @if(old('safety') != null) checked @endif>
                        <span class="form__checkmark"></span>
                    </label>
                    <button type="submit" class="button button--blue button--center button--full-container">Продолжить</button>
                    <p class="form__note">Мы не передаём информацию третьим лицам</p>
                </form>
            </div>
            <div class="col-12 col-md-6">
            <div class="fifth-block__container--additional">
                <div class="col-12 fifth-block__list">
                    <div class="list">
                        <div class="row list__item">
                            <div class="col-2 align-self-center">
                                <img class="list__img" src="{{asset('img/fifth-block-1.png')}}">
                            </div>
                            <div class="col-10">
                                {{--<h4 class="list__header"><nobr>НЕ НУЖНО АНАЛИЗИРОВАТЬ</nobr><br><nobr>ДЕСЯТКИ САЙТОВ И ОБЪЯВЛЕНИЙ</nobr></h4>--}}
                                <p class="list__text">Каждое задание набирает от 9 предложений в первый час публикации</p>
                            </div>
                        </div>
                        <div class="row list__item">
                            <div class="col-2 align-self-center">
                                <img class="list__img" src="{{asset('img/fifth-block-2.png')}}">
                            </div>
                            <div class="col-10">
                                {{--<h4 class="list__header"><nobr>НЕ НУЖНО ТРАТИТЬ ВРЕМЯ</nobr><br><nobr>НА ПОДСЧЁТ СТОИМОСТИ</nobr></h4>--}}
                                <p class="list__text">Все предложения отобразятся в вашем личном кабинете на Aladdin</p>
                            </div>
                        </div>
                        <div class="row list__item">
                            <div class="col-2 align-self-center">
                                <img class="list__img" src="{{asset('img/fourth-block-4.png')}}">
                            </div>
                            <div class="col-10">
                                {{--<h4 class="list__header"><nobr>НЕ НУЖНО ОБЩАТЬСЯ С</nobr><br><nobr>ОПЕРАТОРАМИ</nobr></h4>--}}
                                <p class="list__text">После выбора предложения мы предоставим телефон исполнителя для уточнения деталей</p>
                            </div>
                        </div>
                        <div class="row list__item">
                            <div class="col-2 align-self-center">
                                <img class="list__img" src="{{asset('img/fourth-block-5.png')}}">
                            </div>
                            <div class="col-10">
                                {{--<h4 class="list__header"><nobr>НЕ НУЖНО ТРАТИТЬСЯ НА</nobr><br><nobr>СЕРВИСНЫЕ КОМПАНИИ</nobr></h4>--}}
                                <p class="list__text">Безопасная сделка позволит произвести оплату после окончания работ, а также возместить ущерб, узнайте подробнее</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="sixth-block">
        <div class="sixth-block__container">
            <h1 class="sixth-block__header">Недавние отзывы</h1>
            <div class="slideshow-container">

                <!-- Full-width images with number and caption text -->
                <div class="mySlides{{-- fade--}}">
                    <div class="row">
                        <div class="col-12 col-md-6 report report--slaider">
                            <div class="row">
                                <div class="col-2 align-self-center">
                                    <img class="report__img" src="{{asset('img/category-repair-1.png')}}">
                                </div>
                                <div class="col-10">
                                    <p class="report__text">
                                        "Мастер сделал всё как надо, оперативно приехал, сделал замеры, съездил за окном и поставил его на место. И всё это за один день! Спасибо!"
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="report__signature">
                                        Александр, 12.06.2018
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="report__master">Исполнитель <a href="" class="report__master--link">Иванов Иван</a></p>
                                    <h3 class="report__header">
                                        Замена стеклопакета в комнате
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 report report--slaider">
                            <div class="row">
                                <div class="col-2 align-self-center">
                                    <img class="report__img" src="{{asset('img/category-cleaning.png')}}">
                                </div>
                                <div class="col-10">
                                    <p class="report__text">
                                        "Клинер прекрасно справилась с уборкой. Помыла 2 комнаты, а также выполнила все мои просьбы. Буду обращаться снова!"
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="report__signature">Никита, 12.06.2018 </p>
                                </div>
                                <div class="col-12">
                                    <p class="report__master">Исполнитель <a href="" class="report__master--link">Иванова Инна</a></p>
                                    <h3 class="report__header">Влажная уборка офиса</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mySlides{{-- fade--}}">
                    <div class="row">
                        <div class="col-12 col-md-6 report report--slaider">
                            <div class="row">
                                <div class="col-2 align-self-center">
                                    <img class="report__img" src="{{asset('img/category-transportision.png')}}">
                                </div>
                                <div class="col-10">
                                    <p class="report__text">
                                        Клинер прекрасно справилась с уборкой. Помыла 2 комнаты, а также выполнила все мои просьбы. Буду обращаться снова!
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="report__signature">
                                        Никита, 12.06.2018
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="report__master">Исполнитель <a href="" class="report__master--link">Иванова Инна</a></p>
                                    <h3 class="report__header">
                                        Трансфер из Гатчины в СПБ каждый день по будням
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 report report--slaider">
                            <div class="row">
                                <div class="col-2 align-self-center">
                                    <img class="report__img" src="{{asset('img/category-courier-1.png')}}">
                                </div>
                                <div class="col-10">
                                    <p class="report__text">
                                        Осталась довольна. Исполнитель был очень вежлив, купил препарат на свои деньги и привёз всё быстро. Мне оставалось только заплатить за доставку и чек.
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="report__signature">
                                        Александр, 12.06.2018
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="report__master">Исполнитель <a href="" class="report__master--link">Игорь Морозов</a></p>
                                    <h3 class="report__header">
                                        Купить лекарство и привезти на адрес
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--<div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <img src="img3.jpg" style="width:100%">
                    <div class="text">Caption Three</div>
                </div>--}}

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            {{--<div class="report">
                <div class="row">
                    <div class="col-2 align-self-center">
                        <img class="report__img" src="{{asset('img/category-repair-1.png')}}">
                    </div>
                    <div class="col-10">
                        <p class="report__text">
                            "Мастер сделал всё как надо, оперативно приехал, сделал замеры, съездил за окном и поставил его на место. И всё это за один день! Спасибо!"
                        </p>
                    </div>
                    <div class="col-12">
                        <p class="report__signature">
                            Александр, 12.06.2018
                        </p>
                    </div>
                    <div class="col-12">
                        <p class="report__master">Исполнитель <a href="" class="report__master--link">Иванов Иван</a></p>
                        <h3 class="report__header">
                            Замена стеклопакета в комнате
                        </h3>
                    </div>
                </div>
            </div>
            <div class="report">
                <div class="row">
                    <div class="col-2 align-self-center">
                        <img class="report__img" src="{{asset('img/category-cleaning.png')}}">
                    </div>
                    <div class="col-10">
                        <p class="report__text">
                            "Клинер прекрасно справилась с уборкой. Помыла 2 комнаты, а также выполнила все мои просьбы. Буду обращаться снова!"
                        </p>
                    </div>
                    <div class="col-12">
                        <p class="report__signature">Никита, 12.06.2018 </p>
                    </div>
                    <div class="col-12">
                        <p class="report__master">Исполнитель <a href="" class="report__master--link">Иванова Инна</a></p>
                        <h3 class="report__header">Влажная уборка офиса</h3>
                    </div>
                </div>
            </div>
            <div class="report">
                <div class="row">
                    <div class="col-2 align-self-center">
                        <img class="report__img" src="{{asset('img/category-transportision.png')}}">
                    </div>
                    <div class="col-10">
                        <p class="report__text">
                            Клинер прекрасно справилась с уборкой. Помыла 2 комнаты, а также выполнила все мои просьбы. Буду обращаться снова!
                        </p>
                    </div>
                    <div class="col-12">
                        <p class="report__signature">
                            Никита, 12.06.2018
                        </p>
                    </div>
                    <div class="col-12">
                        <p class="report__master">Исполнитель <a href="" class="report__master--link">Иванова Инна</a></p>
                        <h3 class="report__header">
                            Трансфер из Гатчины в СПБ каждый день по будням
                        </h3>
                    </div>
                </div>
            </div>
            <div class="report">
                <div class="row">
                    <div class="col-2 align-self-center">
                        <img class="report__img" src="{{asset('img/category-courier.png')}}">
                    </div>
                    <div class="col-10">
                        <p class="report__text">
                            Осталась довольна. Исполнитель был очень вежлив, купил препарат на свои деньги и привёз всё быстро. Мне оставалось только заплатить за доставку и чек.
                        </p>
                    </div>
                    <div class="col-12">
                        <p class="report__signature">
                            Александр, 12.06.2018
                        </p>
                    </div>
                    <div class="col-12">
                        <p class="report__master">Исполнитель <a href="" class="report__master--link">Игорь Морозов</a></p>
                        <h3 class="report__header">
                            Купить лекарство и привезти на адрес
                        </h3>
                    </div>
                </div>
            </div>--}}
        </div>
    </div>
    <div class="seventh-block">
        <div class="seventh-block__header-block">
            <h1 class="seventh-block__header">Aladdin в СМИ</h1>
        </div>
        <div class="seventh-block__container">

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