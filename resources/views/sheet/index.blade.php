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
    <table class="sheetTable">
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

            <td>
                <a href="/movies/{{$movieId}}/schedules/{{$scheduleId}}/reservations/create?date={{$date}}&sheetId={{$sheet->id}}">
                    {{$sheet->row}}-{{$sheet->column}}
                </a>
            </td>

        @endforeach
        </tr>
    </table>
</body>
</html>
