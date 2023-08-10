<?php
declare(strict_types=1);
namespace App\Http\Repository;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleRepository {

    public function allScheduleOfTheMovie(int $id) {
        return Schedule::select('start_time','end_time')
        ->where('movie_id','=',$id)
        ->orderBy('start_time')
        ->get();
    }

    public function store() {

    }
}
