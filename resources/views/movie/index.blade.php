<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
    <ul>
    @foreach ($movies as $movie)
        <li>タイトル: {{ $movie->title }}</li>
        {{-- <li><img src={{ $movie->image_url }} alt=""></li> --}}
        <li>{{ $movie->image_url }}</li>
    @endforeach
    </ul>
</body>
</html>
