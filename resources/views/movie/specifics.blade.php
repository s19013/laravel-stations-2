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

    <img width="300rem" src="{{$movie->image_url}}" alt="">
    <p>{{$movie->title}}</p>
    <p>{{$movie->genre->name}}</p>
    <p>{{$movie->published_year}}</p>
    <p> {{ $movie->is_showing ? '公開中' : '公開予定' }} </p>
    <p>{{$movie->description}}</p>

    <table>
        <th></th>
        {{-- <th>スクリーン番号</th> --}}
        <th>開始時刻</th>
        <th>終了時刻</th>
        @foreach ($schedules as $schedule)
        <tr>
            <td>
                <a href="/movies/{{$movie->id}}/schedules/{{$schedule->id}}/sheets?date={{$schedule->start_time->format('Y-m-d')}}">
                    座席を予約する
                </a>
            </td>
            {{-- <td>{{$schedule->screen_id}}</td> --}}
            <td>{{$schedule->start_time->format('H:i')}}</td>
            <td>{{$schedule->end_time->format('H:i')}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
