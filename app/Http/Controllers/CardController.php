<?php

namespace App\Http\Controllers;

use App\Designers;
use App\Pictures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
    public function index(){
        $pictures = DB::table('pictures')
            ->join('designers', 'pictures.Designer_pasport_number', '=', 'designers.Designer_pasport_number')->orderBy('Picture_id')->get();

        return view('site.card')->with(['pictures' => $pictures,  'title' => 'Галерея картин']);
    }

}
