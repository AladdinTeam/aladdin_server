@extends('layouts.app')

@section('mobile-logo')
    <a href="/"><img class="logo-img" src="{{ asset('img/grey_logo.png') }}"></a>
@endsection
@section('desktop-logo')
    <a href="/"><img class="logo-img" src="{{ asset('img/new_logo.png') }}"></a>
@endsection
@section('title', 'Мои заявки')