<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateAdminReservationRequest;
use App\Http\Requests\UpdateAdminReservationRequest;

use App\Http\Repository\ReservationRepository;

use App\Models\Reservation;
use App\Models\Schedule;


class AdminReservationController extends Controller
{
    private $reservationRepository;

    public function __construct()
    {
        $this->reservationRepository  = new ReservationRepository();
    }

    public function index() {
        return view('admin/reservation/index')->with([
            'reservations' => $this->reservationRepository->allUpcomingMovies()
        ]);
    }

    public function create(Request $request) {
        return view('admin/reservation/create');
    }

    public function store(CreateAdminReservationRequest $request)
    {
        // dateを取ってこないと行けない
        $date =Schedule::find($request->schedule_id);
        $request->date = $date->start_time->format('Y-m-d');

        $this->reservationRepository->store($request);
        return redirect("/admin/reservations");
    }

    public function edit(Request $request) {
        return view('admin/reservation/edit')->with([
            'reservation' => $this->reservationRepository->getTheReservation($request),
        ]);
    }

    public function update(UpdateAdminReservationRequest $request)
    {
        // テスト用になんか色々変換が必要,,,書き方とか統一したい
        $request->sheetId = $request->sheet_id;
        $request->scheduleId = $request->schedule_id;

        // 重複してないか?
        if ($this->reservationRepository->isDuplication($request)) {
            return \App::abort(400,'予約済み');
        }

        $this->reservationRepository->update($request);
        return redirect("/admin/reservations");
    }

    public function destroy(Request $request)
    {
        if ($this->reservationRepository->isExists($request)) {
            $this->reservationRepository->destroy($request);

            return redirect("/admin/reservations");
        }
        return \App::abort(404);
    }

}
