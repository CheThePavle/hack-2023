@extends('layouts.layout')

@section('head')
    <title>Создание мероприятия</title>
    <script src="{{ asset('assets/js/event.js') }}"></script>
@endsection

@section('content')
    <main class="main">
        <form action="{{ route('createEvent') }}" class="mainInner" method="post" enctype="multipart/form-data">
            @csrf
            <div class="crEventName">
                <h1>Создание мероприятия</h1>
            </div>

            <div class="crEventNameInfo">
                <p>Инофрмация о меропиятиии:</p>
            </div>

            <div class="crEventName-input">
                <input name="name_event" required type="text" placeholder="Название мероприятия">
            </div>

            <div class="crEventName-input">
                <input name="address_event" required type="text" placeholder="Aдрес мероприятия">
            </div>

            <div>
                <label class="input-file">
                    <input type="file" name="main_img" accept="image/*" required>
                    <span class="input-file-btn">Загрузить файл</span>
                    <span class="input-file-text">*Загрузите фото баннера мероприятия для привелечения внимания</span>
                </label>
            </div>

            <select name="id_category" id="model" class="crModel" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id_category }}" id="01">{{ $category->name_category }}</option>
                @endforeach
            </select>

            <div class="crModelTime">
                <input type="datetime-local" name="beg_date_event" required><br>
                <input type="datetime-local" name="end_date_event" required>
            </div>

            <div class="crModelDesc">
                <textarea style="width: 100%" name="description_event" rows="5" placeholder="Описание" required></textarea>
            </div>

            <div class="iventTable">
                <div class="iventTable-name">
                    <h2>Билеты:</h2>
                </div>

                <div class="iventTable-table">
                    <table class="table" id="tableAdding">
                        <thead>
                        <tr>
                            <th>Тип билета</th>
                            <th>Цена</th>
                            <th>Всего билетов</th>
                            <th>Оформление</th>
                        </tr>
                        </thead>
                        <tbody id="tbd">
                        <tr id="tt1">
                            <td>
                                <input name="name_type_ticket[]" class="stringInput" type="text" placeholder="Входной билет" size="55" required>
                            </td>
                            <td>
                                <input name="price_type_ticket[]" class="stringInput" type="text" placeholder="РУБ" required>
                            </td>
                            <td>
                                <input name="size_type_ticket[]" class="stringInput" type="text" placeholder="ШТ" required>
                            </td>
                            <td>
                                <button onclick="delTicketType('tt1')" type="button" class="pointer btn_close">X</button>
                                <div class="upload">
                                    <label class="input-file">
                                        <input type="file" name="img_type_ticket[]" accept="image/*" required>
                                        <span class="input-file-btn">Загрузить файл</span>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="iventTable-button">
                    <button type="button" onclick="addTicketType()" class="pointer">Добавить тип билета</button>
                </div>
                <p id="warning"></p>
            </div>

            <div class="crBtn">
                <button type="submit" class="pointer">Отправить вопрос на создание мероприятия</button>
            </div>

        </form>
    </main>
@endsection
