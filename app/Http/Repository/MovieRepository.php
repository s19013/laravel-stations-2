<?php
declare(strict_types=1);
namespace App\Http\Repository;

use App\Models\Movie;
use Illuminate\Http\Request;

use App\Http\Request\CreateMovieRequest;

class MovieRepository
{
    public function store(CreateMovieRequest $request)
    {
        Movie::create([
            'title'    => $request->input('title'),
            'image_url'    => $request->input('image_url'),
            'published_year'    => $request->input('published_year'),
            'is_showing'    => $request->input('is_showing'),
            'description'    => $request->input('description'),
        ]);
    }
}
