@extends('layouts.layout')

@section('head')
    <title>404 Page Not Found</title>
@endsection

@section('content')
    <h1 style="max-width: 1000px; margin: 0 auto; text-align: center; padding: 20px">
        404 Page Not Found
        <a href="{{ route('index') }}">Вернуться на главную</a>
    </h1>
@endsection
