<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Practice;
use Illuminate\Http\Request;
use App\Http\Requests\CreateReservationRequest;

use App\Http\Repository\ReservationRepository;

class ReservationController extends Controller
{
    private $reservationRepository;

    public function __construct()
    {
        $this->reservationRepository = new ReservationRepository();
    }

    public function create(Request $request) {
        return view('reservation', [
            'movieId' => $request->movieId,
            'scheduleId' => $request->scheduleId,
            'date' => $request->date,
            'sheetId' => $request->sheetId,
        ]);
    }

    public function store(CreateReservationRequest $request)  {
        $this->reservationRepository->store($request);
        return redirect('/movies');
    }
}
