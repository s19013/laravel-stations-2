<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Schedule;

class AddColumSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->unsignedTinyInteger('screen_id');
        });

        // 既存のデータはとりあえず全部スクリーン1にしとく
        $allSchedule = Schedule::all();
        foreach($allSchedule as $schedule){
            if (empty($schedule->screen_id)) {
                Schedule::where('id','=',$schedule->id)
                ->update(['screen_id' => 1]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropColumn('screen_id');
        });
    }
}
