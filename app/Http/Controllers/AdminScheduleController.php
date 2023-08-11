<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;

use App\Http\Repository\ScheduleRepository;

use App\Models\Movie;
use App\Models\Schedule;

class AdminScheduleController extends Controller
{
    private $scheduleRepository;

    public function __construct()
    {
        $this->scheduleRepository  = new ScheduleRepository();
    }

    public function create(Request $request) {
        return view('admin/schedule/create')->with(['movieId' => $request->id]);
    }

    public function store(CreateScheduleRequest $request)
    {
        $this->scheduleRepository->store($request);

        return redirect("/admin/movies/{$request->movieId}");
    }

    public function edit(Request $request) {
        return view('admin/schedule/edit')->with([
            'schedule' => $this->scheduleRepository->getAScheduleData($request),
        ]);
    }

    public function update(UpdateScheduleRequest $request)
    {
        $this->scheduleRepository->update($request);
        return redirect("/admin/movies/{$request->movieId}");
    }

    public function destroy(Request $request)
    {
        if ($this->scheduleRepository->isExists($request)) {
            // リダイレクトするためにスケジュールのmovie_idが必要
            $schedule = $this->scheduleRepository->getAScheduleData($request);
            $this->scheduleRepository->destroy($request);
            return redirect("/admin/movies/{$schedule->movie_id}");
        }
        return \App::abort(404);
    }

}
