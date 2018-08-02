@extends('layouts.app')
@section("title", "Aladdin")
@section("styles")
    <link href="{{asset('css/styles.less')}}?v=001" type="text/css" rel="stylesheet/less"/>
    <link href="{{asset('css/general.less')}}?v=001" type="text/css" rel="stylesheet/less"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js"></script>
@endsection
@section("body")
    <div class="first-block">
        <div class="first-block--container">
            <h3 class="first-block__header first-block__header--min first-block__header--only-left">Мелкий ремонт</h3>
            {{--<h3 class="first-block__subheader">Обращайтесь к услугам профессиональных исполнителей Aladdin.</h3>--}}
            <div class="row tiles tiles--min-margin">
                <div class="col-6 col-md-3">
                    <a href="{{url('/search/repair')}}">
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
                                <img class="category--img" src="{{asset('img/santechnic.jpg')}}">
                                <h1 class="category--header" >Сантехник</h1>
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
                        <div class="tiles--item tiles--item--last">
                            <div class="category">
                                <img class="category--img" src="{{asset('img/otdelochnye-raboty.jpg')}}">
                                <h1 class="category--header" >Отделка</h1>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="{{url('search/repair')}}">
                        <div class="tiles--item tiles--item--last">
                            <div class="category">
                                <img class="category--img" src="{{asset('img/bytovue_uslugi.jpg')}}">
                                <h1 class="category--header" >Бытовая техника</h1>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="first-block--color">
        <div class="first-block--container">
            <h3 class="first-block__header first-block__header--min">Уборка</h3>
            {{--<h3 class="first-block__subheader">Обращайтесь к услугам профессиональных исполнителей Aladdin.</h3>--}}
            <div class="row tiles tiles--min-margin">
                <div class="col-6 col-md-3">
                    <a href="{{url('search')}}">
                        <div class="tiles--item">
                            <div class="category">
                                <img class="category--img" src="{{asset('img/apartment-cleaning.jpg')}}">
                                <h1 class="category--header" >Квартира</h1>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="{{url('search')}}">
                        <div class="tiles--item">
                            <div class="category">
                                <img class="category--img" src="{{asset('img/clean-home.jpg')}}">
                                <h1 class="category--header" >Частный дом</h1>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="{{url('search')}}">
                        <div class="tiles--item">
                            <div class="category">
                                <img class="category--img" src="{{asset('img/office.jpg')}}">
                                <h1 class="category--header">Офис</h1>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="{{url('search')}}">
                        <div class="tiles--item">
                            <div class="category">
                                <img class="category--img" src="{{asset('img/other-clean.jpg')}}">
                                <h1 class="category--header" >Другое</h1>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
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
@endsection