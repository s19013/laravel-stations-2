<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

use App\Http\Repository\MovieRepository;
use App\Http\Repository\GenreRepository;

use DB;

class AdminController extends Controller
{
    private $movieRepository;
    private $genreRepository;

    public function __construct()
    {
        $this->movieRepository  = new MovieRepository();
        $this->genreRepository = new GenreRepository();
    }

    public function index()
    {
        $movies = Movie::with('genre')->get();
        return view('admin/movie/index', ['movies' => $movies]);
    }

    public function create() {
        return view('admin/movie/create');
    }

    public function store(CreateMovieRequest $request)
    {
        if ($this->genreRepository->isExists($request->genre)) {
            $this->movieRepository->store($request);
            return redirect('admin/movies');
        }

        DB::transaction(function () use($request){
            $request->genreId = $this->genreRepository->storeAndReturnId($request->genre);
            $this->movieRepository->store($request);
        });
        return redirect('admin/movies');
    }

    public function edit(Request $request) {
        $movie = Movie::find((int)$request->id);
        return view('admin/movie/edit',['movie' => $movie]);
    }

    public function update(UpdateMovieRequest $request) {
        // try_catch必要か?
        if ($this->genreRepository->isExists($request->genre)) {
            $this->movieRepository->update($request);
            return redirect('admin/movies');
        }

        DB::transaction(function () use($request){
            $request->genreId = $this->genreRepository->storeAndReturnId($request->genre);
            $this->movieRepository->update($request);
        });
        return redirect('admin/movies');
    }

    public function destroy(Request $request) {
        if ($this->movieRepository->isExists($request)) {
            $this->movieRepository->destroy($request);
            return redirect('admin/movies');
        }

        // return redirect('admin/movies',404);
        return \App::abort(404);

    }
}
