@extends('layouts.layout')

@section('head')
    <title>Регистрация</title>
@endsection

@section('content')
    <main class="login">
        <div class="loginInner">

            <div class="loginInner-block">
                <div class="loginBlock-name">
                    <h1>Регистрация</h1>
                </div>
                <form action="{{ route('createUser') }}" method="post" class="loginBlock-input">
                    @csrf
                    <input value="{{ old('last_name') ?? '' }}" name="last_name" type="text" maxlength="255" placeholder="Фамилия*" class="inputline" required></br>

                    <input value="{{ old('name') ?? '' }}" name="name" type="text" maxlength="255" placeholder="Имя*" class="inputline" required></br>

                    <input value="{{ old('patronymic') ?? '' }}" name="patronymic" type="text" maxlength="255" placeholder="Отчество*" class="inputline" required></br>

                    <input value="{{ old('email') ?? '' }}" name="email" type="email" maxlength="255" placeholder="E-mail*" class="inputline" required></br>

                    <input value="{{ old('phone') ?? '' }}" name="phone" type="tel" maxlength="11" placeholder="Телефон*" class="inputline" required></br>

                    <input name="password" type="password" maxlength="255" placeholder="Пароль*" class="inputline" required></br>

                    <div class="registerFlag">
                        <input {{ old('org') ? 'checked' : '' }} class="pointer" name="org" type="checkbox" id="org">
                        <label class="pointer" for="org">Я хочу быть организатором</label>
                    </div>

                    <div class="registerFlag">
                        <input class="pointer" type="checkbox" id="accept" required>
                        <label class="pointer" for="accept">Согласен на обработку персональных данных</label>
                    </div>

                    <div class="error">
                        @if ($errors->any())
                            @foreach($errors->all() as $error)
                                {{ $error }} <br>
                            @endforeach
                        @endif
                    </div>

                    <button class="loginButton pointer" type="submit">Зарегистрироваться</button></br>
                </form>
            </div>

        </div>
    </main>
@endsection
