<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

use App\Http\Repository\MovieRepository;
use App\Http\Repository\ScheduleRepository;

class MovieController extends Controller
{
    private $movieRepository;
    private $scheduleRepository;

    public function __construct()
    {
        $this->movieRepository  = new MovieRepository();
        $this->scheduleRepository  = new ScheduleRepository();
    }

    public function index(Request $request)
    {
        // デフォルト値
        if (is_null($request->keyword)) { $request->keyword = ''; }
        if (is_null($request->is_showing)) { $request->is_showing = 2; }

        $movies = $this->movieRepository->search($request);

        return view('/movie/index', [
            'movies' => $movies,
            'query'  => (object)[
                'keyword' => $request->keyword,
                'is_showing' => $request->is_showing
            ]
        ]);
    }

    public function specifics(Request $request) {
        $movie = $this->movieRepository->getSpecifics((int) $request->id);
        $schedules = $this->scheduleRepository->allScheduleOfTheMovie((int) $request->id);

        return view('movie/specifics',[
            'movie' => $movie,
            'schedules' => $schedules
        ]);
    }
}
