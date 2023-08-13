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
    <form action="/admin/reservations/" method="post">
        @csrf

        <label for="">
            movieId
            <input type="number" name="movie_id">
        </label>
        <br>

        <label for="">
            scheduleId
            <input type="number" name="schedule_id">
        </label>
        <br>

        <label for="">
            sheetId
            <input type="number" name="sheet_id">
        </label>
        <br>

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
