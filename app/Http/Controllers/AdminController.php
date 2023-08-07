<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('admin/index', ['movies' => $movies]);
    }
}
