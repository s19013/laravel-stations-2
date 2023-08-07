<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function sample()
    {
        return view('practice');
    }

    public function sample2()
    {
        $test = 'practice2';
        return view('practice',[
            'testParam' => $test
        ]);
    }

    public function sample3()
    {
        return view('practice',[
            'testParam' => 'test'
        ]);
    }
}
