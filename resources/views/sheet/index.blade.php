<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
    <link rel="stylesheet" href="\css\app.css">
</head>
<style>
    table td{
        border-collapse: collapse;
        border: 1px solid #000000;
        padding: 5px;
    }
    .reserved{
        background-color: #676767;
    }
</style>
<body>
    <table class="sheetTable">
        {{-- 最初の横の列の文字 --}}
        @php $switchFlag = "a"; @endphp

        <tr>
        @foreach ($sheets as $sheet)
            {{-- rowが切り替わる時に改行 --}}
            @if ($switchFlag !== $sheet->row)
                </tr>
                <tr>
                {{-- 新しくセット --}}
                @php $switchFlag = $sheet->row @endphp
            @endif


            @if (in_array($sheet->id,$reserved))
                <td class='reserved'>{{$sheet->row}}-{{$sheet->column}}</td>
            @else
                <td>
                    <a href="/movies/{{$movie_id}}/schedules/{{$schedule_id}}/reservations/create?date={{$date}}&sheet_id={{$sheet->id}}">
                        {{$sheet->row}}-{{$sheet->column}}
                    </a>
                </td>
            @endif

        @endforeach
        </tr>
    </table>
</body>
</html>
