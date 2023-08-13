<?php
declare(strict_types=1);
namespace App\Http\Repository;
use Illuminate\Http\Request;

use App\Models\Reservation;

use App\Http\Requests\CreateReservationRequest;

use Carbon\Carbon;

class ReservationRepository {

    // 型を指定したら通らなくなったし｡｡｡
    public function store($request) {
        Reservation::create([
            'date' => $request->date,
            'schedule_id' => $request->schedule_id,
            'sheet_id' => $request->sheet_id,
            'email' => $request->email,
            'name' => $request->name,
            'is_canceled' => false, // ここは最初は必ずfalse
        ]);
    }

    public function update($request) {
        Reservation::where('id','=',$request->reservation_id)
        ->update([
            'date' => $request->date,
            'schedule_id' => $request->schedule_id,
            'sheet_id' => $request->sheet_id,
            'email' => $request->email,
            'name' => $request->name,
            'is_canceled' => false, // ここは最初は必ずfalse
        ]);
    }

    public function destroy(Request $request)  {
        Reservation::where('id', '=',$request->id)->delete();
    }

    public function getTheReservation($request){
        return Reservation::where('id','=',$request->id)
        ->with('schedule')
        ->first();
    }

    public function isDuplication($request) {
        return Reservation::where('schedule_id','=',$request->schedule_id)
        ->where('sheet_id','=',$request->sheet_id)
        ->where('email','=',$request->email)
        ->where('name','=',$request->name)
        ->exists();
    }

    // すでに席がとられてないか
    public function isReserved($request) {
        return Reservation::where('schedule_id','=',$request->scheduleId)
        ->where('sheet_id','=',$request->sheetId)
        ->exists();
    }

    public function isExists(Request $request)
    {
        return Reservation::where('id','=',$request->id)->exists();
    }

    // 指定したスケジュールの予約済みの席を取ってくる
    public function reservedSeatForTheMovie(Request $request){
        return Reservation::select('sheet_id')
        ->where('schedule_id','=',$request->scheduleId)
        ->get();
    }

    public function allUpcomingMovies() {
        return Reservation::select('*')
        ->where('date','>',Carbon::now())
        ->with('sheet')
        ->get();
    }
}
