@extends('layouts.auth')

@section('title', 'Вход')

@section('styles')
    <link href="{{asset('css/general.less')}}?v=001" type="text/css" rel="stylesheet/less"/>
    <link href="{{asset('css/auth.less')}}?v=001" type="text/css" rel="stylesheet/less"/>
    {{--<link href="{{asset('css/search.less')}}" type="text/css" rel="stylesheet/less"/>--}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" ></script>
@endsection
@section('body')
    <div class="my-container">
        <div class="row">
            <div class="col-12 back">
                <a href="javascript:void(0)" class="back__close" onclick="location.href='/'">&times</a>
            </div>
            <div class="col-12">
                <h3 class="header">Вход</h3>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-container form-container--right-border">
                    <form class="form" method="post" action="{{route('login')}}">
                        {{csrf_field()}}
                        @if (session('unsuccess'))
                            <div class="row">
                                <p class="form__error">{{session('unsuccess')}}</p>
                            </div>
                        @endif
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
                        <input type="hidden" name="user_type" value="0">
                        <div class="row">
                            <div class="col-12">
                                <input type="submit" value="OK" class="button button--blue button--center button--full-container" tabindex="2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="register">У вас нет аккаунта? <a class="register--link" href="/registration">Регистрация</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
