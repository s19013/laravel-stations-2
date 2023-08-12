<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('date')->comment('上映日');
            $table->unsignedBigInteger('schedule_id')->commet('スケジュールid');
            $table->unsignedBigInteger('sheet_id')->commet('sheet_id');
            $table->string('email',255)->comment('予約者メールアドレス');
            $table->string('name',255)->comment('予約者名');
            $table->boolean('is_canceled')->default(false)->comment('キャンセル済み');
            $table->timestamps();

            // 外部
            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->foreign('sheet_id')->references('id')->on('sheets');

            // 複合ユニーク
            $table->unique(['schedule_id', 'sheet_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
