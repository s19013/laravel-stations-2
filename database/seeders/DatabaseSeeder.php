<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

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

        Movie::factory(25)->create();
    }
}
