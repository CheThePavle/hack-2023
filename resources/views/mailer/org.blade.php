<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Century Gothic';
        }

        .main {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .mainInner {
            width: 500px;
            background: #b2b2b2;
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-radius: 20px;
        }

        .mainContent-name {
            text-align: center;
            margin-bottom: 20px;
        }

        .mainContent-info {
            margin-bottom: 40px;
        }

        .mainContent-info p {
            text-align: center;
        }

        .mainContent-block {
            display: flex;
        }

        .mainBlock-name {
            margin-right: 10px;
        }

        .mainBlock-name p {
            text-align: right;
            margin-bottom: 5px;
        }

        .mainBlock-info  {
            margin-left: 10px;
        }

        .mainBlock-info p {
            text-align: left;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>

<main class="main">
    <div class="mainInner">

        <div class="mainContent-name">
            <h1>Новый участиник!</h1>
        </div>

        <div class="mainContent-info">
            <p>На ваше событие "{{ $name_event }}" ({{ $beg_date_event }}) <br> {{ $last_name }} {{ $name }} {{ $patronymic }} ({{ $email }}) купил билеты.</p>
        </div>

    </div>
</main>

</body>

</html>
