@extends('layouts.panel')

@section('head')
    <title>Изменение прав</title>
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Изменение прав {{ $admin->email }}</h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Права</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('changePermissionForm') }}" method="post" class="user">
                    @csrf
                    <input type="hidden" name="id_user" value="{{ $admin->id_user }}">
                    @foreach($permissions as $permission)
                        <div class="form-group">
                            <input {{ in_array($permission->id_permission, $activePermissions) ? 'checked' : '' }} style="cursor: pointer" id="{{ $permission->code_permission }}" maxlength="255" name="permissions[]" value="{{ $permission->id_permission }}" type="checkbox" class="form-check-inline">
                            <label style="cursor: pointer" for="{{ $permission->code_permission }}">{{ $permission->name_permission }}</label>
                        </div>
                    @endforeach

                    <button type="submit" class="btn btn-primary">
                        Обновить
                    </button>

                    @if (session('msg'))
                        <br><br>
                        <div class="alert alert-success">
                            {{ session('msg') }}
                        </div>
                    @endif
                </form>
            </div>
        </div>

    </div>
@endsection
