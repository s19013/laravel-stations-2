<?php

namespace App\Http\Controllers;

use App\Models\Sheet;
use Illuminate\Http\Request;

use Validator;

class SheetController extends Controller
{
    public function master()
    {
        return view('sheet.master', [
            "sheets" => Sheet::all()
        ]);
    }

    public function index(Request $request) {
        // dateがあるか確認
        // validatorだと200でリダイレクトとするからテスト通らない

        if (is_null($request->date)) {abort(400); }

        return view('sheet.index', [
            "sheets" => Sheet::all(),
            "movieId" => $request->movieId,
            "scheduleId" => $request->scheduleId,
            "date" => $request->date
        ]);
    }
}
