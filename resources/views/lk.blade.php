@extends('layouts.layout')

@section('head')
    <title>Личный кабинет</title>
@endsection

@section('content')
    <main class="main">
        <div class="mainInner">

            <div class="profilName">
                <div class="profilName-name">
                    <h1>Личный кабинет</h1>
                </div>
                <div class="profilBlock">
                    <div class="profilBlock-info">
                        <div class="profilInfo-img">
                            <img src="{{ asset('assets/img/user.png') }}"/>
                        </div>
                        <div class="profilInfo-name">
                            <h1>{{ auth()->user()->last_name }} {{ auth()->user()->name }} {{ auth()->user()->patronymic }}</h1>
                            <p>{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    <div class="profilBlock-time">
                        <div class="profilTime-time">
                            <h1>{{ $next_beg_date_event }} дн.</h1>
                        </div>
                        <div class="profilTime-text">
                            <p>До ближайшего мероприятия</p>
                        </div>
                    </div>
                </div>
            </div>

            @if(count($ticketsEvents) > 0)
                <div class="profilTable">

                    <div class="profilTable-table">
                        <table>
                            <thead>
                            <tr>
                                <th><h2>Купленные билеты</h2></th>
                                <th><h2>Мероприятия</h2></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ticketsEvents as $tickets)
                                <tr>
                                    <td valign="top">
                                        @foreach($tickets as $ticket)
                                            <div style="background-image: url('/{{ $ticket['url_type_ticket'] }}')">
                                                @foreach($buyTypeTickets as $buyTicket)
                                                    @if($ticket['id_type_ticket'] == $buyTicket->id_type_ticket)
                                                        Всего куплено этого вида: {{ $buyTicket->buy_ticket }} <br>
                                                    @endif
                                                @endforeach
                                                Вид билета: {{ $ticket['name_type_ticket'] }} <br>
                                                Код: {{ $ticket['code_ticket'] }} <br>
                                                Цена: {{ $ticket['price_type_ticket'] }} руб. <br>
                                                Дата начала: {{ $tickets[0]['beg_date_event'] }} <br>
                                                <form action="{{ route('deleteTicket', ['id' => $tickets[0]['id_ticket']]) }}" method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit">
                                                        Вернуть билет
                                                    </button>
                                                </form>
                                                {!! QrCode::encoding('UTF-8')->size(100)->generate($ticket['code_ticket']); !!}
                                                <hr>
                                            </div>
                                        @endforeach
                                    </td>
                                    <td valign="top">
                                        <div class="profilTable-film">
                                            <div class="profilFilm-img">
                                                <img src="{{ $tickets[0]['url_event'] }}">
                                            </div>
                                            <div class="mainContent-info">
                                                <div class="mainContent-name">
                                                    <h3>{{ $tickets[0]['name_event'] }}</h3>
                                                </div>
                                                <div class="mainContent-name">
                                                    <h3>Адрес: {{ $tickets[0]['address_event'] }}</h3>
                                                </div>
                                                <div class="mainContent-datе">
                                                    <p>Дата и время: с {{ $tickets[0]['beg_date_event'] }} по {{ $tickets[0]['end_date_event'] }}</p>
                                                </div>
                                                <div>
                                                    <a href="{{ route('event', ['id' => $tickets[0]['id_event']]) }}">Подробнее</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            @endif

            <div class="profilIvent">

                <div class="profilIvent-name">
                    <h1>Прошедшие мероприятия</h1>
                </div>

                <div class="profilIvent-film">

                    @if(count($eventsEnd) > 0)
                        @foreach($eventsEnd as $event)
                            <div class="profilTable-film2">
                                <div class="profilFilm-img">
                                    <img src="{{ $event->url_event }}">
                                </div>
                                <div class="mainContent-info">
                                    <div class="mainContent-name">
                                        <h3>{{ $event->name_event }}</h3>
                                    </div>
                                    <div class="mainContent-name">
                                        <p>Адрес: {{ $event->address_event }}</p>
                                    </div>
                                    <div class="mainContent-datе">
                                        <p>Дата и время: с {{ $event->beg_date_event }} по {{ $event->end_date_event }}</p>
                                    </div>
                                    <div>
                                        <a href="{{ route('eventEnd', ['id' => $event->id_event]) }}">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h4>У вас пока нет прошедших мероприятий</h4>
                    @endif

                </div>

            </div>

        </div>
    </main>
@endsection
