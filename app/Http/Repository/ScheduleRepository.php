<?php
declare(strict_types=1);
namespace App\Http\Repository;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleRepository {

    public function allScheduleOfTheMovie(Request $request) {
        return Schedule::select('*')
        ->where('movie_id','=',$request->id)
        ->orderBy('start_time')
        ->get();
    }

    public function getAScheduleData(Request $request)
    {
        return Schedule::find($request->id);
    }


    // 登録
    public function store(Request $request)
    {
        Schedule::create([
            'movie_id'   => $request->movie_id,
            'screen_id'  => $request->screen_id,
            'start_time' => $request->start_time_date." ".$request->start_time_time, // これで登録できるもよう
            'end_time'   => $request->end_time_date." ".$request->end_time_time,
        ]);
    }

    public function update(Request $request)
    {
        Schedule::where('id','=',$request->id)
            ->update([
                'screen_id'  => $request->screen_id,
                'start_time' => $request->start_time_date." ".$request->start_time_time,
                'end_time'   => $request->end_time_date." ".$request->end_time_time,
            ]);
    }

    public function destroy(Request $request)
    {
        Schedule::where('id', '=',$request->id)->delete();
    }

    public function isExists(Request $request)
    {
        return Schedule::where('id','=',$request->id)->exists();
    }
}
