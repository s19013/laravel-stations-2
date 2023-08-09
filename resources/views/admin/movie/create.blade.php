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
    <form action="{{ url('/admin/movies/store')}}" method="POST" >
        {{ csrf_field() }}
        <div>
            <label>
                タイトル
                <input type="text" name="title" required >
            </label>
        </div>

        <div>
            <label>
                ジャンル
                <input type="text" name="genere" required >
            </label>
        </div>

        <div>
            <label >
                画像url
                <input type="url" name="image_url" required >
            </label>
        </div>

        <div>
            <label >
                公開年
                <input type="number" name="published_year" required >
            </label>
        </div>

        <div>
            <label >
                公開中
                <input name="is_showing" type="hidden" value="0">
                <input type="checkbox" name="is_showing" value="1">
            </label>
        </div>

        <div>
            <label >
                <textarea name="description" id="" cols="30" rows="10">
                </textarea>
            </label>
        </div>

        <button type="submit">
            追加
        </button>
    </form>
</body>

</html>
