<?php
declare(strict_types=1);
namespace App\Http\Repository;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreRepository {

    public function storeAndReturnId(string $name) {
        $genre = Genre::create([
            'name'    => $name,
        ]);

        return $genre->id;
    }

    public function isExists(string $name)  {
        return Genre::where('name','=',$name)->exists();
    }
}
