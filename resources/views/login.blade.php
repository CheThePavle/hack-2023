@extends('layouts.layout')

@section('head')
    <title>Имя</title>
@endsection

@section('content')
    <main class="login">
        <div class="loginInner">

            <div class="loginInner-block">
                <div class="loginBlock-name">
                    <h1>Вход</h1>
                </div>
                <form action="{{ route('authUser') }}" method="post" class="loginBlock-input">
                    @csrf
                    <input value="{{ old('email') ?? '' }}" required name="email" type="email" maxlength="255" placeholder="E-mail" class="LoginInput">
                    </br>
                    <input required name="password" type="password" maxlength="255" placeholder="Пароль" class="LoginInput">
                    </br>
                    <div class="error">
                        @if ($errors->any())
                            @foreach($errors->all() as $error)
                                {{ $error }} <br>
                            @endforeach
                        @endif
                    </div>
                    <div class="msg">{{ session('msg') }}</div>
                    <button class="loginButton pointer" type="submit">Войти</button></br>
                </form>
                <div class="loginBlock-info">
                    <a href="{{ route('register') }}">Еще нет аккаунта? Зарегистрироваться</a>
                </div>
            </div>

        </div>
    </main>
@endsection
