@extends('layouts.auth')

@section('title', 'Войти')

{{--@section('mobile-logo')
    <a href="/"><img class="logo-img" src="{{ asset('img/new_logo.png') }}"></a>
@endsection
@section('desktop-logo')
    <a href="/"><img class="logo-img" src="{{ asset('img/new_logo.png') }}"></a>
@endsection--}}

{{--@section('title', 'Профиль')--}}
@section('body')
    <div class="background">
        {{--<div class="row">
            <h3 class="header">Войти</h3>
        </div>--}}
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
                <form class="form" method="post" action="{{route('login')}}">
                    {{csrf_field()}}
                    @if (session('unsuccess'))
                        <div class="row">
                            <p class="error">{{session('unsuccess')}}</p>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-12">
                            <!--<i class="material-icons prefix">phone</i>-->
                            <input id="phone" name="phone" type="text" class="input_field_auth" placeholder="Введите телефон">
                        </div>
                    </div>
                    {{--<div class="row user-type">
                        <div class="col-6">
                            <input name="user_type" type="radio" id="user_type_master" value="1" {{old('user_type') == 1 ? 'checked' : ''}}/>
                            <label class="label" for="user_type_master">Мастер</label>
                        </div>
                        <div class="col-6">
                            <input name="user_type" type="radio" id="user_type_client" value="0" {{old('user_type') == 0 ? 'checked' : ''}}/>
                            <label class="label" for="user_type_client">Клиент</label>
                        </div>
                    </div>--}}
                    <input type="hidden" name="user_type" value="0">
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Войти" class="button">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
