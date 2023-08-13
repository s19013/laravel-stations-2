<?php

namespace App\Http\Controllers;

use App\Models\Sheet;
use Illuminate\Http\Request;

use App\Http\Repository\ReservationRepository;

use Validator;

class SheetController extends Controller
{
    private $reservationRepository;

    public function __construct()
    {
        $this->reservationRepository = new ReservationRepository();
    }

    public function master()
    {
        return view('sheet.master', [
            "sheets" => Sheet::all()
        ]);
    }

    public function index(Request $request) {
        $reserved = [];

        // dateがあるか確認
        // validatorだと200でリダイレクトとするからテスト通らない
        if (is_null($request->date)) {abort(400); }

        $reservationCollection = $this->reservationRepository->reservedSeatForTheMovie($request);

        // resevedのitemsが空じゃなかったら変数に入れる
        if ($reservationCollection->count() != 0) {
            foreach ($reservationCollection as $model) {
                array_push($reserved,$model->sheet_id);
            }
        }

        return view('sheet.index', [
            "sheets" => Sheet::all(),
            "reserved" => $reserved,
            "movieId" => $request->movieId,
            "scheduleId" => $request->scheduleId,
            "date" => $request->date
        ]);
    }
}
