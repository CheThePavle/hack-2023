@extends('layouts.layout')

@section('head')
    <title>{{ $event->name_event }}</title>
@endsection

@section('content')
    <main class="ivent">
        <div class="iventInner">

            <div class="iventImg">
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

            @if(!auth()->check() || !auth()->user()->checkOrganizer())
                <form action="{{ route('createTicket') }}" method="post" class="iventTable">
                    @csrf
                    <div class="iventTable-name">
                        <h1>Выбор билета</h1>
                    </div>

                    <div class="iventTable-table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Тип билета</th>
                                <th>Цена</th>
                                <th>Кол-во</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($typeTickets as $item)
                                <tr>
                                    <td>{{ $item->name_type_ticket }}</td>
                                    <td>{{ $item->price_type_ticket }} руб.</td>
                                    <td>
                                        <div class="tableBlock">
                                            <input value="0" name="type_tickets[{{ $item->id_type_ticket }}]" min="0" type="number" max="{{ $item->size_type_ticket - $item->count_buy_tickets }}">
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="error">
                        @if ($errors->any())
                            @foreach($errors->all() as $error)
                                {{ $error }} <br>
                            @endforeach
                        @endif
                    </div>

                    <div class="iventTable-button">
                        <button type="submit" class="pointer">Купить</button>
                    </div>
                </form>
            @endif

            <div class="iventProfil">
                <div class="iventProfil-photo">
                    <img src="{{ asset('assets/img/user.png') }}"/>
                </div>
                <div class="iventProfil-name">
                    <p>Организатор: {{ $event->organizer->last_name }} {{ $event->organizer->name }} {{ $event->organizer->patronymic }} ({{ $event->organizer->phone }})</p>
                </div>
            </div>

            @if(!auth()->check() || !auth()->user()->checkOrganizer())
                <form id="questionForm" action="{{ route('createQuestion') }}" method="post" class="iventQuestion">
                    @csrf
                    <input type="hidden" name="id_event" value="{{ $event->id_event }}">
                    <div class="iventQuestion-name">
                        <h1>Остались вопросы?</h1>
                    </div>
                    <div class="iventQuestion-input">
                        <input required name="name_question" type="text" placeholder="Организатор ответит на ваш вопрос в ближайшее время">
                    </div>
                    <div class="error">
                        @if ($errors->any())
                            @foreach($errors->all() as $error)
                                {{ $error }} <br>
                            @endforeach
                        @endif
                    </div>
                    <div class="msg">{{ session('msg') }}</div>
                    <div class="iventQuestion-button">
                        <button type="submit" class="pointer">Отправить вопрос</button>
                    </div>
                </form>
            @endif

            <div class="iventHistory">
                <div class="iventHistory-name">
                    @if(count($questions) > 0)
                        <h1>Ответы организаторов</h1>
                    @endif
                </div>
                <div class="iventHistory-chat" id="questionReply">
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
                            @if(!auth()->check() || auth()->user()->checkOrganizer() && $question->reply_question == '')
                                <form action="{{ route('replyQuestion', ['id' => $question->id_question]) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <textarea name="reply_question" rows="5" style="width: 100%" required></textarea>
                                    <button type="submit">Ответить</button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </main>
@endsection
