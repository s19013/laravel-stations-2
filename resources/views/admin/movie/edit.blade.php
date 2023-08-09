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
    <form action="/admin/movies/{{$movie->id}}/update" method="post">
        <input type="hidden" name='id' value={{$movie->id}}>
        @method('patch')
        @csrf
        <div>
            <label >
                タイトル
                <input name='title' type="text" value="{{old('title',$movie->title)}}" required >
            </label>
        </div>

        <div>
            <label >
                ジャンル
                <input name='genere' type="text" value="{{old('genere',$movie->genere->name)}}" required >
            </label>
        </div>

        <div>
            <label >
                画像のURL
                <input name='image_url' type="text" value="{{old('image_url',$movie->image_url)}}" required>
            </label>
        </div>

        <div>
            <label >
                公開年
                <input type="number" name="published_year" value={{ old('published_year',$movie->published_year) }} required>
            </label>
        </div>

        <div>
            <label >
                公開中
                <input name="is_showing" type="hidden" value="0" >
                <input type="checkbox" name="is_showing" value="1"  @if ((int)old('is_showing',$movie->is_showing) == "1") checked @endif>
            </label>
        </div>

        <div>
            <label >
                概要
                <textarea name="description" id="" cols="30" rows="10" required>{{old('description',$movie->description)}}</textarea>
            </label>
        </div>

        <input type="submit" value="送信">
    </form>
</body>

</html>
