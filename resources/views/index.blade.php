@extends('layouts.layout')

@section('head')
    <title>Главная страница</title>
@endsection

@section('content')
    <main class="main">
        <div class="mainInner">

            <div class="mainBanner">
                <img src="{{ asset('assets/img/banner.jpg') }}">
            </div>

            @foreach($categories as $category)
                @if(count($category['events']) > 0)
                    <div class="mainInner-block">
                        <div class="mainBlock-name">
                            <h1>{{ $category->name_category }}</h1>
                        </div>

                        <div class="mainBlock-content">
                            @foreach($category['events'] as $event)
                                <div class="mainContent-block">
                                    <div class="mainContent-img">
                                        <img src="{{ $event->url_event }}">
                                    </div>
                                    <div class="mainContent-info">
                                        <div class="mainContent-name">
                                            <h3>{{ $event->name_event }}</h3>
                                        </div>
                                        <div class="mainContent-name">
                                            <h3>Адрес: {{ $event->address_event }}</h3>
                                        </div>
                                        <div class="mainContent-datе">
                                            <p>Дата и время: с {{ $event->beg_date_event }} по {{ $event->end_date_event }}</p>
                                        </div>
                                        <div>
                                            <a href="{{ route('event', ['id' => $event->id_event]) }}">Подробнее</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </main>
@endsection
