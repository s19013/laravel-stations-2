<?php

namespace App\Http\Controllers;

use App\Models\Sheet;
use Illuminate\Http\Request;

class SheetController extends Controller
{
    public function master()
    {
        return view('sheet.master', [
            "sheets" => Sheet::all()
        ]);
    }

    public function index(Request $request) {
        return view('sheet.index', [
            "sheets" => Sheet::all(),
            "movieId" => $request->movieId,
            "scheduleId" => $request->scheduleId,
            "date" => $request->date
        ]);
    }
}
