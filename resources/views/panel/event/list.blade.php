@extends('layouts.panel')

@section('head')
    <title>Список мероприятий</title>
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Список мероприятий</h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Мероприятия</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Статус</th>
                            <th>Категория</th>
                            <th>Организатор</th>
                            <th>Дата и время</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>{{ $event->id_event }}</td>
                                <td>{{ $event->name_event }}</td>
                                <td>{{ $event->status->name_status }}</td>
                                <td>{{ $event->category->name_category }}</td>
                                <td>{{ $event->organizer->last_name }} {{ $event->organizer->name }} {{ $event->organizer->patronymic }}</td>
                                <td>С {{ $event->beg_date_event }} <br> По {{ $event->end_date_event }}</td>
                                <td>
                                    @if($event->status->code_status == 'SENT')
                                        <form action="{{ route('changeStatus') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id_event" value="{{ $event->id_event }}">
                                            <input type="hidden" name="code_status" value="PUBLISHED">
                                            <button type="submit" class="btn btn-success">
                                                Опубликовать
                                            </button>
                                        </form>
                                        <form action="{{ route('changeStatus') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id_event" value="{{ $event->id_event }}">
                                            <input type="hidden" name="code_status" value="REJECTED">
                                            <button type="submit" class="btn btn-warning">
                                                Отклонить
                                            </button>
                                        </form>
                                    @endif
                                    @if(auth()->user()->checkOperator() || in_array('DELETE_EVENT', auth()->user()->permissions()))
                                        <form action="{{ route('deleteEvent', ['id' => $event->id_event]) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger">
                                                Удалить
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
