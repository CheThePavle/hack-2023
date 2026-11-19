@extends('layouts.panel')

@section('head')
    <title>Добавление категории</title>
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Добавление категории</h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Категория</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('categoryCreate') }}" method="post" class="user">
                    @csrf
                    <div class="form-group">
                        <input name="name_category" type="text" class="form-control form-control-user" placeholder="Название категории">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Добавить
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
