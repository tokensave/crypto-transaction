<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сделки</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            background-color: #fff;
            color: #000;
            margin: 0;
            padding: 10px; /* Уменьшаем отступы */
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px; /* Уменьшаем отступ снизу */
            font-size: 10px; /* Уменьшаем размер шрифта */
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 4px; /* Уменьшаем отступы внутри ячеек */
            text-align: left;
            word-wrap: break-word; /* Позволяет переносить слова */
        }
        .table th {
            background-color: #f8f8f8;
            font-weight: bold;
        }
        .text-center {
            text-align: center;
            font-size: 12px; /* Уменьшаем размер шрифта заголовка */
        }
        .header {
            margin-bottom: 10px; /* Уменьшаем отступ снизу заголовка */
        }
    </style>
</head>
<body>
<div class="header text-center">
    <h2>Отчет по сделкам</h2>
</div>

<table class="table">
    <thead>
    <tr>
        <th>Актив</th>
        <th>Действие с активом</th>
        <th>Курс</th>
        <th>Сумма</th>
        <th>Банк</th>
        <th>Биржа</th>
        <th>Идентификатор сделки</th>
        <th>Количество актива</th>
        <th>Дата</th>
    </tr>
    </thead>
    <tbody>
    @foreach($deals as $deal)
        <tr>
            <td>{{ $deal->active->name() }}</td>
            <td>{{ $deal->action->name() }}</td>
            <td>{{ $deal->course->value() }}</td>
            <td>{{ $deal->sum->value() }}</td>
            <td>{{ $deal->provider->name() }}</td>
            <td>{{ $deal->crypto_exchange->name() }}</td>
            <td>{{ $deal->deal_id }}</td>
            <td>{{ $deal->active_count }}</td>
            <td>{{ $deal->created_at->format('d.m.Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="text-center">
    <p>Отчет создан: {{ now()->format('d.m.Y H:i:s') }}</p>
</div>
</body>
</html>
