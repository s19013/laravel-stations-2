<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SheetController;

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

Route::get('/practice',  [PracticeController::class,'sample']);
Route::get('/practice2', [PracticeController::class,'sample2']);
Route::get('/practice3', [PracticeController::class,'sample3']);
Route::get('/getPractice',  [PracticeController::class,'getPractice']);

Route::prefix('/movies')->group(function () {
    Route::get('/',  [MovieController::class,'index']);
});

Route::get('/sheets',[SheetController::class,'master']);

Route::prefix('admin/movies')->group(function () {
    Route::get('/',  [AdminController::class,'index']);
    Route::get('/create',  [AdminController::class,'create']);
    Route::post('/store',  [AdminController::class,'store']);
    Route::get('/{id}/edit',  [AdminController::class,'edit']);
    Route::patch('/{id}/update',  [AdminController::class,'update']);
    Route::delete('/{id}/destroy',  [AdminController::class,'destroy']);
});
