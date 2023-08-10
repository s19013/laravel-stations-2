<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>

    <img src="{{$movie->image_url}}" alt="">
    <p>{{$movie->title}}</p>
    <p>{{$movie->genre->name}}</p>
    <p>{{$movie->published_year}}</p>
    <p> {{ $movie->is_showing ? '公開中' : '公開予定' }} </p>
    <p>{{$movie->description}}</p>

    <table>
        <th>開始時刻</th>
        <th>終了時刻</th>
        @foreach ($schedules as $schedule)
        <tr>
            <td>{{$schedule->start_time->format('H:i')}}</td>
            <td>{{$schedule->end_time->format('H:i')}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
