<?php
declare(strict_types=1);
namespace App\Http\Repository;
use Illuminate\Http\Request;

use App\Models\Reservation;

use App\Http\Requests\CreateReservationRequest;

class ReservationRepository {

    public function store(CreateReservationRequest $request) {
        Reservation::create([
            'date' => $request->date,
            'schedule_id' => $request->schedule_id,
            'sheet_id' => $request->sheet_id,
            'email' => $request->email,
            'name' => $request->name,
            'is_canceled' => false, // ここは最初は必ずfalse
        ]);
    }

    public function isExists(CreateReservationRequest $request) {

        return Reservation::where('schedule_id','=',$request->schedule_id)
        ->where('sheet_id','=',$request->sheet_id)
        ->where('email','=',$request->email)
        ->where('name','=',$request->name)
        ->exists();
    }

    // すでに席がとられてないか
    public function isReserved(Request $request) {
        return Reservation::where('schedule_id','=',$request->schedule_id)
        ->where('sheet_id','=',$request->sheet_id)
        ->exists();
    }

    // 指定したスケジュールの予約済みの席を取ってくる
    public function reservedSeatForTheMovie(Request $request){
        return Reservation::select('sheet_id')
        ->where('schedule_id','=',$request->schedule_id)
        ->get();
    }
}
