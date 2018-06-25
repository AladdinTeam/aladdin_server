@extends('layouts.auth')

@section('styles')
    <link href="{{asset('css/general.less')}}" type="text/css" rel="stylesheet/less"/>
    <link href="{{asset('css/auth.less')}}" type="text/css" rel="stylesheet/less"/>
    {{--<link href="{{asset('css/search.less')}}" type="text/css" rel="stylesheet/less"/>--}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" ></script>
@endsection

@section('title', 'Регистрация')

@section('body')
    <div class="my-container">
        <div class="row">
            <div class="col-12 back">
                <a href="javascript:void(0)" class="back__close" onclick="location.href='/'">&times</a>
            </div>
            <div class="col-12">
                <h3 class="header">Регистрация</h3>
            </div>
            <div class="col-12 col-md-6 offset-md-6">
                <div class="form-container form-container--left-border">
                    <form class="form" method="post" action="{{ route('register') }}">
                        {{csrf_field()}}
                        @if (session('unsuccess'))
                            <div class="row">
                                <p class="form__error">{{session('unsuccess')}}</p>
                            </div>
                        @endif
                        <input type="hidden" name="user_type" value="0">
                        <div class="row">
                            <div class="col-12">
                                <input id="phone" name="phone" type="text" class="form__input-field"
                                       placeholder="Введите телефон" autocomplete="off" value="{{old('phone')}}" tabindex="1">
                            </div>
                        </div>
                        @if($errors->has("phone"))
                            @foreach ($errors->get("phone") as $error)
                                <label class="form__error">{{$error}}</label>
                            @endforeach
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <input id="email" name="email" type="email" class="form__input-field"
                                       value="{{ old('email') }}" placeholder="Введите e-mail" tabindex="2">
                            </div>
                        </div>
                        @if($errors->has("email"))
                            @foreach ($errors->get("email") as $error)
                                <label class="form__error">{{$error}}</label>
                            @endforeach
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <input id="first_name" name="first_name" type="text" class="form__input-field"
                                       value="{{ old('first_name') }}" placeholder="Введите фамилию" tabindex="3">
                            </div>
                        </div>
                        @if($errors->has("first_name"))
                            @foreach ($errors->get("first_name") as $error)
                                <label class="form__error">{{$error}}</label>
                            @endforeach
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <input id="last_name" name="last_name" type="text" class="form__input-field"
                                       value="{{ old('last_name') }}" placeholder="Введите имя" tabindex="4">
                            </div>
                        </div>
                        @if($errors->has("last_name"))
                            @foreach ($errors->get("last_name") as $error)
                                <label class="form__error">{{$error}}</label>
                            @endforeach
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <input type="submit" value="РЕГИСТРАЦИЯ"
                                       class="button button--blue button--center button--full-container" tabindex="5">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="register">У вас нет аккаунта? <a class="register--link" href="/login">Вход</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
