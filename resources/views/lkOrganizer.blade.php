@extends('layouts.layout')

@section('head')
    <title>Личный кабинет организатора</title>
@endsection

@section('content')
    <main class="main">
        <div class="mainInner">

            <div class="profilName">
                <div class="profilName-name">
                    <h1>Организатор</h1>
                </div>
                <div class="profilBlock">
                    <div class="profilBlock-info">
                        <div class="profilInfo-img">
                            <img src="{{ asset('assets/img/user.png') }}" />
                        </div>
                        <div class="profilInfo-name">
                            <h1>{{ auth()->user()->last_name }} {{ auth()->user()->name }} {{ auth()->user()->patronymic }}</h1>
                            <p>{{ auth()->user()->email }}</p>
                            <a href="{{ route('createEventForm') }}">Добавить мероприятие</a>
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

            <div class="profilZaplan">

                <div class="profilZaplan-name">
                    <h1>Всего продано билетов по видам на предстоящие мероприятия</h1>
                </div>

                @php($totalBuyTypeTickets = 0)
                @foreach($buyTypeTickets as $buyTicket)
                    @php($totalBuyTypeTickets += $buyTicket->price_type_ticket)
                    {{ $buyTicket->name_type_ticket }}, куплено: {{ $buyTicket->buy_ticket }} за {{ $buyTicket->price_type_ticket }} руб. <br>
                @endforeach

                <h3>Общая прибыль: {{ $totalBuyTypeTickets }} руб.</h3>

                <br><br>

                <div class="profilZaplan-name">
                    <h1>Запланированые мероприятия</h1>
                </div>

                @foreach($events as $event)
                    <div class="profilZaplan-block">
                        <div class="profilZaplan-img">
                            <div class="profilTable-film">
                                <div class="profilFilm-img">
                                    <img src="/{{ $event->url_event }}">
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
                        </div>
                        <div class="profilZaplan-info">
                            <form action="{{ route('deleteEvent', ['id' => $event->id_event]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button>Отменить мероприятие</button>
                            </form>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="profilIvent">

                <div class="profilZaplan-name">
                    <h1>Всего продано билетов по видам за прошлые мероприятия</h1>
                </div>

                @php($totalBuyTypeTicketsEnd = 0)
                @foreach($buyTypeTicketsEnd as $buyTicket)
                    @php($totalBuyTypeTicketsEnd += $buyTicket->price_type_ticket)
                    {{ $buyTicket->name_type_ticket }}, куплено: {{ $buyTicket->buy_ticket }} за {{ $buyTicket->price_type_ticket }} руб.<br>
                @endforeach

                <h3>Общая прибыль: {{ $totalBuyTypeTicketsEnd }} руб.</h3>

                <br><br>

                <div class="profilIvent-name">
                    <h1>Прошедшие мероприятия</h1>
                </div>

                <div class="profilIvent-film">
                    @if(count($eventsEnd) > 0)
                        @foreach($eventsEnd as $event)
                            <div class="profilTable-film2">
                                <div class="profilFilm-img">
                                    <img src="/{{ $event->url_event }}">
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
                                        <a href="{{ route('eventEnd', ['id' => $event->id_event]) }}">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h3>Мероприятия не найдены</h3>
                    @endif


                </div>

            </div>

            <div class="profilIvent">

                @if(count($eventsInfo) > 0)
                    <div class="profilIvent-name">
                        <h1>Мероприятия, которые отправлены на проверку</h1>
                    </div>

                    <div class="profilIvent-film">

                        @foreach($eventsInfo as $event)
                            <div class="profilTable-film2">
                                <div class="profilFilm-img">
                                    <img src="/{{ $event->url_event }}">
                                </div>
                                <div class="mainContent-info">
                                    <div class="mainContent-name">
                                        <h3>{{ $event->name_event }}</h3>
                                    </div>
                                    <div class="mainContent-name">
                                        <h3>Статус: {{ $event->status->name_status }}</h3>
                                    </div>
                                    <div class="mainContent-name">
                                        <h3>Адрес: {{ $event->address_event }}</h3>
                                    </div>
                                    <div class="mainContent-datе">
                                        <p>Дата и время: с {{ $event->beg_date_event }} по {{ $event->end_date_event }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                @endif

            </div>

        </div>
    </main>
@endsection
