<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
    @if ($errors->any())
        <ul >
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="/admin/movies/{{$movieId}}/schedules/store" method="post">
        @csrf
        <input type="hidden" name="movie_id" value={{$movieId}}>

        <label>
            開始日付
            <input name='start_time_date'
                placeholder="例 2000-01-01"
                type="text"
                value="{{old('start_time_date')}}"
                required >
        </label>
        <br>

        <label for="">
            開始時間
            <input
            name='start_time_time'
            placeholder="例 08:06"
            type="text"
            value="{{old('start_time_time')}}"
            required >
        </label>
        <br>

        <label for="">
            終了日付
            <input name='end_time_date'
            placeholder="例 2000-01-01"
            type="text"
            value="{{old('end_time_date')}}"
            required >
        </label>
        <br>

        <label for="">
            終了時間
            <input
            name='end_time_time'
            placeholder="例 08:06"
            type="text"
            value="{{old('end_time_time')}}"
            required >
        </label>


        <input type="submit" value="送信">
    </form>

</body>
</html>
