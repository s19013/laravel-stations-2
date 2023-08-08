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
            'title'    => $request->title,
            'image_url' => $request->image_url,
            'published_year' => $request->published_year,
            'is_showing'     => $request->is_showing,
            'description'    => $request->description,
        ]);
    }

    public function update(UpdateMovieRequest $request){
        Movie::where('id','=',$request->id)
        ->update([
            'title'    => $request->title,
            'image_url' => $request->image_url,
            'published_year' => $request->published_year,
            'is_showing'     => $request->is_showing,
            'description'    => $request->description,
        ]);
    }

    public function destroy(Request $request)  {
        Movie::where('id', '=',(int)$request->id)->delete();
    }

    public function isExists(Request $request)
    {
        return Movie::where('id','=',(int)$request->id)->exists();
    }
}
