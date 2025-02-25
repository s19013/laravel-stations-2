<?php
declare(strict_types=1);
namespace App\Http\Controllers;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests\CreateReservationRequest;

use App\Http\Repository\ReservationRepository;

use Validator;

class ReservationController extends Controller
{
    private $reservationRepository;

    public function __construct()
    {
        $this->reservationRepository = new ReservationRepository();
    }

    public function create(Request $request) {
        // dd(Reservation::all());

        // 必要なクエリはあるか?
        if (is_null($request->date) || is_null($request->sheetId) ) { abort(400,"クエリ足りない"); }

        // 予約済みではないか?
        if ($this->reservationRepository->isReserved($request)) {
            abort(400,'予約済み');
            // return redirect("/movies/{$request->movieId}",400);
        }

        return view('reservation', [
            'movieId' => $request->movieId,
            'scheduleId' => $request->scheduleId,
            'date' => $request->date,
            'sheetId' => $request->sheetId,
        ]);
    }

    public function store(CreateReservationRequest $request)  {

        // 重複があるか?
        if ($this->reservationRepository->isDuplication($request)) {
            return redirect("/movies/{$request->movieId}");
        }

        $this->reservationRepository->store($request);
        return redirect('/movies');
    }
}
