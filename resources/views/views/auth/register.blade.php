@extends('layouts.auth')

{{--@section('mobile-logo')
    <a href="/"><img class="logo-img" src="{{ asset('img/new_logo.png') }}"></a>
@endsection
@section('desktop-logo')
    <a href="/"><img class="logo-img" src="{{ asset('img/new_logo.png') }}"></a>
@endsection--}}
@section('styles')
    <link href="{{asset('css/general.less')}}" type="text/css" rel="stylesheet/less"/>
    <link href="{{asset('css/styles.less')}}" type="text/css" rel="stylesheet/less"/>
    {{--<link href="{{asset('css/search.less')}}" type="text/css" rel="stylesheet/less"/>--}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" ></script>
@endsection

@section('title', 'Регистрация')

@section('body')
    <div class="background">
        <div class="row">
            <div class="col-12">
                {{--<div class="row">
                    <h3 class="center-align">Регистрация</h3>
                </div>--}}
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
                        <form class="form" method="post" action="{{ route('register') }}">

                            {{csrf_field()}}

                            @if (session('unsuccess'))
                                <div class="row">
                                    <p class="error">{{session('unsuccess')}}</p>
                                </div>
                            @endif

                            {{--<div class="row">
                                <div class="col-6">
                                    <input name="user_type" type="radio" id="user_type_master" value="1"/>
                                    <label for="user_type_master">Мастер</label>
                                </div>
                                <div class="col-6">
                                    <input name="user_type" type="radio" id="user_type_client" value="0" checked/>
                                    <label for="user_type_client">Клиент</label>
                                </div>
                            </div>--}}
                            <input type="hidden" name="user_type" value="0">
                            <div class="row">
                                <div class="col-12">
                                    <!--<i class="material-icons prefix">phone</i>-->
                                    <input id="phone" name="phone" type="text" class="input_field_auth" placeholder="Введите телефон">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <!--<i class="material-icons prefix">email</i>-->
                                    <input id="email" name="email" type="email" class="input_field_auth" value="{{ old('email') }}" placeholder="Введите e-mail">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <!--<i class="material-icons prefix">edit</i>-->
                                    <input id="first_name" name="first_name" type="text" class="input_field_auth" value="{{ old('first_name') }}" placeholder="Введите фамилию">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <!--<i class="material-icons prefix">edit</i>-->
                                    <input id="last_name" name="last_name" type="text" class="input_field_auth" value="{{ old('last_name') }}" placeholder="Введите имя">
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <input type="submit" value="Регистрация" class="button">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
