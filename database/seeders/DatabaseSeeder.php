<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Schedule;

use Carbon\CarbonImmutable;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SheetTableSeeder::class,
        ]);
        // Genre::factory(10)->create();
        $now = CarbonImmutable::now();
        $movie = Movie::factory()->create();
        Schedule::factory()->create([
            'movie_id' => $movie->id,
            'start_time' => $now->addHours(10),
            'end_time'   => $now::now()->addHours(11)
        ]);
        Schedule::factory()->create([
            'movie_id' => $movie->id,
            'start_time' => $now::now()->addHours(3),
            'end_time'   => $now::now()->addHours(4)
        ]);
        Schedule::factory()->create([
            'movie_id' => $movie->id,
            'start_time' => $now::now()->addHours(8),
            'end_time'   => $now::now()->addHours(9)
        ]);
        // Schedule::factory(10)->create();

    }
}
