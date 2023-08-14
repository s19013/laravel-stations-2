<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Schedule;
use App\Models\Reservation;
use App\Models\User;

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
        //     'screen_id' => 1,
        //     'start_time' => $now->subHours(20),
        //     'end_time'   => $now->subHours(21)
        // ]);
        // $newSchedule = Schedule::factory()->create([
        //     'movie_id' => $movie->id,
        //     'screen_id' => 1,
        //     'start_time' => new CarbonImmutable('2050-01-01 00:00:00'),
        //     'end_time'   => new CarbonImmutable('2050-01-01 02:00:00')
        // ]);
        // Schedule::factory()->create([
        //     'movie_id' => $movie->id,
        //     'screen_id' => 1,
        //     'start_time' => new CarbonImmutable('2050-01-02 00:00:00'),
        //     'end_time'   => new CarbonImmutable('2050-01-02 02:00:00')
        // ]);
        // Schedule::factory()->create([
        //     'movie_id' => $movie->id,
        //     'screen_id' => 2,
        //     'start_time' => new CarbonImmutable('2050-01-02 00:00:00'),
        //     'end_time'   => new CarbonImmutable('2050-01-02 02:00:00')
        // ]);

        // $user = User::factory()->create();


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
