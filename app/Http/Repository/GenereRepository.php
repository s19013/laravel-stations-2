<?php
declare(strict_types=1);
namespace App\Http\Repository;

use App\Models\Genere;
use Illuminate\Http\Request;

class GenereRepository {

    public function storeAndReturnId(string $name) {
        $genere = Genere::create([
            'name'    => $name,
        ]);

        return $genere->id;
    }

    public function isExists(string $name)  {
        return Genere::where('name','=',$name)->exists();
    }
}
