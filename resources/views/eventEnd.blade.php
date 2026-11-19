@extends('layouts.layout')

@section('head')
    <title>{{ $event->name_event }} - Архив</title>
@endsection

@section('content')
    <main class="ivent">
        <div class="iventInner">

            <div class="iventNameEnd">
                <h1>Мероприятие прошло</h1>
            </div>

            <div class="iventImgEnd">
                <img src="/{{ $event->url_event }}">
            </div>

            <div class="iventName">
                <h1>{{ $event->name_event }}</h1>
            </div>

            <div class="ivetnDescription">
                <p>Категория: {{ $event->category->name_category }}</p>
                <p>Дата и время: с {{ $event->beg_date_event }} до {{ $event->end_date_event }}</p>
                <p>Адрес: {{ $event->address_event }}</p>
            </div>

            <div class="iventInfo">
                <p>{{ $event->description_event }}</p>
            </div>

            <div class="iventTable">
                <div class="iventTable-name">
                    <h1>Билеты</h1>
                </div>

                <div class="iventTable-table">
                    <table class="table_cb">
                        <thead>
                        <tr class="cb_tr">
                            <th class="cb_th">Тип билета</th>
                            <th class="cb_th">Цена</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($typeTickets as $item)
                                <tr class="cb_tr">
                                    <td class="cb_td">{{ $item->name_type_ticket }}</td>
                                    <td class="cb_td">{{ $item->price_type_ticket }} руб.</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="iventProfil">
                <div class="iventProfil-photo">
                    <img src="{{ asset('assets/img/user.png') }}"/>
                </div>
                <div class="iventProfil-name">
                    <p>Организатор: {{ $event->organizer->last_name }} {{ $event->organizer->name }} {{ $event->organizer->patronymic }} ({{ $event->organizer->phone }})</p>
                </div>
            </div>

            @if(auth()->user()->checkOrganizer())
                <div class="iventQuestion">
                    <div class="iventQuestion-button">
                        <button class="pointer">Загрузить видеозаписи</button>
                        <button class="pointer">Посмотреть видеозаписи</button>
                        <p>*Данные записи увидят только те, пользователи, у которых куплен билет. Ссылку на видео нельзя будет выложить или поделиться ей с каким-либо лицом</p>
                    </div>
                </div>
            @else
                <div class="iventQuestion">
                    <div class="iventQuestion-button">
                        <button class="pointer">Посмотреть видеозаписи</button>
                    </div>
                </div>
            @endif

            <div class="iventHistory">
                <div class="iventHistory-name">
                    @if(count($questions) > 0)
                        <h1>История вопросов и ответов</h1>
                    @endif
                </div>
                <div class="iventHistory-chat">
                    @foreach($questions as $question)
                        <div class="iventChat-block">
                            <div class="iventChat-blockInfo">
                                <p class="textBold">{{ $question->user->last_name }} {{ $question->user->name }} {{ $question->user->patronymic }}</p>
                                <p class="textMgb">{{ $question->name_question }}</p>
                                <p class="textDate">{{ $question->date_question }}</p>
                            </div>
                            @if($question->reply_question)
                                <div class="iventChat-blockInfo2">
                                    <p class="textBold">Ответ</p>
                                    <p class="textMgb">{{ $question->reply_question }}</p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </main>
@endsection
