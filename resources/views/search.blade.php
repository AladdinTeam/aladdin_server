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
    <div style="background-color: #f6f8fa">
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
    <div class="find">
        <p class="find__text">Находите исполнителей вручную или заполните форму для поиска лучшего предложения</p>
    </div>
    <div class="row search__container" id="form">
        <div class="col-12 col-md-5 search-panel">
            <div class="row tab">
                <div class="col-4 tab__item">
                    <button class="tab__button tab__button--active" onclick="location.href='/search#form'">Исполнители</button>
                </div>
                <div class="col-8 tab__item">
                    <button class="tab__button" onclick="location.href='/best_price#form'">Поиск лучшего предложения</button>
                </div>
            </div>
            <div id="filters" class="@if(isset($masters)) filter--show @else filter--hidden @endif turn_form row ">
                <div class="col-1">
                    <img class="turn_form__img" src="{{asset('img/dropdown.png')}}">
                </div>
                <div class="col-9 align-self-center">
                    <p class="turn_form__text">Фильтр</p>
                </div>
            </div>
            <div id="search" class="@if(isset($masters)) form--hidden @else form--show @endif">
                <form class="form form--border-bottom" method="GET" action="/search">
                    {{--{{csrf_field()}}--}}
                    <select id="categories" name="category" class="form__input-field form__select">
                    @if(isset($category))
                        @foreach($categories as $cat)
                            <option value="{{$cat->id}}" @if($cat->id == $category) selected @endif>{{$cat->name}}</option>
                        @endforeach
                    @else
                        <option value="0" disabled selected>Выберите категорию</option>
                        @foreach($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    @endif
                    </select>
                    <select id="subcategories" name="subcategory" class="form__input-field form__select">
                    @if(isset($subcategory))
                        @foreach($subcategories as $subcat)
                            <option value="{{$subcat->id}}" @if($subcat->id == $subcategory) selected @endif>{{$subcat->name}}</option>
                        @endforeach
                    @elseif(isset($category))
                        <option value="0" disabled selected>Выберите подкатегорию</option>
                        @foreach($subcategories as $subcat)
                            <option value="{{$subcat->id}}">{{$subcat->name}}</option>
                        @endforeach
                    @else
                        <option value="0" disabled selected>Выберите подкатегорию</option>
                    @endif
                    </select>
                    <select id="subways" name="subway" class="form__input-field form__select">
                    <option value="0">Выберите метро</option>
                    @if(isset($subway))
                        @foreach($subways as $subw)
                            <option value="{{$subw->id}}" @if($subw->id == $subway) selected @endif>{{$subw->name}}</option>
                        @endforeach
                    @else
                        @foreach($subways as $subw)
                            <option value="{{$subw->id}}">{{$subw->name}}</option>
                        @endforeach
                    @endif
                    </select>
                    <label class="form__container">Работа через безопасную сделку
                        <input type="checkbox" name="safety" @if(isset($safety)) checked @endif>
                        <span class="form__checkmark"></span>
                    </label>
                    @if(isset($error))
                        <p style="font-size: 0.95rem; color: #d83355; margin-top: 10px">{{$error}}</p>
                    @endif
                    <button type="submit" class="button button--blue button--center">Найти</button>
                </form>
                <div class="hint-list hint-list--border-bottom">
                    <h1 class="hint-list__header">Как это работает:</h1>
                    <ol>
                        <li class="hint-list__item">Выберите исполнителя</li>
                        <li class="hint-list__item">Вкратце опишите задачу</li>
                        <li class="hint-list__item">Договоритесь об условиях</li>
                        <li class="hint-list__item">Платите наличными исполнителю или картой через безопасную сделку</li>
                    </ol>
                </div>
                <div class="hint-list">
                    <ul>
                        <li class="hint-list__item"><a class="hint-list__item--href" href="#">Почему Aladdin?</a></li>
                        <li class="hint-list__item"><a class="hint-list__item--href" href="#">Как это работает</a></li>
                        <li class="hint-list__item"><a class="hint-list__item--href" href="#">Об исполнителях</a></li>
                        <li class="hint-list__item"><a class="hint-list__item--href" href="#">Безопасная сделка</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-7 profile__container">
            @if(isset($masters))
                @foreach($masters as $master)
                    <div class="row profile">
                        <div class="col-12">
                            {{--<p class="profile__name">
                                --}}{{--@foreach($master->subcategories as $subcategory)
                                    {{$subcategory->id}}
                                @endforeach--}}{{--
                            </p>--}}
                            <p class="profile__name">{{$master->first_name}} {{$master->last_name}}</p>
                        </div>
                        <div class="col-4 col-sm-2 col-md-3 col-lg-3">
                            <?php
                            $photo = $master->photos()->where('is_avatar', 1)->first();
                            ?>
                            @if($photo != null)
                                <img class="profile__avatar" src="{{asset(Illuminate\Support\Facades\Storage::url($photo->name))}}">
                            @else
                                <img class="profile__avatar" src="{{asset('img/no_photo.png')}}">
                            @endif
                        </div>
                        <div class="col-8 col-sm-10 col-md-9 col-lg-9">
                            <div class="row profile__qualities">
                                <div class="col-2">
                                    <img class="profile__img" src="{{asset('img/complete-order.png')}}">
                                </div>
                                <div class="col-10 align-self-center">
                                    <p class="profile__quality">ВЫПОЛНЕННЫХ ЗАДАНИЙ - {{$master->work_orders()->where('status', 3)->count()}}{{--34 выполненных задания--}}</p>
                                </div>
                            </div>
                            <div class="row profile__qualities">
                                <div class="col-2">
                                    <img class="profile__img" src="{{asset('img/positive-report.png')}}">
                                </div>
                                <div class="col-10 align-self-center">
                                    <p class="profile__quality">ПОЛОЖИТЕЛЬНЫХ ОТЗЫВОВ - 92%</p>
                                </div>
                            </div>
                            @if($master->safety == 1)
                                <div class="row profile__qualities">
                                    <div class="col-2">
                                        <img class="profile__img" src="{{asset('img/safety-deal.png')}}">
                                    </div>
                                    <div class="col-10 align-self-center">
                                        <p class="profile__quality">РАБОТАЕТ ЧЕРЕЗ БЕЗОПАСНУЮ СДЕЛКУ</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-12">
                            <p class="profile__about">{{$master->about}}{{--Последние 15 лет своей жизни я посвятил сантехнике и всему, что с ней связано. За все эти годы я всегда успешно справлялся с поставленными задачами. Обращайтесь, буду рад помочь!--}}</p>
                        </div>
                        <div class="col-12 button-wrapper button-wrapper--small-margin">
                            <button class="button button--center button--blue" onclick="location.href = '/profile/{{$master->id}}'">Цены и отзывы</button>
                        </div>
                    </div>
                @endforeach
                {{$masters->links()}}
            @else
                Выберите интересующую Вас категорию
            @endif
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