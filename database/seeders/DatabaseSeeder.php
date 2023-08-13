<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Schedule;
use App\Models\Reservation;

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
        // $now = CarbonImmutable::now();
        // $movie = Movie::factory()->create();
        // $oldSchedule = Schedule::factory()->create([
        //     'movie_id' => $movie->id,
        //     'start_time' => $now->subHours(20),
        //     'end_time'   => $now->subHours(21)
        // ]);
        // $newSchedule = Schedule::factory()->create([
        //     'movie_id' => $movie->id,
        //     'start_time' => new CarbonImmutable('2050-01-01 00:00:00'),
        //     'end_time'   => new CarbonImmutable('2050-01-01 02:00:00')
        // ]);
        // Schedule::factory()->create([
        //     'movie_id' => $movie->id,
        //     'start_time' => $now->addHours(8),
        //     'end_time'   => $now->addHours(9)
        // ]);
        // Reservation::insert([
        //     'date' => $newSchedule->start_time,
        //     'schedule_id' => $newSchedule->id,
        //     'sheet_id' => 1,
        //     'email' => 'sample@exmaple.com',
        //     'name' => 'サンプル太郎',
        // ]);
        // Reservation::insert([
        //     'date' => $oldSchedule->start_time,
        //     'schedule_id' => $oldSchedule->id,
        //     'sheet_id' => 1,
        //     'email' => 'sample@exmaple.com',
        //     'name' => 'サンプル太郎',
        // ]);
    }
}
