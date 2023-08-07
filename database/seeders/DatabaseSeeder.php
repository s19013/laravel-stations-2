<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Practice;

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

        Practice::factory(10)->create();

    }
}
