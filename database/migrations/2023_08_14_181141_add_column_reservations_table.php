<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;
use App\Models\Reservation;

class AddColumnReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // 最初だけnullableしないとエラーがでる
            $table->unsignedBigInteger('user_id')->nullable()->after("sheet_id");
        });

        // usersテーブルを参照して値を入れる
        $allUser = User::with(['reservations'])->get();
        foreach($allUser as $user){
            Reservation::where('name','=',$user->name)
            ->where('email','=',$user->email)
            ->update(['user_id' => $user->id]);
        }

         Schema::table('reservations', function (Blueprint $table) {
            // 外部キー
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();

            // nullableを無効化
            $table->unsignedBigInteger('user_id')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
