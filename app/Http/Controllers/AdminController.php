<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

use App\Http\Repository\MovieRepository;

use DB;

class AdminController extends Controller
{
    private $movieRepository;

    public function __construct()
    {
        $this->movieRepository  = new MovieRepository();
    }

    public function index()
    {
        $movies = Movie::all();
        return view('admin/movie/index', ['movies' => $movies]);
    }

    public function create() {
        return view('admin/movie/create');
    }

    public function store(CreateMovieRequest $request)
    {
        $this->movieRepository->store($request);
        return redirect('admin/movies');
    }

    public function edit(Request $request) {
        $movie = Movie::find((int) $request->id);
        return view('admin/movie/edit',['movie' => $movie]);
    }

    public function update(UpdateMovieRequest $request) {
        $this->movieRepository->update($request);
        return redirect('admin/movies');
    }
}
