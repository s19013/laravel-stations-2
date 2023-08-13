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
    @if ($errors->any())
        <ul >
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="/reservations/store" method="post">
        @csrf
        <input type="hidden" name="movie_id" value="{{$movieId}}">
        <input type="hidden" name="schedule_id" value="{{$scheduleId}}">
        <input type="hidden" name="sheet_id" value="{{$sheet_id}}">
        <input type="hidden" name="date" value="{{$date}}">

        <label for="">
            email
            <input type="email" name="email">
        </label>
        <br>

        <label for="">
            名前
            <input type="text" name="name">
        </label>
        <br>

        <input type="submit">

    </form>
</body>
</html>
