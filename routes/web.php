<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SheetController;
use App\Http\Controllers\ReservationController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\AdminScheduleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/practice',  [PracticeController::class,'sample']);
Route::get('/practice2', [PracticeController::class,'sample2']);
Route::get('/practice3', [PracticeController::class,'sample3']);
Route::get('/getPractice',  [PracticeController::class,'getPractice']);

Route::prefix('/admin/movies')->group(function () {
    Route::get('/',  [AdminController::class,'index']);
    Route::get('/create',  [AdminController::class,'create']);
    Route::post('/store',  [AdminController::class,'store']);
    Route::get('/{id}/edit',  [AdminController::class,'edit']);
    Route::patch('/{id}/update',  [AdminController::class,'update']);
    Route::delete('/{id}/destroy',  [AdminController::class,'destroy']);

    Route::get('/{id}',  [AdminController::class,'specifics']);//なぜかこれが先に読み込まれたことによりcreateに以降できなかったため下に持ってきた

    // スケジュール
    Route::post('{id}/schedules/store',  [AdminScheduleController::class,'store']);
    Route::get('{id}/schedules/create',  [AdminScheduleController::class,'create']);
});

Route::prefix('/admin/schedules')->group(function (){
    Route::get('/{id}/edit',[AdminScheduleController::class,'edit']);
    Route::patch('/{id}/update',[AdminScheduleController::class,'update']);
    Route::delete('/{id}/destroy',[AdminScheduleController::class,'destroy']);
});

Route::prefix('/admin/reservations')->group(function (){
    Route::get('/',  [AdminReservationController::class,'index']);
    Route::post('/',  [AdminReservationController::class,'store']);
    Route::get('/create',  [AdminReservationController::class,'create']);
    Route::get('/{id}/edit',  [AdminReservationController::class,'edit']);
    Route::patch('/{id}',  [AdminReservationController::class,'update']);
    Route::delete('/{id}',  [AdminReservationController::class,'destroy']);
});

Route::prefix('/movies')->group(function () {
    Route::get('/',  [MovieController::class,'index']);
    Route::get('/{id}',  [MovieController::class,'specifics']);
});

Route::get('/sheets',[SheetController::class,'master']);

// 予約
Route::prefix('/movies/{movieId}/schedules/{scheduleId}')->middleware(['auth'])->group(function (){
    Route::get('/reservations/create',  [ReservationController::class,'create']);
    Route::get('/sheets',  [SheetController::class,'index']);
});

Route::prefix('/reservations')->group(function () {
    Route::post('/store',  [ReservationController::class,'store']);
});


require __DIR__.'/auth.php';
