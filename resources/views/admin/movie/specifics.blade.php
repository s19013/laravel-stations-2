<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
    <link rel="stylesheet" href="\css\app.css">
</head>
<body>
    <h2>{{$movie->id}}</h2>
    <h2>{{$movie->title}}</h2>
    <img width="300rem" src="{{$movie->image_url}}" alt="">
    <p>{{$movie->published_year}}</p>
    <p>{{$movie->description}}</p>
    <p> {{ $movie->is_showing ? '上映中' : '上映予定' }} </p>
    <a href="/admin/movies/{{$movie->id}}/schedules/create">
        <button type="button" >追加</button>
    </a>
    <table>
        <tr>
            <th>開始</th>
            <th>終了</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($movie->schedules as $schedule)
            <tr>
                <td>{{$schedule->start_time->format('Y-m-d H:i:s')}}</td>
                <td>{{$schedule->end_time->format('Y-m-d H:i:s')}}</td>
                <td>
                    <a href="/admin/schedules/{{$schedule->id}}/edit">
                        <button type="button">編集</button>
                    </a>
                </td>
                <td>
                    <form action="/admin/schedules/{{$schedule->id}}/destroy" method="post" onsubmit="return finalCheck()">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="movie_id" value={{$movie->id}}>
                        <input type="submit" id='delete' value="削除">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <script>
        function finalCheck() { window.confirm("削除しますか?"); }
    </script>
</body>
</html>
