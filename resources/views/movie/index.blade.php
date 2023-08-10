<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
    <div class="searchField">
        <form action="/movies">
            <input type="text" name=keyword value="{{old('keyword')}}">
            <div>
                <label for="">
                    すべて
                    <input type="radio" name="is_showing" value="2" @if ((int)old('is_showing',$query->is_showing) == "2") checked @endif>
                </label>
                <label for="">
                    公開中
                    <input type="radio" name="is_showing" value="1" @if ((int)old('is_showing',$query->is_showing) == "1") checked @endif>
                </label>
                <label for="">
                    公開予定
                    <input type="radio" name="is_showing" value="0" @if ((int)old('is_showing',$query->is_showing) == "0") checked @endif>
                </label>
            </div>
            <input type="submit" value="検索">
        </form>
    </div>
    <ul>
    @foreach ($movies as $movie)
        <li><a href="movies/{{$movie->id}}">タイトル: {{ $movie->title }}</a></li>
        {{-- <li><img src={{ $movie->image_url }} alt=""></li> --}}
        <li>{{ $movie->image_url }}</li>
    @endforeach
    </ul>

    <div class="mt-1 mb-1 row justify-content-center">
        {{ $movies->links() }}
    </div>
</body>
</html>
