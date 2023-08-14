<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;
use App\Models\Reservation;

use Illuminate\Support\Facades\Hash;

class DataMigrationReservationsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // reservationにあるユーザーのユーザー登録をする
        // 後でuser_idとかで指定するから


        //reservationにあるnameとemailを取ってくる
        $nameAndEmailList = Reservation::select('name','email')->groupBy('name','email')->get();

        foreach($nameAndEmailList as $user){
            // すでに登録してないか確認する
            if (User::where('name','=',$user->name)->where('email','=',$user->email)->exists()) {
                // 登録してたらスキップ
                // 何もしない
            } else {
                // usersに登録する
                User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    // パスワードはこちらで適当に
                    // あとでなんかメールとかで知らせれば十分でしょ｡
                    'password' => Hash::make('customers'),
                ]);
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
        // 今作ったユーザーを削除
        //reservationにあるnameとemailを取ってくる
        $nameAndEmailList = Reservation::select('name','email')->groupBy('name','email')->get();

        foreach($nameAndEmailList as $user){
            // userに同じのがあったら
            if (User::where('name','=',$user->name)->where('email','=',$user->email)->exists()) {
                // usersを削除
                User::where('name','=',$user->name)->where('email','=',$user->email)->delete();
            }
        }
    }
}
