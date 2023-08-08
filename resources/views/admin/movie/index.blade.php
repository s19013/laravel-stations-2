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
    <table>
        <tbody>
            @foreach ($movies as $movie)
            <tr>
            <td>タイトル: {{ $movie->title }}</td>
            {{-- <tr><td><img src={{ $movie->image_url }} alt=""></td></tr> --}}
            <td>{{ $movie->image_url }}</td>
            <td>公開年: {{ $movie->published_year }}</td>

                @if ($movie->is_showing)
                    <td>上映中</td>
                @else
                    <td>上映予定</td>
                @endif
            <td>{{ $movie->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
