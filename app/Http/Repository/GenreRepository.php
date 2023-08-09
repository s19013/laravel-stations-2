<?php
declare(strict_types=1);
namespace App\Http\Repository;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreRepository {

    public function store(string $name) {
        Genre::create([
            'name'    => $name,
        ]);
    }

    public function returnIdFromName(string $name){
        $genre = Genre::where('name','=',$name)->first();
        return $genre->id;
    }


    public function isExists(string $name)  {
        return Genre::where('name','=',$name)->exists();
    }
}
