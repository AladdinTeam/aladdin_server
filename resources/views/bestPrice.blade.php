<?php
use Illuminate\Support\Facades\Request;
?>
@extends('layouts.app')
@section('title', 'Поиск')
@section('styles')
    <link href="{{asset('css/general.less')}}?v=001" type="text/css" rel="stylesheet/less"/>
    <link href="{{asset('css/styles.less')}}?v=001" type="text/css" rel="stylesheet/less"/>
    {{--<link href="{{asset('css/search.less')}}" type="text/css" rel="stylesheet/less"/>--}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" ></script>
@endsection
@section('body')
    <div class="third-block--optional">
        <div class="third-block__container">
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
    <div class="row search__container" id="form">
        <div class="col-12 col-md-5 search-panel">
            <div class="row tab">
                <div class="col-4 tab__item">
                    <button class="tab__button" onclick="location.href='/search#form'">Исполнители</button>
                </div>
                <div class="col-8 tab__item">
                    <button class="tab__button tab__button--active" onclick="location.href='/best_price#form'">Поиск лучшего предложения</button>
                </div>
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
    {{--<div class="placeholder">
    <div class="row">
    <div class="col-12">
        <p class="placeholder_text">Проверенные специалисты в Санкт-Петербурге</p>
    </div>
    </div>
    <div class="row toys">
    <div class="col-4">
        <img class="toys_img" src="{{asset('img/search-coins.png')}}">
        <p class="toys_text">Вернем деньги при оплате через <span style="color: #2195f3">безопасную сделку</span></p>
    </div>
    <div class="col-4">
        <img class="toys_img" src="{{asset('img/search-checks.png')}}">
        <p class="toys_text">Каждый исполнитель <span style="color: #2195f3">подтвердил</span> свои навыки</p>
    </div>
    <div class="col-4">
        <img class="toys_img" src="{{asset('img/land-control.png')}}">
        <p class="toys_text">Контролируем работу <span style="color: #2195f3">исполнителя</span></p>
    </div>
    </div>
    </div>
    <div class="row header">
    <div class="col-12">
    <p>Обращайтесь к исполнителям напрямую через профиль<br>или оставьте заявку на подбор лучшей цены</p>
    </div>
    </div>
    <div class="row background">
    <div class="col-sm-4 col-md-3 block">
    {{--<div class="row">
        <div class="col">
            <p class="setting-text">Обращайтесь к специалистам напрямую через поиск или оставьте заявку на подбор лучшей цены
        </div>
    </div>--}}
    {{--<div class="row tab">
        <div class="col">
            <button class="tab_button tab_button_1 active" onclick="tapOnSearchTab(event, 'search')">Поиск исполнителей</button>
        </div>
        <div class="col">
            <button class="tab_button tab_button_2" onclick="tapOnSearchTab(event, 'best_price1')">Лучшая цена</button>
        </div>
    </div>
    <div class="settings" style="display: none;">
        <div class="row align-items-center settings_row">
            <div class="col-2">
                <img class="settings_img" src="{{asset("img/search-settings.png")}}">
            </div>
            <div class="col-10">
                <p class="settings_text">Настройка поиска</p>
            </div>
        </div>
    </div>

    <div id="search" class="search">
        <form class="">
            {{csrf_field()}}

            <select id="categories1" class="search_input-field">
            </select>
            <select id="subcategories1" class="search_input-field">
                <option value="0">Подкатегория</option>
            </select>
            <div class="search_extended-button" onclick="extendedSearchClick()">
                <img class="search_extended-button_img" src="{{asset("img/extended_search.png")}}"><p class="search_extended-button_para">Расширенный поиск</p>
            </div>
            <div class="search_extended">
                <select id="subways1" class="search_input-field">
                </select>
                <select class="search_input-field">
                    <option value="0">Ожидания по цене</option>
                    <option value="1">Заниженная</option>
                    <option value="2">Средняя</option>
                    <option value="3">Завышенная</option>
                </select>
                <div class="search_checkbox-div">
                    <div class="search_checkbox-div_item">
                        <input class="search_checkbox-div_item-checkbox" type="checkbox">
                        <label class="search_checkbox-div_item-label">Безопасная сделка</label>
                    </div>
                    <div class="search_checkbox-div_item">
                        <input class="search_checkbox-div_item-checkbox" type="checkbox">
                        <label class="search_checkbox-div_item-label">Свободен сейчас</label>
                    </div>
                    <!--<div class="search_checkbox-div_item">
                        <input class="search_checkbox-div_item-checkbox" type="checkbox">
                        <label class="search_checkbox-div_item-label">С примерами работ</label>
                    </div>
                    <div class="search_checkbox-div_item">
                        <input class="search_checkbox-div_item-checkbox" type="checkbox">
                        <label class="search_checkbox-div_item-label">С отзывами</label>
                    </div>-->
                </div>
            </div>
            {{--<div class="row">
                <div class="col">
                    <button class="search_button" type="button">Найти</button>
                </div>
            </div>--}}
    {{--</form>
</div>

<div id="best_price1" class="search" style="display: none">
    <p class="search_text">Есть сложности с подсчетом стоимости?</p>
    <p class="search_text">Разошлите задачу всем исполнителям Aladdin и в течении 15 минут получите в ответ готовые предложения с ценой в вашем личном кабинете. Это бесплатно.</p>
    <form action="{{route('best_price')}}" method="post">

        {{csrf_field()}}

        <select id="categories" name="categories" class="search_input-field">

        </select>
        @if($errors->has("categories"))
                @foreach ($errors->get("categories") as $error)
                    <p class="error">{{$error}}</p>
                @endforeach
        @endif
        <select id="subcategories" name="subcategories" class="search_input-field">
            <option value="0">Подкатегория</option>
        </select>
        @if($errors->has("subcategories"))
            @foreach ($errors->get("subcategories") as $error)
                <p class="error">{{$error}}</p>
            @endforeach
        @endif
        <select id="subways" name="subway" class="search_input-field">
        </select>
        @if($errors->has("subway"))
            @foreach ($errors->get("subway") as $error)
                <p class="error">{{$error}}</p>
            @endforeach
        @endif
        <select class="search_input-field" name="price" >
            <option value="0">Ожидания по цене</option>
            <option value="1">Заниженная</option>
            <option value="2">Средняя</option>
            <option value="3">Завышенная</option>
        </select>
        @if($errors->has("price"))
            @foreach ($errors->get("price") as $error)
                <p class="error">{{$error}}</p>
            @endforeach
        @endif
        <input class="search_input-field" name="header" type="text" placeholder="Что требуется сделать?">
        @if($errors->has("header"))
            @foreach ($errors->get("header") as $error)
                <p class="error">{{$error}}</p>
            @endforeach
        @endif
        <textarea class="search_input-field" name="description" rows="5"></textarea>
        @if($errors->has("description"))
            @foreach ($errors->get("description") as $error)
                <span class="error">{{$error}}</span>
            @endforeach
        @endif
        <input class="search_input-field" type="text" name="amount" placeholder="Предпологаемый бюджет">
        @if($errors->has("amount"))
            @foreach ($errors->get("amount") as $error)
                <p class="error">{{$error}}</p>
            @endforeach
        @endif
        <div class="search_checkbox-div">
            <div class="search_checkbox-div_item">
                <input class="search_checkbox-div_item-checkbox" type="checkbox" name="safety">
                <label class="search_checkbox-div_item-label">Безопасная сделка</label>
            </div>
            <div class="search_checkbox-div_item">
                <input class="search_checkbox-div_item-checkbox" type="checkbox" name="free">
                <label class="search_checkbox-div_item-label">Свободен сейчас</label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button class="search_button" type="submit">Найти</button>
            </div>
        </div>
    </form>
</div>
</div>

<div class="col-sm-7 col-md-5 block">
<div class="search_cond">
    <div class="row flex-md-row-reverse">
        <div class="col-12 col-sm-2">
            <p class="search_cond_condition"><span class="search_cond_display">На странице:</span></p><span class="search_cond_var active">5</span><span class="search_cond_var">10</span><span class="search_cond_var">15</span>
        </div>
        <div class="col-12 col-sm-10    ">
            <p class="search_cond_condition"><span class="search_cond_display">Сортировка:</span></p><span class="search_cond_var active">по рейтингу</span><span class="search_cond_var">по отзывам</span>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-12">
        <div class="row profile">
            <div class="row">
                <div class="col-4"><img class="profile_avatar" src="{{asset('img/photo_2017-08-29_16-33-07.jpg')}}"></div>
                <div class="col-8">
                    <div class="row name_status">
                        <div class="col-12 col-md-12"><p class="profile_name">Иван Иванович И.</p></div>
                        <div class="col-12 col-md-12 profile_status">
                            <p class="profile_item_text profile_free">Cвободен</p>
                        </div>
                    </div>
                    <div class="row profile_item">
                        <div class="col-2 col-sm-2 align-self-center">
                            <img class="profile_item_img" src="{{asset('img/search_profile_check.png')}}">
                        </div>
                        <div class="col-9 col-sm-10">
                            <p class="profile_item_text" style="color: #2195f3">34 выполненных задания</p>
                        </div>
                    </div>
                    <div class="row profile_item">
                        <div class="col-2 col-sm-2 align-self-center">
                            <img class="profile_item_img" src="{{asset('img/search_profile_quality.png')}}">
                        </div>
                        <div class="col-9 col-sm-10">
                            <span class="profile_item_text" style="color: #2195f3">90% положительных отзывов</span>
                        </div>
                    </div>
                    <div class="row profile_item">
                        <div class="col-2 col-sm-2 align-self-center">
                            <img class="profile_item_img" src="{{asset('img/profile_safe_deal.png')}}">
                        </div>
                        <div class="col-9 col-sm-10">
                            <p class="profile_item_text" style="color: #2195f3">Безопасная сделка</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
            <div class="col-12 profile_about">
                <p>Последние 15 лет своей жизни я посвятил сантехнике и всему, что с ней связано. За все эти годы я повидал всякое, и всегда успешно справлялся с поставленными задачами. Обращайтесь, буду рад помочь!</p>
            </div>
            {{--<div class="col-6 ">
                <img class="profile_item_img" src="{{asset('img/search_profile_check.png')}}">
                <p class="profile_item_text">34 выполненных задания</p>
            </div>
            <div class="col-6">
                <img class="profile_item_img" src="{{asset('img/search_profile_quality.png')}}">
                <p class="profile_item_text">90% положительных отзывов</p>
            </div>--}}
    {{--<div class="col-12 align-self-center profile_price">
        <img class="profile_price_img" src="{{asset('img/search_profile_ruble.png')}}">
        <p class="profile_price_text">У специалиста средние цены</p>
        <span class="profile_price_show">показать</span>
    </div>
    <div class="col-12 profile_button_block">
        <button class="profile_button" onclick="location.href = '/profile'">Подробнее</button>
    </div>
</div>

<div class="row profile">
    <div class="row">
        <div class="col-4"><img class="profile_avatar" src="{{asset('img/photo_2017-09-13_10-46-45.jpg')}}"></div>
        <div class="col-8">
            <div class="row name_status">
                <div class="col-12 col-md-12"><p class="profile_name">Иван Иванович И.</p></div>
                <div class="col-12 col-md-12 profile_status">
                    <p class="profile_item_text profile_free">Cвободен</p>
                </div>
            </div>
            <div class="row profile_item">
                <div class="col-2 col-sm-2 align-self-center">
                    <img class="profile_item_img" src="{{asset('img/search_profile_check.png')}}">
                </div>
                <div class="col-9 col-sm-10">
                    <p class="profile_item_text" style="color: #2195f3">34 выполненных задания</p>
                </div>
            </div>
            <div class="row profile_item">
                <div class="col-2 col-sm-2 align-self-center">
                    <img class="profile_item_img" src="{{asset('img/search_profile_quality.png')}}">
                </div>
                <div class="col-9 col-sm-10">
                    <span class="profile_item_text" style="color: #2195f3">90% положительных отзывов</span>
                </div>
            </div>
            <div class="row profile_item">
                <div class="col-2 col-sm-2 align-self-center">
                    <img class="profile_item_img" src="{{asset('img/profile_safe_deal.png')}}">
                </div>
                <div class="col-9 col-sm-10">
                    <p class="profile_item_text" style="color: #2195f3">Безопасная сделка</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

    </div>
    <div class="col-12 profile_about">
        <p>Последние 15 лет своей жизни я посвятил сантехнике и всему, что с ней связано. За все эти годы я повидал всякое, и всегда успешно справлялся с поставленными задачами. Обращайтесь, буду рад помочь!</p>
    </div>
    {{--<div class="col-6 ">
        <img class="profile_item_img" src="{{asset('img/search_profile_check.png')}}">
        <p class="profile_item_text">34 выполненных задания</p>
    </div>
    <div class="col-6">
        <img class="profile_item_img" src="{{asset('img/search_profile_quality.png')}}">
        <p class="profile_item_text">90% положительных отзывов</p>
    </div>--}}
    {{--<div class="col-12 align-self-center profile_price">
        <img class="profile_price_img" src="{{asset('img/search_profile_ruble.png')}}">
        <p class="profile_price_text">У специалиста средние цены</p>
        <span class="profile_price_show">показать</span>
    </div>
    <div class="col-12 profile_button_block">
        <button class="profile_button" onclick="location.href = '/profile'">Подробнее</button>
    </div>
</div>

<div class="row profile">
    <div class="row">
        <div class="col-4"><img class="profile_avatar" src="{{asset('img/photo_2017-09-13_18-50-29.jpg')}}"></div>
        <div class="col-8">
            <div class="row name_status">
                <div class="col-12 col-md-12"><p class="profile_name">Иван Иванович И.</p></div>
                <div class="col-12 col-md-12 profile_status">
                    <p class="profile_item_text profile_free">Cвободен</p>
                </div>
            </div>
            <div class="row profile_item">
                <div class="col-2 col-sm-2 align-self-center">
                    <img class="profile_item_img" src="{{asset('img/search_profile_check.png')}}">
                </div>
                <div class="col-9 col-sm-10">
                    <p class="profile_item_text" style="color: #2195f3">34 выполненных задания</p>
                </div>
            </div>
            <div class="row profile_item">
                <div class="col-2 col-sm-2 align-self-center">
                    <img class="profile_item_img" src="{{asset('img/search_profile_quality.png')}}">
                </div>
                <div class="col-9 col-sm-10">
                    <span class="profile_item_text" style="color: #2195f3">90% положительных отзывов</span>
                </div>
            </div>
            <div class="row profile_item">
                <div class="col-2 col-sm-2 align-self-center">
                    <img class="profile_item_img" src="{{asset('img/profile_safe_deal.png')}}">
                </div>
                <div class="col-9 col-sm-10">
                    <p class="profile_item_text" style="color: #2195f3">Безопасная сделка</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

    </div>
    <div class="col-12 profile_about">
        <p>Последние 15 лет своей жизни я посвятил сантехнике и всему, что с ней связано. За все эти годы я повидал всякое, и всегда успешно справлялся с поставленными задачами. Обращайтесь, буду рад помочь!</p>
    </div>
    <div class="col-12 align-self-center profile_price">
        <img class="profile_price_img" src="{{asset('img/search_profile_ruble.png')}}">
        <p class="profile_price_text">У специалиста средние цены</p>
        <span class="profile_price_show">показать</span>
    </div>
    <div class="col-12 profile_button_block">
        <button class="profile_button" onclick="location.href = '/profile'">Подробнее</button>
    </div>
</div>
</div>
</div>
</div>
</div>--}}
@endsection