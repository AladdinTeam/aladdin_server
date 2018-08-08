@extends('layouts.app')
@section('title', 'Поиск')
@section('styles')
    <link href="{{asset('css/general.less')}}?v=001" type="text/css" rel="stylesheet/less"/>
    <link href="{{asset('css/styles.less')}}?v=001" type="text/css" rel="stylesheet/less"/>
    {{--<link href="{{asset('css/search.less')}}" type="text/css" rel="stylesheet/less"/>--}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" ></script>
@endsection
@section('body')
    <div class="first-block desktop" style="position: relative">
        <div class="first-block--container" style="position:relative;z-index: 0;">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="first-block__header">Профессиональные исполнители по {{$category}} в Санкт-Петербурге</h3>
                    <h3 class="first-block__subheader desktop">Обращайтесь к услугам профессиональных исполнителей Tasker.</h3>
                </div>
            </div>
        </div>
        <div class="first-block--container first-block--container--search" style="position:absolute; top:0; left:0;z-index: 2">
            <div class="row">
                <div class="offset-9 col-3">
                    <img style="width: 100%" src="{{asset($image)}}">
                </div>
            </div>
        </div>
    </div>
    <div class="first-block">
        <div class="mobile">
            <div class="first-block--container first-block--container--search">
                <div class="row">
                    <div class="col-5 offset-7">
                        <img style="width: 100%" src="{{asset($image)}}">
                    </div>
                </div>
            </div>
            <div class="first-block--container">
                <div class="row">
                    <div class="col-12" style="margin-top: -60px">
                        <h3 class="first-block__header" style="font-size: 1.4rem; padding-right: 25px">Профессиональные исполнители по {{$category}} в Санкт-Петербурге</h3>
                        <h3 class="first-block__subheader desktop">Обращайтесь к услугам профессиональных исполнителей Tasker.</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="first-block--container">
            <div class="mobile">
                <div class="row tiles">
                    <div class="col-6 col-md-3">
                        <div class="tiles--item tiles--item--fix2">
                            <div class="master">
                                <div class="row master__about">
                                    <div class="col-12">
                                        <img class="master__photo" src="{{asset('img/one.png')}}">
                                    </div>
                                </div>
                                <p class="master__reports master__reports--big-font">Укажите параметры задачи</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="tiles--item tiles--item--fix2">
                            <div class="master">
                                <div class="row master__about">
                                    <div class="col-12">
                                        <img class="master__photo" src="{{asset('img/two.png')}}">
                                    </div>
                                </div>
                                <p class="master__reports master__reports--big-font">Получите предложения</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="tiles--item tiles--item--fix2">
                            <div class="master">
                                <div class="row master__about">
                                    <div class="col-12">
                                        <img class="master__photo" src="{{asset('img/three.png')}}">
                                    </div>
                                </div>
                                <p class="master__reports master__reports--big-font">Выберите<br>лучшее</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="tiles--item">
                            <div class="master tiles--item--fix2">
                                <div class="row master__about">
                                    <div class="col-12">
                                        <img class="master__photo" src="{{asset('img/four.png')}}">
                                    </div>
                                </div>
                                <p class="master__reports master__reports--big-font">Оплата картой или наличными</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="desktop" style="margin-top: -50px;">
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
    <div class="first-block--color">
        <div class="first-block--container">
            <h3 class="first-block__header first-block__header--min first-block__header--always-left">Параметры задачи</h3>
            <div class="row">
                <div class="col-12 col-md-5 order-form">
                    <div id="container">
                        {!! $form_template !!}
                        {{--<h1 id="0" class="order-form__header">Что требуется убрать?</h1>
                        <textarea class="form__input-field" name="add_info" placeholder="Есть ли что либо, что мы не спросили?" rows="3"></textarea>--}}
                        {{--<label class="form__container form__container--without-margin">Квартира
                            <input type="radio" name="set" value="Квартира">
                            <span class="form__checkmark form__checkmark--radio"></span>
                        </label>
                        <label class="form__container form__container--without-margin">Частная постройка
                            <input type="radio" name="set" value="Частная постройка">
                            <span class="form__checkmark form__checkmark--radio"></span>
                        </label>
                        <label class="form__container form__container--without-margin">Офис
                            <input type="radio" name="set" value="Офис">
                            <span class="form__checkmark form__checkmark--radio"></span>
                        </label>
                        <label class="form__container form__container--without-margin">Нежилое помещение
                            <input type="radio" name="set" value="Нежилое помещение     ">
                            <span class="form__checkmark form__checkmark--radio"></span>
                        </label>--}}
                    </div>
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-6 col-md-4">
                            <button class="button button--blue button--full-container" id="next">Продолжить</button>
                        </div>
                        <div class="col-5 offset-1 col-md-4">
                            <button class="button button--white button--full-container" id="back">Назад</button>
                        </div>
                    </div>
                    <form style="display: none" action="{{route('miniOrder')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="text" name="service" id="service" value="{{$service}}">
                        <?php
                            $subcategory = \App\Subcategory::find($service);
                        ?>
                        <input type="text" name="header" value="{{$subcategory->category->name}}. {{$subcategory->name}}">
                        <input type="text" id="description" name="description" value="">
                        <input type="file" id="file" multiple name="files">
                        <input type="number" name="amount" id="amount" value="">
                        <input type="text" id="subway" name="subway">
                        <input type="number" id="master_id" name="master_id" value="">
                        <input type="text" id="end_date" name="date" value="">
                        <input type="submit" id="submit">
                    </form>
                </div>
                <div class="col-12 col-md-7 profile__container desktop--block">
                    @foreach($masters as $master)
                        <div class="row profile tiles--item">
                            <div class="col-12">
                                <p class="profile__name profile__name--min">{{$master->first_name}} {{$master->last_name}}</p>
                            </div>
                            <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                                <?php
                                $photo = $master->photos()->where('is_avatar', 1)->first();
                                ?>
                                @if($photo != null)
                                    <img class="profile__avatar" src="{{asset(Illuminate\Support\Facades\Storage::url($photo->name))}}">
                                @else
                                    <img class="profile__avatar" src="{{asset('img/no_photo.png')}}">
                                @endif
                            </div>
                            <div class="col-12 mobile">
                                <div class="master__rating">
                                    <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                    <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                    <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                    <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                    <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-9 col-md-9 col-lg-9">
                                <div class="col-12 profile__name__div">
                                    <p class="profile__name profile__name--max">{{$master->first_name}} {{$master->last_name}}</p>
                                </div>
                                <div class="col-12 master__rating master__rating--left-align desktop">
                                    <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                    <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                    <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                    <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                    <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                </div>
                                <div class="row profile__qualities">
                                    {{--<div class="col-2">--}}
                                    {{--<img class="profile__img" src="{{asset('img/complete-order.png')}}">--}}
                                    {{--</div>--}}
                                    <div class="col-12 align-self-center">
                                        <p class="profile__quality">Выполненных заданий - {{$master->work_orders()->where('status', 3)->count()}}</p>
                                    </div>
                                </div>
                                <div class="row profile__qualities">
                                    {{--<div class="col-2">--}}
                                    {{--<img class="profile__img" src="{{asset('img/positive-report.png')}}">--}}
                                    {{--</div>--}}
                                    <div class="col-12 align-self-center">
                                        <p class="profile__quality">Положительных отзывов - 92%</p>
                                    </div>
                                </div>
                                @if(($master->master_info->card_id != 1) or ($master->master_info->card_id != null))
                                <div class="row profile__qualities">
                                    {{--<div class="col-2">--}}
                                    {{--<img class="profile__img" src="{{asset('img/safety-deal.png')}}">--}}
                                    {{--</div>--}}
                                    <div class="col-12 align-self-center">
                                        <p class="profile__quality">Работает через безопасную сделку</p>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="row flex-row-reverse">
                                <div class="col-12 col-sm-9 col-md-9 col-lg-9">
                                    <p class="profile__about">"{{$master->master_info->about}}"</p>
                                </div>
                                <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                                    <button class="button button--grey button--price" onclick="choose_master({{$master->id}})">Связь с мастером</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{--<div class="row profile tiles--item">
                        <div class="col-12">
                            <p class="profile__name profile__name--min">Владимир Петров</p>
                        </div>
                        <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                            <img class="profile__avatar" src="{{asset('img/photo_2017-09-13_10-46-45.jpg')}}">
                        </div>
                        <div class="col-12 mobile">
                            <div class="master__rating">
                                <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-9 col-md-9 col-lg-9">
                            <div class="col-12 profile__name__div">
                                <p class="profile__name profile__name--max">Владимир Петров</p>
                            </div>
                            <div class="col-12 master__rating master__rating--left-align desktop">
                                <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                            </div>
                            <div class="row profile__qualities">
                                --}}{{--<div class="col-2">--}}{{--
                                --}}{{--<img class="profile__img" src="{{asset('img/complete-order.png')}}">--}}{{--
                                --}}{{--</div>--}}{{--
                                <div class="col-12 align-self-center">
                                    <p class="profile__quality">Выполненных заданий - 34</p>
                                </div>
                            </div>
                            <div class="row profile__qualities">
                                --}}{{--<div class="col-2">--}}{{--
                                --}}{{--<img class="profile__img" src="{{asset('img/positive-report.png')}}">--}}{{--
                                --}}{{--</div>--}}{{--
                                <div class="col-12 align-self-center">
                                    <p class="profile__quality">Положительных отзывов - 92%</p>
                                </div>
                            </div>
                            --}}{{--@if($master->safety == 1)--}}{{--
                            <div class="row profile__qualities">
                                --}}{{--<div class="col-2">--}}{{--
                                --}}{{--<img class="profile__img" src="{{asset('img/safety-deal.png')}}">--}}{{--
                                --}}{{--</div>--}}{{--
                                <div class="col-12 align-self-center">
                                    <p class="profile__quality">Работает через безопасную сделку</p>
                                </div>
                            </div>
                            --}}{{--@endif--}}{{--
                        </div>
                        <div class="row flex-row-reverse">
                            <div class="col-12 col-sm-9 col-md-9 col-lg-9">
                                <p class="profile__about">"Последние 15 лет своей жизни я посвятил сантехнике и всему, что с ней связано. За все эти годы я всегда успешно справлялся с поставленными задачами. Обращайтесь, буду рад помочь!"</p>
                            </div>
                            <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                                <button class="button button--grey button--price" --}}{{--onclick="location.href = '/profile/{{$master->id}}'"--}}{{-->Связь с мастером</button>
                            </div>
                        </div>
                    </div>
                    <div class="row profile tiles--item">
                        <div class="col-12">
                            <p class="profile__name profile__name--min">Геннадий Иванов</p>
                        </div>
                        <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                            <img class="profile__avatar" src="{{asset('img/photo_2017-09-13_18-50-29.jpg')}}">
                        </div>
                        <div class="col-12 mobile">
                            <div class="master__rating">
                                <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-9 col-md-9 col-lg-9">
                            <div class="col-12 profile__name__div">
                                <p class="profile__name profile__name--max">Геннадий Иванов</p>
                            </div>
                            <div class="col-12 master__rating master__rating--left-align desktop">
                                <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                                <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                            </div>
                            <div class="row profile__qualities">
                                --}}{{--<div class="col-2">--}}{{--
                                --}}{{--<img class="profile__img" src="{{asset('img/complete-order.png')}}">--}}{{--
                                --}}{{--</div>--}}{{--
                                <div class="col-12 align-self-center">
                                    <p class="profile__quality">Выполненный задания - 34</p>
                                </div>
                            </div>
                            <div class="row profile__qualities">
                                --}}{{--<div class="col-2">--}}{{--
                                --}}{{--<img class="profile__img" src="{{asset('img/positive-report.png')}}">--}}{{--
                                --}}{{--</div>--}}{{--
                                <div class="col-12 align-self-center">
                                    <p class="profile__quality">Положительных отзывов - 92%</p>
                                </div>
                            </div>
                            --}}{{--@if($master->safety == 1)--}}{{--
                            <div class="row profile__qualities">
                                --}}{{--<div class="col-2">--}}{{--
                                --}}{{--<img class="profile__img" src="{{asset('img/safety-deal.png')}}">--}}{{--
                                --}}{{--</div>--}}{{--
                                <div class="col-12 align-self-center">
                                    <p class="profile__quality">Работает через безопасную сделку</p>
                                </div>
                            </div>
                            --}}{{--@endif--}}{{--
                        </div>
                        <div class="row flex-row-reverse">
                            <div class="col-12 col-sm-9 col-md-9 col-lg-9">
                                <p class="profile__about">"Последние 15 лет своей жизни я посвятил сантехнике и всему, что с ней связано. За все эти годы я всегда успешно справлялся с поставленными задачами. Обращайтесь, буду рад помочь!"</p>
                            </div>
                            <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                                <button class="button button--grey button--price" --}}{{--onclick="location.href = '/profile/{{$master->id}}'"--}}{{-->Связь с мастером</button>
                            </div>
                        </div>
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="first-block mobile">
        <div class="col-12 col-md-7 profile__container">
            <div class="row profile tiles--item">
                <div class="col-12">
                    <p class="profile__name profile__name--min">Иван Иванов</p>
                </div>
                <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                    <img class="profile__avatar" src="{{asset('img/photo_2017-08-29_16-33-07.jpg')}}">
                </div>
                <div class="col-12 mobile">
                    <div class="master__rating">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                    </div>
                </div>
                <div class="col-12 col-sm-9 col-md-9 col-lg-9">
                    <div class="col-12 profile__name__div">
                        <p class="profile__name profile__name--max">Иван Иванов</p>
                    </div>
                    <div class="col-12 master__rating master__rating--left-align desktop">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                    </div>
                    <div class="row profile__qualities">
                        {{--<div class="col-2">--}}
                        {{--<img class="profile__img" src="{{asset('img/complete-order.png')}}">--}}
                        {{--</div>--}}
                        <div class="col-12 align-self-center">
                            <p class="profile__quality">Выполненных заданий - 34</p>
                        </div>
                    </div>
                    <div class="row profile__qualities">
                        {{--<div class="col-2">--}}
                        {{--<img class="profile__img" src="{{asset('img/positive-report.png')}}">--}}
                        {{--</div>--}}
                        <div class="col-12 align-self-center">
                            <p class="profile__quality">Положительных отзывов - 92%</p>
                        </div>
                    </div>
                    {{--@if($master->safety == 1)--}}
                    <div class="row profile__qualities">
                        {{--<div class="col-2">--}}
                        {{--<img class="profile__img" src="{{asset('img/safety-deal.png')}}">--}}
                        {{--</div>--}}
                        <div class="col-12 align-self-center">
                            <p class="profile__quality">Работает через безопасную сделку</p>
                        </div>
                    </div>
                    {{--@endif--}}
                </div>
                <div class="row flex-row-reverse">
                    <div class="col-12 col-sm-9 col-md-9 col-lg-9">
                        <p class="profile__about">"Последние 15 лет своей жизни я посвятил сантехнике и всему, что с ней связано. За все эти годы я всегда успешно справлялся с поставленными задачами. Обращайтесь, буду рад помочь!"</p>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                        <button class="button button--grey button--price" {{--onclick="location.href = '/profile/{{$master->id}}'"--}}>Связь с мастером</button>
                    </div>
                </div>
            </div>
            <div class="row profile tiles--item">
                <div class="col-12">
                    <p class="profile__name profile__name--min">Владимир Петров</p>
                </div>
                <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                    <img class="profile__avatar" src="{{asset('img/photo_2017-09-13_10-46-45.jpg')}}">
                </div>
                <div class="col-12 mobile">
                    <div class="master__rating">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                    </div>
                </div>
                <div class="col-12 col-sm-9 col-md-9 col-lg-9">
                    <div class="col-12 profile__name__div">
                        <p class="profile__name profile__name--max">Владимир Петров</p>
                    </div>
                    <div class="col-12 master__rating master__rating--left-align desktop">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                    </div>
                    <div class="row profile__qualities">
                        {{--<div class="col-2">--}}
                        {{--<img class="profile__img" src="{{asset('img/complete-order.png')}}">--}}
                        {{--</div>--}}
                        <div class="col-12 align-self-center">
                            <p class="profile__quality">Выполненных заданий - 34</p>
                        </div>
                    </div>
                    <div class="row profile__qualities">
                        {{--<div class="col-2">--}}
                        {{--<img class="profile__img" src="{{asset('img/positive-report.png')}}">--}}
                        {{--</div>--}}
                        <div class="col-12 align-self-center">
                            <p class="profile__quality">Положительных отзывов - 92%</p>
                        </div>
                    </div>
                    {{--@if($master->safety == 1)--}}
                    <div class="row profile__qualities">
                        {{--<div class="col-2">--}}
                        {{--<img class="profile__img" src="{{asset('img/safety-deal.png')}}">--}}
                        {{--</div>--}}
                        <div class="col-12 align-self-center">
                            <p class="profile__quality">Работает через безопасную сделку</p>
                        </div>
                    </div>
                    {{--@endif--}}
                </div>
                <div class="row flex-row-reverse">
                    <div class="col-12 col-sm-9 col-md-9 col-lg-9">
                        <p class="profile__about">"Последние 15 лет своей жизни я посвятил сантехнике и всему, что с ней связано. За все эти годы я всегда успешно справлялся с поставленными задачами. Обращайтесь, буду рад помочь!"</p>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                        <button class="button button--grey button--price" {{--onclick="location.href = '/profile/{{$master->id}}'"--}}>Связь с мастером</button>
                    </div>
                </div>
            </div>
            <div class="row profile tiles--item">
                <div class="col-12">
                    <p class="profile__name profile__name--min">Геннадий Иванов</p>
                </div>
                <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                    <img class="profile__avatar" src="{{asset('img/photo_2017-09-13_18-50-29.jpg')}}">
                </div>
                <div class="col-12 mobile">
                    <div class="master__rating">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                    </div>
                </div>
                <div class="col-12 col-sm-9 col-md-9 col-lg-9">
                    <div class="col-12 profile__name__div">
                        <p class="profile__name profile__name--max">Геннадий Иванов</p>
                    </div>
                    <div class="col-12 master__rating master__rating--left-align desktop">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                        <img class="rating-star rating-star--big" src="{{asset('img/star.png')}}">
                    </div>
                    <div class="row profile__qualities">
                        {{--<div class="col-2">--}}
                        {{--<img class="profile__img" src="{{asset('img/complete-order.png')}}">--}}
                        {{--</div>--}}
                        <div class="col-12 align-self-center">
                            <p class="profile__quality">Выполненный задания - 34</p>
                        </div>
                    </div>
                    <div class="row profile__qualities">
                        {{--<div class="col-2">--}}
                        {{--<img class="profile__img" src="{{asset('img/positive-report.png')}}">--}}
                        {{--</div>--}}
                        <div class="col-12 align-self-center">
                            <p class="profile__quality">Положительных отзывов - 92%</p>
                        </div>
                    </div>
                    {{--@if($master->safety == 1)--}}
                    <div class="row profile__qualities">
                        {{--<div class="col-2">--}}
                        {{--<img class="profile__img" src="{{asset('img/safety-deal.png')}}">--}}
                        {{--</div>--}}
                        <div class="col-12 align-self-center">
                            <p class="profile__quality">Работает через безопасную сделку</p>
                        </div>
                    </div>
                    {{--@endif--}}
                </div>
                <div class="row flex-row-reverse">
                    <div class="col-12 col-sm-9 col-md-9 col-lg-9">
                        <p class="profile__about">"Последние 15 лет своей жизни я посвятил сантехнике и всему, что с ней связано. За все эти годы я всегда успешно справлялся с поставленными задачами. Обращайтесь, буду рад помочь!"</p>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                        <button class="button button--grey button--price" {{--onclick="location.href = '/profile/{{$master->id}}'"--}}>Связь с мастером</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        /*let stack = {};
        let file;
        $('#categories').change(function () {
            file = $(this).val();
            $.ajax({
                method: "GET",
                url: '/next_step',
                data: {file: file, begin:true},
                success: function (html) {
                    
                }
            });
        })*/
    </script>
    <script>
        $('input[type=file]').click(function () {
            $('#file').trigger('click');
        });
        let stack = {};
        let custom = false;
        $('#next').click(function (evt) {
            let inputs = $('input:checked, input[type=text], input[type=number], textarea, select').not('form > input');
            console.log(inputs);
            let service = $('#service_file').val();
            $('service').val(service);
            let name = $('[name = header]').html();
            let id = $('[name = header]').attr('id');
            let value = {};
            let desc = $('#description');
            if(id !== "102" && id !== "103" && id !== "104"){
                desc.val(desc.val() + '\r\n' + name + ': ')
            }
            $.each(inputs, function (key, value1) {
                if(id === "102") {
                    $('#subway').val($(value1).val());
                } else if(id === "103"){
                    $('#end_date').val($(value1).val());
                } else if(id === "104"){
                    $('#amount').val(($(value1).val()));
                    $('#submit').trigger('click');
                } else {
                    //let desc = $('#description');
                    desc.val(desc.val() + $(value1).val() + '; ');
                }
                //console.log(desc.val());
                if($(value1).attr('type') === 'file'){
                    value[$(value1).attr('name')] = $(value1).prop('files')[0];
                } else {
                    value[$(value1).attr('name')] = $(value1).val();
                }
            });

            stack[id] = value;

            //console.log(stack);

            if(!custom) {
                $.ajax({
                    method: 'GET',
                    url: '/next_step',
                    data: {name: name, step: value, service: service},
                    success: function (html) {
                        if (html === "custom end") {
                            custom = true;
                            $('#container').html('<h1 id="100" name="header" class="order-form__header">Дополнительные пожелания</h1>\n' +
                                '                 <textarea class="form__input-field" name="add_info" placeholder="Есть ли что либо, что мы не спросили?" rows="3"></textarea>');
                        } else {
                            $('#container').html(html);
                        }
                    }
                })
            } else {
                switch (id) {
                    case "100":
                        $('#container').html('<h1 id="101" name="header" class="order-form__header">Дополнительные фото:</h1>\n' +
                            '<input type="file" class="form__input-field" name="files" placeholder="Выберите файлы">');
                        break;
                    case "101":
                        $('#container').html('<h1 id="102" name="header" class="order-form__header">Станция метро:</h1>\n'+
                            '{!! $subways !!}');
                        $('#next').html('Отправить');
                        break;
                    case "102":
                        $('#container').html('<h1 id="103" name="header" class="order-form__header">Дата акутальности</h1>\n' +
                            '<input type="text" id="date" class="form__input-field" name="amount" placeholder="Введите дату">');
                        break;
                    case "103":
                        $('#container').html('<h1 id="104" name="header" class="order-form__header">Предпологаемый бюджет:</h1>\n' +
                            '<input type="number" class="form__input-field" name="amount" placeholder="Введите сумму">');
                        break;
                    //case "103":

                        /*let formData = new FormData();

                        $.each(stack, function (key, value) {
                            for (let i in value){
                                if(value.hasOwnProperty(i)) {
                                    let key1 = i;
                                    let value1 = value[i];
                                    formData.append(key1, value1);
                                }
                            }
                        });*/

                        /*let request = new XMLHttpRequest();
                        request.open("GET", "/search/save_new_order");
                        request.send(formData);*/
                        /*formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

                        $.ajax({
                            method: "Get",
                            url: "/save_new_order",
                            //dataType: 'json',
                            data: formData,
                            processData: false,  // tell jQuery not to process the data
                            contentType: 'multipart/form-data',
                            success: function (html) {
                                $('#container').html(html);
                            }
                        });
                        break;*/
                }
            }
        });
        /*let stack = {};
        let custom = false;
        $('#next').click(function (evt) {
            //console.log($('input:checked').val());
            let inputs = $('input:checked, input[type=text], input[type=file], textarea, select');
            let service = $('#service_file').val();
            let name = $('[name = header]').html();
            let id = $('[name = header]').attr('id');
            let value = {};
            $.each(inputs, function (key, value1) {
                if($(value1).attr('type') === 'file'){
                    value[$(value1).attr('name')] = $(value1).prop('files')[0];
                } else {
                    value[$(value1).attr('name')] = $(value1).val();
                }
            });

            stack[id] = value;

            //console.log(stack);
            
            if(!custom) {
                $.ajax({
                    method: 'GET',
                    url: '/next_step',
                    data: {name: name, step: value, service: service},
                    success: function (html) {
                        if (html === "custom end") {
                            custom = true;
                            $('#container').html('<h1 id="100" name="header" class="order-form__header">Дополнительные пожелания</h1>\n' +
                                '                 <textarea class="form__input-field" name="add_info" placeholder="Есть ли что либо, что мы не спросили?" rows="3"></textarea>');
                        } else {
                            $('#container').html(html);
                        }
                    }
                })
            } else {
                switch (id) {
                    case "100":
                        $('#container').html('<h1 id="101" name="header" class="order-form__header">Дополнительные фото:</h1>\n' +
                                             '<input type="file" class="form__input-field" name="files" placeholder="Выберите файлы">');
                        break;
                    case "101":
                        $('#container').html('<h1 id="102" name="header" class="order-form__header">Станция метро:</h1>\n'+
                            '{!! $subways !!}');
                        $('#next').html('Отправить');
                        break;
                    case "102":
                        let formData = new FormData();

                        $.each(stack, function (key, value) {
                            for (let i in value){
                                if(value.hasOwnProperty(i)) {
                                    let key1 = i;
                                    let value1 = value[i];
                                    formData.append(key1, value1);
                                }
                            }
                        });

                        /!*let request = new XMLHttpRequest();
                        request.open("GET", "/search/save_new_order");
                        request.send(formData);*!/
                        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

                        $.ajax({
                            method: "Get",
                            url: "/save_new_order",
                            //dataType: 'json',
                            data: formData,
                            processData: false,  // tell jQuery not to process the data
                            contentType: 'multipart/form-data',
                            success: function (html) {
                                $('#container').html(html);
                            }
                        });
                        break;
                }
            }
        });*/

        $('#back').click(function(){
            let length = Object.keys(stack).length;
            let value = stack[length - 1];
            let stack_key = Object.keys(stack);
            delete stack[length-1];
            //console.log(stack);
            //console.log(value)
            $.ajax({
                method: 'GET',
                url: '/prev_step',
                data: {id: stack_key[length - 1], step: value},
                success: function (html) {
                    $('#container').html(html);
                }
            })
        });

        function choose_master(id) {
            $('#master_id').val(id);
            $('#submit').trigger('click');
        }
    </script>
@endsection