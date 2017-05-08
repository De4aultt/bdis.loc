<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SummsController extends Controller
{
    public function Index(){
        return view('site.summs');
    }
}
