<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genere;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     SheetTableSeeder::class,
        // ]);

        Genere::factory(10)->create();
        Movie::factory(25)->create();
    }
}
