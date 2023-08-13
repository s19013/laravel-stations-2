<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<style>
    table td{
        border-collapse: collapse;
        border: 1px solid #000000;
        padding: 5px;
    }
</style>
<body>
    <a href="/admin/reservations/create">
        <button type="button">新規作成</button>
    </a>
    <table>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($reservations as $reservation)
            <tr>
                <td><a href="/admin/reservations/{{$reservation->id}}/edit">編集</a></td>
                <td>{{$reservation->date->format('Y-m-d H:i:s')}}</td>
                <td>{{$reservation->name}}</td>
                <td>{{$reservation->email}}</td>
                <td>{{strtoupper($reservation->sheet->row)}}{{$reservation->sheet->column}}</td>
            </tr>
        @endforeach
    </table>
    </div>
</body>
</html>
