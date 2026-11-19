<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/png" />
    @yield('head')
</head>

<body>

<header class="header">
    <div class="headerInner">

        <div class="headerLogo">
            <a href="{{ route('index') }}">
                <img src="{{ asset('assets/img/logo.png') }}" width="200px">
            </a>
        </div>

        <div class="headerNav">
            <ul>
                <li><a href="{{ route('index') }}">Мероприятия</a></li>
                @auth()
                    @if(auth()->user()->checkAdmin() || auth()->user()->checkOperator())
                        <li><a href="{{ route('admin') }}">Админ панель</a></li>
                    @else
                        <li><a href="{{ auth()->user()->checkOrganizer() ? route('lkOrganizer') : route('lk') }}">Личный кабинет</a></li>
                    @endif
                    <li><a href="{{ route('logoutUser') }}">Выход</a></li>
                @else
                    <li><a href="{{ route('login') }}">Вход</a></li>
                    <li><a href="{{ route('register') }}">Регистрация</a></li>
                @endauth
            </ul>
        </div>

    </div>
</header>

    @yield('content')

<footer class="footer">
    <div class="footerInner">

        <div class="footerInner-block">
            <div class="footerBlock-name">
                <img src="{{ asset('assets/img/logo.png') }}" width="250px">
            </div>
            <div class="footerBlock-nav">
                <ul>
                    <li><a href="{{ route('index') }}">Мероприятия</a></li>
                    @auth()
                        <li><a href="{{ route('lk') }}">Личный кабинет</a></li>
                        <li><a href="{{ route('logoutUser') }}">Выход</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Вход</a></li>
                        <li><a href="{{ route('register') }}">Регистрация</a></li>
                    @endauth
                </ul>
            </div>
            <div class="footerBlock-info">
                <a href="tel:+79512155511">+79512155511</a>
            </div>
        </div>

    </div>
</footer>

</body>

</html>
