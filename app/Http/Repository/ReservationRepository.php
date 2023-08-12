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
            'is_canceled' => $request->is_canceled ?? false,
        ]);
    }
}
