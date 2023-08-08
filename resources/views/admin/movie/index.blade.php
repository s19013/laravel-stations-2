<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
    <tbody>
        @foreach ($movies as $movie)
        <tr><td>タイトル: {{ $movie->title }}</td></tr>
        {{-- <tr><td><img src={{ $movie->image_url }} alt=""></td></tr> --}}
        <tr><td>{{ $movie->image_url }}</td></tr>
        <tr><td>公開年: {{ $movie->published_year }}</td></tr>
        <tr>
            @if ($movie->is_showing)
                <td>上映中</td>
            @else
                <td>上映予定</td>
            @endif
        </tr>
        <tr><td>{{ $movie->description }}</td></tr>
        @endforeach
    </tbody>
</body>
</html>
