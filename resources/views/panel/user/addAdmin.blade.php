@extends('layouts.panel')

@section('head')
    <title>Добавление админа</title>
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Добавление админа</h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Админ</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('createAdmin') }}" method="post" class="user">
                    @csrf
                    <div class="form-group">
                        <input value="{{ old('last_name') ?? '' }}" maxlength="255" name="last_name" type="text" class="form-control form-control-user" placeholder="Фамилия*">
                    </div>
                    <div class="form-group">
                        <input value="{{ old('name') ?? '' }}" maxlength="255" name="name" type="text" class="form-control form-control-user" placeholder="Имя*">
                    </div>
                    <div class="form-group">
                        <input value="{{ old('patronymic') ?? '' }}" maxlength="255" name="patronymic" type="text" class="form-control form-control-user" placeholder="Отчество*">
                    </div>
                    <div class="form-group">
                        <input value="{{ old('email') ?? '' }}" maxlength="255" name="email" type="email" class="form-control form-control-user" placeholder="E-mail*">
                    </div>
                    <div class="form-group">
                        <input value="{{ old('phone') ?? '' }}" maxlength="11" name="phone" type="tel" class="form-control form-control-user" placeholder="Телефон*">
                    </div>
                    <div class="form-group">
                        <input maxlength="255" name="password" type="password" class="form-control form-control-user" placeholder="Пароль*">
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{ $error }} <br>
                            @endforeach
                        </div>
                    @endif

                    <button type="submit" class="btn btn-primary">
                        Добавить
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
