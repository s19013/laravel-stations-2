<?php
declare(strict_types=1);
namespace App\Http\Repository;

use App\Models\Movie;
use Illuminate\Http\Request;

use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

class MovieRepository
{
    public function store(CreateMovieRequest $request)
    {
        Movie::create([
            'title'    => $request->input('title'),
            'image_url' => $request->input('image_url'),
            'published_year' => $request->input('published_year'),
            'is_showing'     => $request->input('is_showing'),
            'description'    => $request->input('description'),
        ]);
    }

    public function update(UpdateMovieRequest $request){
        Movie::where('id','=',$request->input('id'))
        ->update([
            'title'    => $request->input('title'),
            'image_url' => $request->input('image_url'),
            'published_year' => $request->input('published_year'),
            'is_showing'     => $request->input('is_showing'),
            'description'    => $request->input('description'),
        ]);
    }
}
