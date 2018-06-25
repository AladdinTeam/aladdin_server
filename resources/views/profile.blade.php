<?php
use Illuminate\Support\Facades\Request;
?>
@extends('layouts.app')
@section('title', 'Поиск')
@section('styles')
    <link href="{{asset('css/general.less')}}" type="text/css" rel="stylesheet/less"/>
    <link href="{{asset('css/styles.less')}}" type="text/css" rel="stylesheet/less"/>
    {{--<link href="{{asset('css/search.less')}}" type="text/css" rel="stylesheet/less"/>--}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" ></script>
@endsection
@section('body')
    @if(session()->has('category'))
        <div class="background-modal" id="modal">
            <div class="modal">
                <a href="javascript:void(0)" class="modal__close" onclick="closeModal()">&times</a>
                <div style="text-align: -moz-center; text-align: center; padding-top: 1.5rem">
                    <h4 style="font-size: 1rem; color: #605e5e; font-weight: 600">Заполните заявку</h4>
                </div>
                <form class="form" method="post" action="{{route('miniOrder')}}">
                    <input type="hidden" name="master_id" value="{{$master->id}}">
                    {{csrf_field()}}
                    <select id="categories" name="category" class="form__input-field form__select">
                        {{--@if(session()->has('category'))--}}
                        <option value="{{session()->get('category')}}" disabled selected>{{App\Category::find(session()->get('category'))->name}}</option>
                        {{--@elseif(old('category') != null)
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @if(old('category')==$category->id) selected @endif>{{$category->name}}</option>
                            @endforeach
                        @else
                            <option value="0" disabled selected>Выберите категорию</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        @endif--}}
                    </select>
                    @if($errors->has("category"))
                        @foreach ($errors->get("category") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif
                    <select id="subcategories" name="subcategory" class="form__input-field form__select">
                        {{--@if(session()->has('subcategory'))--}}
                        <option value="{{session()->get('subcategory')}}" disabled selected>{{App\Category::find(session()->get('subcategory'))->name}}</option>
                        {{--@elseif(session()->has('category'))
                            <?php
                                $subcategories = $master->subcategories()->where('category_id', session()->has('category'))->get();
                            ?>
                            <option value="0" disabled selected>Выберите категорию</option>
                            @foreach($subcategories as $subcategory)
                                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                            @endforeach
                        @endif--}}
                        {{--@if (old('category') != null)
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
                        @endif--}}
                    </select>
                    @if($errors->has("subcategory"))
                        @foreach ($errors->get("subcategory") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif
                    @if(isset(session()->has('subway')))
                        <select id="subways" name="subway" class="form__input-field form__select">
                            <option value="{{session()->get('subway')}}" disabled selected>{{App\Category::find(session()->get('subway'))->name}}</option>
                        </select>
                        @if($errors->has("subway"))
                            @foreach ($errors->get("subway") as $error)
                                <label class="form__error">{{$error}}</label>
                            @endforeach
                        @endif
                    @endif
                    {{--<select class="form__input-field form__select">
                        <option>Мелкий ремонт</option>
                        <option>Грузоперевозки</option>
                    </select>--}}
                    {{-- <input class="form__input-field" type="text" placeholder="Ваше имя">
                     <input class="form__input-field" type="text" placeholder="Ваш телефон">--}}
                    <input type="text" class="form__input-field" name="header" placeholder="Введите название заявки" value="{{old('header')}}">
                    @if($errors->has("header"))
                        @foreach ($errors->get("header") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif
                    {{--<textarea class="form__input-field" rows="3" name="description" placeholder="Введите подробное описание задачи">{{old('description')}}</textarea>
                    @if($errors->has("description"))
                        @foreach ($errors->get("description") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif
                    <textarea class="form__input-field" rows="2" name="address" placeholder="Введите адрес">{{old('address')}}</textarea>
                    @if($errors->has("address"))
                        @foreach ($errors->get("address") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif
                    <div class="form__input-field" style="border: none;">
                        <label for="date" style="float: left;margin-bottom: 10px;font-size: 0.8rem">Дата окончания актуальности заказа:</label>
                    </div>
                    <input class="form__input-field" id="date" name="date" placeholder="дд.мм.гггг" value="{{old('date')}}">
                    @if($errors->has("date"))
                        @foreach ($errors->get("date") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif--}}
                    <input type="number" class="form__input-field" placeholder="Предпологаемый бюджет" name="amount" value="{{old('amount')}}">
                    @if($errors->has("amount"))
                        @foreach ($errors->get("amount") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif
                    <label class="form__container">Работа через безопасную сделку
                        <input type="checkbox" name="safety" @if(old('safety') != null) checked @endif>
                        <span class="form__checkmark"></span>
                    </label>
                    <button type="submit" class="button button--blue button--center button--bold">ОТПРАВИТЬ ЗАЯВКУ</button>
                    {{--<a class="form__search" href="#">или найти специалиста вручную через поиск</a>--}}
                </form>
            </div>
        </div>
        @endif
    <div class="row search__container">
        <div class="col-12 col-md-5 search-panel">
            <div id="search">
                <div class="hint-list hint-list--border-bottom" style="border-top: 1px solid #b3b3b3">
                    <h1 class="hint-list__header">Как поручить задачу этому исполнителю?</h1>
                    <ol>
                        <li class="hint-list__item">Опубликуйте задание</li>
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
        <div class="col-12 col-md-7">
            <div class="row profile">
                @if(session()->has('category'))
                <div class="col-4 offset-8">
                    <button class="button button--center button--blue" {{--onclick="location.href = '/profile/{{$master->id}}'"--}}>Выбрать</button>
                </div>
                @endif
                <div class="col-12">
                    <p class="profile__name">{{$master->first_name}} {{$master->last_name}}{{--Иван Иванов--}}</p>
                </div>
                <div class="col-4 col-sm-2 col-md-3 col-lg-3">
                    <img class="profile__avatar" src="{{asset('img/photo_2017-08-29_16-33-07.jpg')}}">
                </div>
                <div class="col-8 col-sm-10 col-md-9 col-lg-9">
                    <div class="row profile__qualities">
                        <div class="col-2">
                            <img class="profile__img" src="{{asset('img/complete-order.png')}}">
                        </div>
                        <div class="col-10 align-self-center">
                            <p class="profile__quality">Выполненных заданий {{/*$master->count*/random_int(5, 19)}}{{--34 выполненных задания--}}</p>
                        </div>
                    </div>
                    <div class="row profile__qualities">
                        <div class="col-2">
                            <img class="profile__img" src="{{asset('img/positive-report.png')}}">
                        </div>
                        <div class="col-10 align-self-center">
                            <p class="profile__quality">92% положительных отзывов</p>
                        </div>
                    </div>
                    @if($master->safety == 1)
                        <div class="row profile__qualities">
                            <div class="col-2">
                                <img class="profile__img" src="{{asset('img/safety-deal.png')}}">
                            </div>
                            <div class="col-10 align-self-center">
                                <p class="profile__quality">Работает через безопасную сделку</p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-12">
                    <p class="profile__about">{{$master_info->about}}{{--Последние 15 лет своей жизни я посвятил сантехнике и всему, что с ней связано. За все эти годы я всегда успешно справлялся с поставленными задачами. Обращайтесь, буду рад помочь!--}}</p>
                </div>
                <div class="col-12 bordered-list">
                    <h1 class="bordered-list__header">Услуги:</h1>
                    @foreach($services as $service)
                        <div class="bordered-list__item">
                            <div class="bordered-list__item--left" style="">{{$service->name}}</div>
                            <div class="bordered-list__item--right" style="">{{$service->price}}</div>
                        </div>
                    @endforeach
                </div>
                <div class="sixth-block--profile">
                    <div class="sixth-block__container--full-width">
                        <h1 class="sixth-block__header" style="margin-top: 10px">Отзывы</h1>
                        @foreach($reports as $report)
                            <div class="report">
                                <div class="row">
                                    <div class="col-2">
                                        <img class="report__img" src="{{asset($report->order->category->image_url)}}">
                                    </div>
                                    <div class="col-8 align-self-center">
                                        <h3 class="report__header">
                                            {{$report->order->header}}
                                        </h3>
                                    </div>
                                    <div class="col-2 align-self-center">
                                        <p class="report__price">{{$report->order->amount}} р</p>
                                    </div>
                                    <div class="col-12 col-sm-8 offset-sm-2">
                                        <p class="report__text">
                                            {{$report->report}}
                                        </p>
                                    </div>
                                    <div class="col-12 col-sm-10">
                                        <p class="report__signature">
                                            {{$report->order->client->first_name}} {{$report->order->client->last_name}},
                                            <?php
                                                $date = new DateTime($report->created_at);
                                                echo $date->format('d.m.Y');
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection