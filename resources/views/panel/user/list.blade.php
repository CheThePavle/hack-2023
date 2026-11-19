@extends('layouts.panel')

@section('head')
    <title>Список пользователей</title>
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Список пользователей</h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Пользователи</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>ФИО</th>
                            <th>Телефон</th>
                            <th>Email</th>
                            <th>Роль</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id_user }}</td>
                                <td>{{ $user->last_name }} {{ $user->name }} {{ $user->patronymic }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->name_role }}</td>
                                <td>
                                    @if(auth()->user()->checkOperator() && $user->role->code_role == 'ADMIN')
                                        <a href="{{ route('changePermission', ['id' => $user->id_user]) }}" type="submit" class="btn btn-warning">
                                            Изменить права
                                        </a>
                                    @endif
                                    @if($user->role->code_role != 'OPERATOR')
                                        @if(auth()->user()->checkOperator() || in_array('DELETE_ADMIN', auth()->user()->permissions()) || $user->role->code_role == 'USER' || $user->role->code_role == 'ORGANIZER')
                                            <form action="{{ route('deleteUser', ['id' => $user->id_user]) }}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-danger">
                                                    Удалить
                                                </button>
                                            </form>
                                        @endif
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
